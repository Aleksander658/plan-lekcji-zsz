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
    
    <?php
        $jsonData = file_get_contents('important_info.json');
        $importantInfo = json_decode($jsonData, true);
        if ($importantInfo && count($importantInfo) > 0) {
            echo '<aside class="full-width">';
            foreach ($importantInfo as $info) {
                echo '<div class="post">';
                echo '<h3>' . htmlspecialchars($info['title'], ENT_QUOTES, 'UTF-8') . '</h3>';
                echo '<p>' . htmlspecialchars($info['description'], ENT_QUOTES, 'UTF-8') . '</p>';
                if (!empty($info['file'])) {
                    echo '<img src="' . htmlspecialchars($info['file'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($info['title'], ENT_QUOTES, 'UTF-8') . '">';
                }
                echo '</div>';
            }
            echo '</aside>';
        } else {
            ?>
            <aside>
                <h2>Informacje</h2>
                <?php
                $jsonData = file_get_contents('normal_info.json');
                $normalInfo = json_decode($jsonData, true);
                if ($normalInfo && count($normalInfo) > 0) {
                    foreach ($normalInfo as $info) {
                        echo '<div class="post">';
                        echo '<h3>' . htmlspecialchars($info['title'], ENT_QUOTES, 'UTF-8') . '</h3>';
                        echo '<p>' . htmlspecialchars($info['description'], ENT_QUOTES, 'UTF-8') . '</p>';
                        if (!empty($info['file'])) {
                            echo '<img src="' . htmlspecialchars($info['file'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($info['title'], ENT_QUOTES, 'UTF-8') . '">';
                        }
                        echo '<form action="update_info.php" method="post" style="margin-top:10px;">';
                        echo '<input type="hidden" name="delete_title" value="' . htmlspecialchars($info['title'], ENT_QUOTES, 'UTF-8') . '">';
                        echo '<button type="submit" name="delete_normal_info">Usuń</button>';
                        echo '</form>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="post">';
                    echo '<h3>Brak informacji</h3>';
                    echo '<p>Obecnie brak nowych informacji.</p>';
                    echo '</div>';
                }
                ?>
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
            <?php
        }
    ?>
    
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
            $jsonData = file_get_contents('images.json');
            $images = json_decode($jsonData, true);
            if ($images && count($images) > 0) {
                foreach ($images as $index => $image) {
                    $activeClass = $index === 0 ? 'active' : '';
                    echo '<img src="' . htmlspecialchars($image, ENT_QUOTES, 'UTF-8') . '" class="' . $activeClass . '">';
                }
            } else {
                echo '<p>Brak zdjęć</p>';
            }
            ?>
        </div>
    </section>

    <script src="script.js"></script>

</body>
</html>