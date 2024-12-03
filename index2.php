<?php
session_start();

$users = [
    'admin' => 'Zszbobowa123!', // Replace with actual username and password
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['loggedin'] = true;
    } else {
        $error = "Invalid username or password.";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index2.php");
    exit;
}

if (!isset($_SESSION['loggedin'])) {
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>
    <main>
        <form action="index2.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <br>
            <button type="submit" name="login">Login</button>
            <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        </form>
    </main>
</body>
</html>
<?php
    exit;
}
?>
<?php
// Handle form submissions by redirecting to update_info.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'update_info.php';
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wprowadzenie danych do Zastępstwa</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    
    <header>
        <h1>Wprowadzenie danych do Zastępstwa</h1>
        <a href="index2.php?logout=true">Logout</a>
    </header>

    <main>
        <div class="form-container">
            <div class="form-center">
                <form action="index2.php" method="post">
                    <h1>Dodanie Zastępstwa</h1>
                    <label for="L&H">Numer Lekcji i Godzina:</label>
                    <select id="L&H" name="L&H">
                        <option value="1. 8:00-8:45">1. 8:00-8:45</option>
                        <option value="2. 8:50-9:35">2. 8:50-9:35</option>
                        <!-- Add more options as needed -->
                        <option value="3. 9:40-10:25">3. 9:40-10:25</option>
                        <option value="4. 10:40-11:25">4. 10:40-11:25</option>
                        <option value="5. 11:30-12:15">5. 11:30-12:15</option>
                        <option value="6. 12:20-13:05">6. 12:20-13:05</option>
                        <option value="7. 13:10-13:55">7. 13:10-13:55</option>
                        <option value="8. 14:00-14:45">8. 14:00-14:45</option>
                        <option value="9. 14:50-15:35">9. 14:50-15:35</option>
                    </select>
                    <br>
                    <label for="date">Data:</label>
                    <input type="date" id="date" name="date">
                    <br>
                    <label for="class">Klasa:</label>
                    <select id="class" name="class">
                        <option value="1SB">1SB</option>
                        <!-- Add more options as needed -->
                        <option value="1Ta">1Ta</option>
                        <option value="2bSB">2bSB</option>
                        <option value="2aSB">2aSB</option>
                        <option value="2Ta">2Ta</option>
                        <option value="3SB 3bSB">3Sb 3bSB</option>
                        <option value="3aB 3aSB">3aB 3aSB</option>
                        <option value="3bT">3bT</option>
                        <option value="3aT">3aT</option>
                        <option value="4aT">4aT</option>
                        <option value="5aT">5aT</option>
                    </select>
                    <br>
                    <label for="subject">Zajęcia:</label>
                    <input type="text" id="subject" name="subject">
                    <br>
                    <label for="teacher">Nauczyciel:</label>
                    <select id="teacher" name="teacher">
                        <option value="W.Szafraniec">W.Szafraniec</option>
                        <!-- Add more options as needed -->
                        <option value="A.Iwańska">A.Iwańska</option>
                        <option value="G.Bogusz">G.Bogusz</option>
                        <option value="E.Brońska">E.Brońska</option>
                        <option value="K.Flądro">K.Flądro</option>
                        <option value="J.Forczek">J.Forczek</option>
                        <option value="B.Forczek-Serafin">B.Forczek-Serafin</option>
                        <option value="J.Gagatek">J.Gagatek</option>
                        <option value="B.Gryzło">B.Gryzło</option>
                        <option value="M.Gucwa">M.Gucwa</option>
                        <option value="T.Gucwa">T.Gucwa</option>
                        <option value="J.Igielski">J.Igielski</option>
                        <option value="K.Janusz">K.Janusz</option>
                        <option value="B.Jasińska">B.Jasińska</option>
                        <option value="I.Kalisz">I.Kalisz</option>
                        <option value="P.Kruczek">P.Kruczek</option>
                        <option value="P.Kuk">P.Kuk</option>
                        <option value="P.Łebski">P.Łebski</option>
                        <option value="T.Magiera">T.Magiera</option>
                        <option value="K.Paluch">K.Paluch</option>
                        <option value="R.Pękala">R.Pękala</option>
                        <option value="P.Ptaszkowski">P.Ptaszkowski</option>
                        <option value="A.Skórska">A.Skórska</option>
                        <option value="T.Skórski">T.Skórski</option>
                        <option value="J.Średniawa">J.Średniawa</option>
                        <option value="R.Święs">R.Święs</option>
                        <option value="S.Szafraniec">S.Szafraniec</option>
                        <option value="S.Szczepanek">S.Szczepanek</option>
                        <option value="P.Szura">P.Szura</option>
                        <option value="J.Wiejaczka">J.Wiejaczka</option>
                        <option value="E.Wołkowicz">E.Wołkowicz</option>
                        <option value="J.Zborowska">J.Zborowska</option>
                        <option value="-">-</option>
                    </select>
                    <br>
                    <label for="zastepstwo">Zastępstwo:</label>
                    <input type="text" id="zastepstwo" name="zastepstwo">
                    <br>
                    <label for="teacher2">Nauczyciel na zastępstwo:</label>
                    <select id="teacher2" name="teacher2">
                        <option value="W.Szafraniec">W.Szafraniec</option>
                        <!-- Add more options as needed -->
                        <option value="A.Iwańska">A.Iwańska</option>
                        <option value="G.Bogusz">G.Bogusz</option>
                        <option value="E.Brońska">E.Brońska</option>
                        <option value="K.Flądro">K.Flądro</option>
                        <option value="J.Forczek">J.Forczek</option>
                        <option value="B.Forczek-Serafin">B.Forczek-Serafin</option>
                        <option value="J.Gagatek">J.Gagatek</option>
                        <option value="B.Gryzło">B.Gryzło</option>
                        <option value="M.Gucwa">M.Gucwa</option>
                        <option value="T.Gucwa">T.Gucwa</option>
                        <option value="J.Igielski">J.Igielski</option>
                        <option value="K.Janusz">K.Janusz</option>
                        <option value="B.Jasińska">B.Jasińska</option>
                        <option value="I.Kalisz">I.Kalisz</option>
                        <option value="P.Kruczek">P.Kruczek</option>
                        <option value="P.Kuk">P.Kuk</option>
                        <option value="P.Łebski">P.Łebski</option>
                        <option value="T.Magiera">T.Magiera</option>
                        <option value="K.Paluch">K.Paluch</option>
                        <option value="R.Pękala">R.Pękala</option>
                        <option value="P.Ptaszkowski">P.Ptaszkowski</option>
                        <option value="A.Skórska">A.Skórska</option>
                        <option value="T.Skórski">T.Skórski</option>
                        <option value="J.Średniawa">J.Średniawa</option>
                        <option value="R.Święs">R.Święs</option>
                        <option value="S.Szafraniec">S.Szafraniec</option>
                        <option value="S.Szczepanek">S.Szczepanek</option>
                        <option value="P.Szura">P.Szura</option>
                        <option value="J.Wiejaczka">J.Wiejaczka</option>
                        <option value="E.Wołkowicz">E.Wołkowicz</option>
                        <option value="J.Zborowska">J.Zborowska</option>
                        <option value="-">-</option>
                    </select>
                    <button type="submit">Dodaj</button>
                </form>
            </div>

<<<<<<< HEAD
        <h2>Dodaj Ważne Informacje</h2>
        <form action="index2.php" method="post">
            <label for="info-title">Tytuł:</label>
            <input type="text" id="info-title" name="info-title" required>
            <br>
            <label for="info-content">Treść:</label>
            <textarea id="info-content" name="info-content" required></textarea>
            <br>
            <label for="info-date">Data:</label>
            <input type="date" id="info-date" name="info-date" required>
            <br>
            <button type="submit" name="add-info">Dodaj</button>
        </form>

        <h2>Usuń Ważne Informacje</h2>
        <form action="index2.php" method="post">
            <button type="submit" name="remove-info">Usuń</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['login'])) {
            if (isset($_POST['add-info'])) {
                $info = [
                    'title' => $_POST['info-title'],
                    'content' => $_POST['info-content'],
                    'date' => $_POST['info-date']
                ];

                file_put_contents('info.json', json_encode($info));
            } elseif (isset($_POST['remove-info'])) {
                if (file_exists('info.json')) {
                    unlink('info.json');
                }
            } else {
                $data = [
                    'L&H' => $_POST['L&H'],
                    'date' => $_POST['date'],
                    'class' => $_POST['class'],
                    'subject' => $_POST['subject'],
                    'teacher' => $_POST['teacher'],
                    'zastepstwo' => $_POST['zastepstwo'],
                    'teacher2' => $_POST['teacher2']
                ];

                $jsonData = file_get_contents('substitutions.json');
                $substitutions = json_decode($jsonData, true);
                $substitutions[] = $data;
                file_put_contents('substitutions.json', json_encode($substitutions));
            }
        }
        ?>
    
=======
            <div class="form-left">
                <!-- New Form to Add Important Information -->
                <form action="index2.php" method="post" enctype="multipart/form-data">
                    <h1>Dodanie Ważnych Informacji</h1>
                    <label for="title">Tytuł:</label>
                    <input type="text" id="title" name="title">
                    <br>
                    <label for="description">Opis:</label>
                    <textarea id="description" name="description"></textarea>
                    <br>
                    <label for="file">Plik:</label>
                    <input type="file" id="file" name="file">
                    <br>
                    <button type="submit" name="add_info">Dodaj Informację</button>
                    <button type="submit" name="delete_info">Usuń Informacje</button>
                </form>
            </div>

            <div class="form-right">
                <!-- Form to Add Normal Information -->
                <form action="index2.php" method="post" enctype="multipart/form-data">
                    <h1>Dodanie Informacji</h1>
                    <label for="info_title">Tytuł:</label>
                    <input type="text" id="info_title" name="info_title">
                    <br>
                    <label for="info_description">Opis:</label>
                    <textarea id="info_description" name="info_description"></textarea>
                    <br>
                    <label for="info_file">Plik:</label>
                    <input type="file" id="info_file" name="info_file">
                    <br>
                    <button type="submit" name="add_normal_info">Dodaj Informację</button>
                    <!-- Add a field to specify which information to delete -->
                    <input type="text" name="delete_title" placeholder="Tytuł do usunięcia">
                    <button type="submit" name="delete_normal_info">Usuń Informacje</button>
                </form>
            </div>

            <div class="form-left">
                <!-- Form to Add Images -->
                <form action="index2.php" method="post" enctype="multipart/form-data">
                    <h1>Dodanie Zdjęcia</h1>
                    <label for="image_file">Plik:</label>
                    <input type="file" id="image_file" name="image_file">
                    <br>
                    <button type="submit" name="add_image">Dodaj Zdjęcie</button>
                </form>
            </div>

            <div class="form-right">
                <!-- Form to Delete Images -->
                <form action="index2.php" method="post">
                    <h1>Usunięcie Zdjęcia</h1>
                    <label for="delete_image">Nazwa pliku do usunięcia:</label>
                    <input type="text" id="delete_image" name="delete_image" placeholder="np. image1.jpg">
                    <br>
                    <button type="submit" name="delete_image_btn">Usuń Zdjęcie</button>
                </form>
            </div>
        </div>
>>>>>>> 8fc0789d6ef5ecef65a0e66c0e94e5aa6e9f8de4
    </main>

</body>
</html>