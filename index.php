<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan lekcji ZSZ Bobowa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Plan lekcji ZSZ Bobowa</h1>
    </header>
    <nav>
        <ul>
            <li><h3><a href="https://zsz.bobowa.pl/" target="_blank">Strona Szkoły</a><a href="https://plan.zsz.bobowa.pl/" target="_blank">Plan lekcji</a></h3></li>
        </ul>
        <table id="nauczyciele">
            <tr>
                <?php
                $teachers1 = [
                    "K.Paluch(KP)", "A.Iwańska(AI)", "E.Brońska(EB)", 
                    "J.Forczek(JF)", "B.Forczek-Serafin(BF)",  "B.Gryzło(BG)", "R.Pękala(RP)", "M.Gucwa(MG)", "A.Skórska(SÓ)",
                     "B.Jasińska(BJ)", "I.Kalisz(IK)", "J.Wiejaczka(WI)", "J.Wiejaczka(JW)", "E.Wołkowicz(EW)", "J.Zborowska(JZ)",
                    "P.Kruczek(PK)", "P.Kuk(PA)"
                ];
                foreach ($teachers1 as $teacher) {
                    echo '<td>' . htmlspecialchars($teacher, ENT_QUOTES, 'UTF-8') . '</td>';
                }
                ?>
            </tr>
        </table>
        <table id="nauczyciele2">
            <tr>
                <?php
                $teachers2 = [
                    "W.Szafraniec(WS)", "P.Łebski(PŁ)", "T.Magiera(TM)", "K.Flądro(KF)", "P.Ptaszkowski(PP)", "J.Gagatek(GA)",
                    "T.Skórski(SK)", "J.Średniawa(JŚ)", "R.Święs(RŚ)", "S.Szafraniec(SZ)", "S.Szczepanek(SS)",
                    "T.Gucwa(TG)", "J.Igielski(JI)", "K.Janusz(KJ)", "G.Bogusz(GB)", "P.Szura(PS)"
                ];
                foreach ($teachers2 as $teacher) {
                    echo '<td>' . htmlspecialchars($teacher, ENT_QUOTES, 'UTF-8') . '</td>';
                }
                ?>
            </tr>
        </table>
        <ul id="klasa">
            <?php
            $classes = ["1SB", "1Ta", "2bSB", "2aSB", "2Ta", "3SB 3bSB", "3aB 3aSB", "3bT", "3aT", "4aT", "5aT"];
            foreach ($classes as $class) {
                echo '<li>' . htmlspecialchars($class, ENT_QUOTES, 'UTF-8') . '</li>';
            }
            ?>
        </ul>
    </nav>
    <aside>
        <h2>Informacje</h2>
    </aside>
    <main>
        <h2>Plan lekcji/Zastępstwa</h2>
        <table border=1>
            <tr>
                <th>Lekcja</th>
                <th>Godzina</th>
                <th>Zajęcia</th>
                <th>Nauczyciel</th>
                <th>Zastępstwo</th>
                <th>Nauczyciel</th>
                <th>Klasa</th>
            </tr>
            <?php
            $lessons = [
                ["1", "8:00-8:45", "W-F", "W.Szafraniec", "W-F", "W.Szafraniec", "1SB"],
                ["2", "8:55-9:40", "W-F", "W.Szafraniec", "W-F", "W.Szafraniec", "1SB"],
                ["3", "9:50-10:35", "W-F", "W.Szafraniec", "W-F", "W.Szafraniec", "1SB"],
                ["4", "10:55-11:40", "W-F", "W.Szafraniec", "W-F", "W.Szafraniec", "1SB"],
                ["5", "11:50-12:35", "W-F", "W.Szafraniec", "W-F", "W.Szafraniec", "1SB"],
                ["6", "12:45-13:30", "W-F", "W.Szafraniec", "W-F", "W.Szafraniec", "1SB"],
                ["7", "13:40-14:25", "W-F", "W.Szafraniec", "W-F", "W.Szafraniec", "1SB"],
                ["8", "14:35-15:20", "W-F", "W.Szafraniec", "W-F", "W.Szafraniec", "1SB"]
            ];
            foreach ($lessons as $lesson) {
                echo '<tr>';
                foreach ($lesson as $item) {
                    echo '<td>' . htmlspecialchars($item, ENT_QUOTES, 'UTF-8') . '</td>';
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
        </div>
    </section>
<script src="script.js"></script>
</body>
</html>