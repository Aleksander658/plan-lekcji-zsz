<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_schedule";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$dayOfWeek = date('N'); // Get the current day of the week (1 = Monday, 7 = Sunday)
$currentHour = date('H'); // Get the current hour
$currentMinute = date('i'); // Get the current minute

$lessonNumber = '';
if ($currentHour == 8 && $currentMinute >= 0 && $currentMinute < 45) {
    $lessonNumber = '1. 8:00-8:45';
} elseif ($currentHour == 8 && $currentMinute >= 45 || $currentHour == 9 && $currentMinute < 35) {
    $lessonNumber = '2. 8:50-9:35';
}

if ($dayOfWeek >= 1 && $dayOfWeek <= 5 && $lessonNumber) { // Monday to Friday with valid lesson number
    $sql = "SELECT lesson_number, class, subject, teacher, room FROM lessons WHERE day_of_week = $dayOfWeek AND lesson_number = '$lessonNumber'";
    $result = $conn->query($sql);

    $lessons = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $lessons[] = [$row["lesson_number"], $row["class"], $row["subject"], $row["teacher"], $row["room"]];
        }
    }
} else {
    $lessons = []; // No lessons on weekends or invalid lesson number
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($lessons);
?>
