<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_info'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $filePath = '';

        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $fileName = basename($_FILES['file']['name']);
            $filePath = $uploadDir . $fileName;
            move_uploaded_file($_FILES['file']['tmp_name'], $filePath);
        }

        $newInfo = [
            'title' => $title,
            'description' => $description,
            'file' => $filePath
        ];

        $jsonData = file_get_contents('important_info.json');
        $importantInfo = json_decode($jsonData, true);
        if (!$importantInfo) {
            $importantInfo = [];
        }
        $importantInfo[] = $newInfo;
        file_put_contents('important_info.json', json_encode($importantInfo));
    }

    if (isset($_POST['delete_info'])) {
        file_put_contents('important_info.json', json_encode([]));
    }

    header("Location: index2.php");
    exit;
}
?>
