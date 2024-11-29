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
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
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
            <form action="index2.php" method="post">
                <h1>Dodanie Zastępstwa</h1>
                <label for="L&H">Numer Lekcji i Godzina:</label>
                
                <select id="L&H" name="L&H" required>
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
                <input type="date" id="date" name="date" required>
                
                <br>
                
                <label for="class">Klasa:</label>
                
                <select id="class" name="class" required>
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
                <input type="text" id="subject" name="subject" required>
                
                <br>
                
                <label for="teacher">Nauczyciel:</label>
                
                <select id="teacher" name="teacher" required>
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
                <input type="text" id="zastepstwo" name="zastepstwo" required>
                
                <br>
                
                <label for="teacher2">Nauczyciel na zastępstwo:</label>
                
                <select id="teacher2" name="teacher2" required>
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
            
            <!-- New Form to Add Important Information -->
            <form action="index2.php" method="post" enctype="multipart/form-data">
                <h1>Dodanie Ważnych Informacji</h1>
                <label for="title">Tytuł:</label>
                <input type="text" id="title" name="title" >
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
    
    </main>

</body>
</html>