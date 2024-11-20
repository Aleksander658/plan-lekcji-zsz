let slideIndex = 0;
const slides = document.querySelectorAll('.slideshow-container img');

function showSlides() {
    slides.forEach((slide, index) => {
        slide.classList.remove('active');
        if (index === slideIndex) {
            slide.classList.add('active');
        }
    });
    slideIndex = (slideIndex + 1) % slides.length;
}

setInterval(showSlides, 5000);

function updateTime() {
    const timeElement = document.querySelector('article time');
    const messageElement = document.querySelector('article .message');
    if (timeElement && messageElement) {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const day = now.getDay();
        timeElement.textContent = `${hours}:${minutes}`;
        timeElement.setAttribute('datetime', now.toISOString());

        let message = '';
        const currentTime = hours * 60 + parseInt(minutes);

        // Check if it's Friday after 15:40 or the weekend
        if ((day === 5 && currentTime >= 15 * 60 + 40) || day === 6 || day === 0) {
            message = 'Weekend! 🎉';
        } else {
            const schedule = [
                { start: 7 * 60, end: 8 * 60, message: 'Do pierwszej lekcji zostało: ' },
                { start: 8 * 60, end: 8 * 60 + 45, message: 'Do końca lekcji zostało: ' },
                { start: 8 * 60 + 45, end: 8 * 60 + 50, message: 'Do końca przerwy zostało: ' },
                { start: 8 * 60 + 50, end: 9 * 60 + 35, message: 'Do końca lekcji zostało: ' },
                { start: 9 * 60 + 35, end: 9 * 60 + 40, message: 'Do końca przerwy zostało: ' },
                { start: 9 * 60 + 40, end: 10 * 60 + 25, message: 'Do końca lekcji zostało: ' },
                { start: 10 * 60 + 25, end: 10 * 60 + 40, message: 'Do końca przerwy zostało: ' },
                { start: 10 * 60 + 40, end: 11 * 60 + 25, message: 'Do końca lekcji zostało: ' },
                { start: 11 * 60 + 25, end: 11 * 60 + 30, message: 'Do końca przerwy zostało: ' },
                { start: 11 * 60 + 30, end: 12 * 60 + 15, message: 'Do końca lekcji zostało: ' },
                { start: 12 * 60 + 15, end: 12 * 60 + 20, message: 'Do końca przerwy zostało: ' },
                { start: 12 * 60 + 20, end: 13 * 60 + 5, message: 'Do końca lekcji zostało: ' },
                { start: 13 * 60 + 5, end: 13 * 60 + 10, message: 'Do końca przerwy zostało: ' },
                { start: 13 * 60 + 10, end: 13 * 60 + 55, message: 'Do końca lekcji zostało: ' },
                { start: 13 * 60 + 55, end: 14 * 60, message: 'Do końca przerwy zostało: ' },
                { start: 14 * 60, end: 14 * 60 + 45, message: 'Do końca lekcji zostało: ' },
                { start: 14 * 60 + 45, end: 14 * 60 + 50, message: 'Do końca przerwy zostało: ' },
                { start: 14 * 60 + 50, end: 15 * 60 + 35, message: 'Do końca lekcji zostało: ' },
                { start: 15 * 60 + 35, end: 15 * 60 + 40, message: 'Do końca przerwy zostało: ' },
                { start: 15 * 60 + 40, end: 7 * 60, message: 'Koniec lekcji.' },
                // Add more schedule entries here as needed
            ];

            for (const period of schedule) {
                if (currentTime >= period.start && currentTime < period.end) {
                    const remainingMinutes = period.end - currentTime;
                    let minuteText = 'minut';
                    if (remainingMinutes === 1) {
                        minuteText = 'minuta';
                    } else if (remainingMinutes >= 2 && remainingMinutes <= 4) {
                        minuteText = 'minuty';
                    }
                    message = period.message + `${remainingMinutes} ${minuteText}`;
                    break;
                }
            }
        }

        messageElement.textContent = message;
    }
}

setInterval(updateTime, 60000);
updateTime(); // Initial call to set the time immediately

async function fetchLessons() {
    const response = await fetch('lessons.php');
    const lessons = await response.json();
    return lessons;
}

async function updateLessons() {
    const lessons = await fetchLessons();

    const tableBody = document.querySelector('#lessons-today');
    tableBody.innerHTML = ''; // Clear existing rows

    const currentDate = new Date().toISOString().split('T')[0]; // Get current date in YYYY-MM-DD format

    lessons.forEach(lesson => {
        const row = document.createElement('tr');
        lesson.forEach((cellText, index) => {
            const cell = document.createElement('td');
            if (index === 1) {
                const dateCell = document.createElement('td');
                dateCell.textContent = currentDate;
                row.appendChild(dateCell);
            }
            cell.textContent = cellText;
            row.appendChild(cell);
        });

        tableBody.appendChild(row);
    });
}

setInterval(updateLessons, 60000); // Update every minute
updateLessons(); // Initial call to set the lessons immediately

async function removePastSubstitutions() {
    const response = await fetch('substitutions.json');
    const substitutions = await response.json();
    const now = new Date();

    const updatedSubstitutions = substitutions.filter(substitution => {
        const substitutionDate = new Date(substitution.date);
        const [lessonStart] = substitution['L&H'].split(' ')[1].split('-');
        const [hours, minutes] = lessonStart.split(':');
        substitutionDate.setHours(hours, minutes);

        return substitutionDate > now;
    });

    if (updatedSubstitutions.length !== substitutions.length) {
        await fetch('update_substitutions.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(updatedSubstitutions)
        });
    }
}

setInterval(removePastSubstitutions, 60000); // Check every minute
removePastSubstitutions(); // Initial call to clean up immediately

function autoScroll(element) {
    const scrollHeight = element.scrollHeight;
    const clientHeight = element.clientHeight;
    let scrollTop = element.scrollTop;

    if (scrollTop + clientHeight >= scrollHeight) {
        element.scrollTop = 0;
    } else {
        element.scrollTop += 1;
    }
}

setInterval(() => {
    const footerTable = document.querySelector('footer');
    const mainTable = document.querySelector('main');
    if (footerTable) autoScroll(footerTable);
    if (mainTable) autoScroll(mainTable);
}, 100);
