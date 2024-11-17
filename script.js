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

function updateLessons() {
    const lessons = [
        ["1. 8:00-8:45", "2023-10-01", "1SB", "W-F", "W.Szafraniec", "11"],
        ["1. 8:00-8:45", "2023-10-01", "1TA", "W-F", "W.Szafraniec", "9"],
        ["1. 8:00-8:55", "2023-10-01", "2bSB", "W-F", "W.Szafraniec", "24"],
        ["1. 8:00-8:45", "2023-10-01", "2aSB", "W-F", "W.Szafraniec", "29"],
        ["1. 8:00-8:45", "2023-10-01", "2Ta", "W-F", "W.Szafraniec", "27"],
        ["1. 8:00-8:45", "2023-10-01", "3SB 3bSB", "W-F", "W.Szafraniec", "25"],
        ["1. 8:00-8:45", "2023-10-01", "3SB 3aSB", "W-F", "W.Szafraniec", "21"],
        ["1. 8:00-8:45", "2023-10-01", "3bT", "W-F", "W.Szafraniec", "16"]
    ];

    const tableBody = document.querySelector('footer table tbody');
    tableBody.innerHTML = ''; // Clear existing rows

    lessons.forEach(lesson => {
        const row = document.createElement('tr');
        lesson.forEach(cellText => {
            const cell = document.createElement('td');
            cell.textContent = cellText;
            row.appendChild(cell);
        });
        tableBody.appendChild(row);
    });
}

setInterval(updateLessons, 3600000); // Update every hour
updateLessons(); // Initial call to set the lessons immediately
