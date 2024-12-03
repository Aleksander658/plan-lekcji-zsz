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

    if (isset($_POST['add_normal_info'])) {
        $title = $_POST['info_title'];
        $description = $_POST['info_description'];
        $filePath = '';

        if (isset($_FILES['info_file']) && $_FILES['info_file']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $fileName = basename($_FILES['info_file']['name']);
            $filePath = $uploadDir . $fileName;
            move_uploaded_file($_FILES['info_file']['tmp_name'], $filePath);
        }

        $newInfo = [
            'title' => $title,
            'description' => $description,
            'file' => $filePath
        ];

        $jsonData = file_get_contents('normal_info.json');
        $normalInfo = json_decode($jsonData, true);
        if (!$normalInfo) {
            $normalInfo = [];
        }
        $normalInfo[] = $newInfo;
        file_put_contents('normal_info.json', json_encode($normalInfo));
    }

    if (isset($_POST['delete_normal_info']) && isset($_POST['delete_title'])) {
        $deleteTitle = $_POST['delete_title'];
        $jsonData = file_get_contents('normal_info.json');
        $normalInfo = json_decode($jsonData, true);
        $normalInfo = array_filter($normalInfo, function($info) use ($deleteTitle) {
            return $info['title'] !== $deleteTitle;
        });
        file_put_contents('normal_info.json', json_encode(array_values($normalInfo)));
    }

    // Handle adding a new image
    if (isset($_POST['add_image'])) {
        if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $fileName = basename($_FILES['image_file']['name']);
            $filePath = $uploadDir . $fileName;
            move_uploaded_file($_FILES['image_file']['tmp_name'], $filePath);

            // Update images.json
            $jsonData = file_get_contents('images.json');
            $images = json_decode($jsonData, true);
            if (!$images) {
                $images = [];
            }
            $images[] = $filePath;
            file_put_contents('images.json', json_encode($images));
        }
    }

    // Handle deleting an image
    if (isset($_POST['delete_image_btn']) && isset($_POST['delete_image'])) {
        $deleteImage = $_POST['delete_image'];
        $jsonData = file_get_contents('images.json');
        $images = json_decode($jsonData, true);
        if ($images) {
            // Filter out the image to be deleted
            $images = array_filter($images, function($image) use ($deleteImage) {
                return basename($image) !== $deleteImage;
            });
            file_put_contents('images.json', json_encode(array_values($images)));

            // Optionally, delete the image file from the server
            $filePath = 'uploads/' . $deleteImage;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }

    header("Location: index2.php");
    exit;
}
?>
