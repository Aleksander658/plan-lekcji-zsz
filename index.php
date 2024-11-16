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
        <ul id="nauczyciele">
            <?php
            $teachers1 = [
                "W.Szafraniec(WS)", "A.Iwańska(AI)", "G.Bogusz(GB)", "E.Brońska(EB)", "K.Flądro(KF)",
                "J.Forczek(JF)", "B.Forczek-Serafin(BF)", "J.Gagatek(GA)", "B.Gryzło(BG)", "M.Gucwa(MG)",
                "T.Gucwa(TG)", "J.Igielski(JI)", "K.Janusz(KJ)", "B.Jasińska(BJ)", "I.Kalisz(IK)",
                "P.Kruczek(PK)", "P.Kuk(PA)", "P.Łebski(PŁ)"
            ];
            foreach ($teachers1 as $teacher) {
                echo '<li>' . htmlspecialchars($teacher, ENT_QUOTES, 'UTF-8') . '</li>';
            }
            ?>
        </ul>
        <ul id="nauczyciele2">
            <?php
            $teachers2 = [
                "T.Magiera(TM)", "K.Paluch(KP)", "R.Pękala(RP)", "P.Ptaszkowski(PP)", "A.Skórska(SÓ)",
                "T.Skórski(SK)", "J.Średniawa(JŚ)", "R.Święs(RŚ)", "S.Szafraniec(SZ)", "S.Szczepanek(SS)",
                "P.Szura(PS)", "J.Wiejaczka(WI)", "J.Wiejaczka(JW)", "E.Wołkowicz(EW)", "J.Zborowska(JZ)"
            ];
            foreach ($teachers2 as $teacher) {
                echo '<li>' . htmlspecialchars($teacher, ENT_QUOTES, 'UTF-8') . '</li>';
            }
            ?>
        </ul>
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
            <tr>
                <td>1</td>
                <td>8:00-8:45</td>
                <td>W-F</td>
                <td>W.Szafraniec</td>
                <td>W-F</td>
                <td>W.Szafraniec</td>
                <td>1SB</td>
            </tr>
            <tr>
                <td>2</td>
                <td>8:55-9:40</td>
                <td>W-F</td>
                <td>W.Szafraniec</td>
                <td>W-F</td>
                <td>W.Szafraniec</td>
                <td>1SB</td>
            </tr>
            <tr>
                <td>3</td>
                <td>9:50-10:35</td>
                <td>W-F</td>
                <td>W.Szafraniec</td>
                <td>W-F</td>
                <td>W.Szafraniec</td>
                <td>1SB</td>
        </table>
    </main>
    <section>
        <h2>Zdjęcia</h2>
        <div class="slideshow-container">
            <img src="zdjecie1.jpg" class="active">
            <img src="zdjecie2.jpg">
            <img src="zdjecie3.jpg">
            <img src="zdjecie4.jpg">
            <img src="zdjecie5.jpg">
            <img src="zdjecie6.jpg">
        </div>
    </section>
<script src="script.js"></script>
</body>
</html>