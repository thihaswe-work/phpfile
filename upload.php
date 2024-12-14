<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['photo'])) {
    $file = $_FILES['photo'];
    $uploadDir = 'uploads/';  // Make sure this path is relative to your upload.php file

    // Check if the file was uploaded without errors
    if ($file['error'] == UPLOAD_ERR_OK) {
        $tmpName = $file['tmp_name'];
        $fileName = basename($file['name']);
        $uploadPath = $uploadDir . $fileName;

        // Attempt to move the uploaded file
        if (move_uploaded_file($tmpName, $uploadPath)) {
            echo "File uploaded successfully!";
        } else {
            echo "Error: Unable to move the uploaded file.";
        }
    } else {
        echo "Error: File upload failed with error code " . $file['error'];
    }
}


