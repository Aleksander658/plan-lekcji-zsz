<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan lekcji ZSZ Bobowa</title>
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="refresh" content="3600">
</head>
<body>
    <header>
        <h1>Plan lekcji ZSZ Bobowa</h1>
    </header>
    <article>
        <time datetime="<?php echo date('Y-m-d\TH:i:s'); ?>">
            <?php echo date('H:i'); ?>
        </time>
        <div class="message"></div>
    </article>
    <aside>
        <h2>Informacje</h2>
        <div class="post">
            <h3>Przykładowy Post</h3>
            <p>Witajcie uczniowie! Przypominamy, że w przyszłym tygodniu odbędzie się wycieczka szkolna do Krakowa. Prosimy o zabranie ze sobą odpowiednich dokumentów oraz zgody rodziców. Szczegóły dotyczące wyjazdu znajdziecie na tablicy ogłoszeń.</p>
            <p>Data: 2023-10-15</p>
        </div>
    </aside>
    <footer>
    <h2>Aktualne lekcje</h2>
        <table border=1>
            <thead>
                <tr>
                    <th>Numer Lekcji i Godzina</th>
                    <th>Data</th>
                    <th>Klasa</th>
                    <th>Zajęcia</th>
                    <th>Nauczyciel</th>
                    <th>Sala</th>
                </tr>
            </thead>
            <tbody id="lessons-today">
                <!-- Rows will be populated by JavaScript -->
            </tbody>
        </table>
    </footer>
    <main>
        <h2>Zastępstwa</h2>
        <table border=1>
            <tr>
                <th>Numer Lekcji i Godzina</th>
                <th>Data</th>
                <th>Klasa</th>
                <th>Zajęcia</th>
                <th>Nauczyciel</th>
                <th>Zastępstwo</th>
                <th>Nauczyciel</th>
            </tr>
            <?php
            $lessons = [
                ["1.", "8:00-8:45", "2023-10-01", "1SB", "W-F", "W.Szafraniec", "W-F", "W.Szafraniec"],
                ["2.", "8:55-9:40", "2023-10-01", "1SB", "W-F", "W.Szafraniec", "W-F", "W.Szafraniec"],
                ["3.", "9:50-10:35", "2023-10-01", "1SB", "W-F", "W.Szafraniec", "W-F", "W.Szafraniec"],
                ["4.", "10:55-11:40", "2023-10-01", "1SB", "W-F", "W.Szafraniec", "W-F", "W.Szafraniec"],
                ["5.", "11:50-12:35", "2023-10-01", "1SB", "W-F", "W.Szafraniec", "W-F", "W.Szafraniec"],
                ["6.", "12:45-13:30", "2023-10-01", "1SB", "W-F", "W.Szafraniec", "W-F", "W.Szafraniec"],
                ["7.", "13:40-14:25", "2023-10-01", "1SB", "W-F", "W.Szafraniec", "W-F", "W.Szafraniec"],
                ["8.", "14:35-15:20", "2023-10-01", "1SB", "W-F", "W.Szafraniec", "W-F", "W.Szafraniec"]
            ];
            foreach ($lessons as $lesson) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($lesson[0] . ' ' . $lesson[1], ENT_QUOTES, 'UTF-8') . '</td>';
                echo '<td>' . htmlspecialchars($lesson[2], ENT_QUOTES, 'UTF-8') . '</td>';
                for ($i = 3; $i < count($lesson); $i++) {
                    echo '<td>' . htmlspecialchars($lesson[$i], ENT_QUOTES, 'UTF-8') . '</td>';
                }
                echo '</tr>';
            }
            ?>
        </table>
    </main>
    <section>
        <h2>Zdjęcia</h2>
        <div class="slideshow-container">
            <?php
            $images = ["zdjecie1.jpg", "zdjecie2.jpg", "zdjecie3.jpg", "zdjecie4.jpg", "zdjecie5.jpg", "zdjecie6.jpg"];
            foreach ($images as $index => $image) {
                $activeClass = $index === 0 ? 'active' : '';
                echo '<img src="' . htmlspecialchars($image, ENT_QUOTES, 'UTF-8') . '" class="' . $activeClass . '">';
            }
            ?>
        </p>
    </section>
<script src="script.js"></script>
</body>
</html>