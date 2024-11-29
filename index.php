<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan lekcji ZSZ Bobowa</title>
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="refresh" content="300">
</head>

<body>
    <article>
        <img src="Logo ZSZ Bobwa.png" alt="Logo ZSZ Bobowa">
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
        <div class="scrollable-table">
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
                    <?php
                    $url = "https://plan.zsz.bobowa.pl/plany/o1.html";
                    $html = file_get_contents($url);
                    $dom = new DOMDocument();
                    @$dom->loadHTML($html);
                    $xpath = new DOMXPath($dom);
                    $rows = $xpath->query('//table[@class="tabela"]//tr');

                    $currentDate = date('Y-m-d');
                    $class = "5aT";

                    foreach ($rows as $row) {
                        $cells = $xpath->query('td', $row);
                        if ($cells->length > 0) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($cells->item(0)->textContent, ENT_QUOTES, 'UTF-8') . '</td>';
                            echo '<td>' . $currentDate . '</td>';
                            echo '<td>' . $class . '</td>';
                            echo '<td>' . htmlspecialchars($cells->item(2)->textContent, ENT_QUOTES, 'UTF-8') . '</td>';
                            echo '<td>' . htmlspecialchars($cells->item(3)->textContent, ENT_QUOTES, 'UTF-8') . '</td>';
                            echo '<td>' . htmlspecialchars($cells->item(4)->textContent, ENT_QUOTES, 'UTF-8') . '</td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </footer>

    <main>
        <h2>Zastępstwa</h2>
        <div class="scrollable-table">
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
                
                $jsonData = file_get_contents('substitutions.json');
                $substitutions = json_decode($jsonData, true);
            
                foreach ($substitutions as $substitution) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($substitution['L&H'], ENT_QUOTES, 'UTF-8') . '</td>';
                    echo '<td>' . htmlspecialchars($substitution['date'], ENT_QUOTES, 'UTF-8') . '</td>';
                    echo '<td>' . htmlspecialchars($substitution['class'], ENT_QUOTES, 'UTF-8') . '</td>';
                    echo '<td>' . htmlspecialchars($substitution['subject'], ENT_QUOTES, 'UTF-8') . '</td>';
                    echo '<td>' . htmlspecialchars($substitution['teacher'], ENT_QUOTES, 'UTF-8') . '</td>';
                    echo '<td>' . htmlspecialchars($substitution['zastepstwo'], ENT_QUOTES, 'UTF-8') . '</td>';
                    echo '<td>' . htmlspecialchars($substitution['teacher2'], ENT_QUOTES, 'UTF-8') . '</td>';
                    echo '</tr>';
                }
                ?>
            
            </table>
        </div>
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