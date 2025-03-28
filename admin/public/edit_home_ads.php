<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../../db.connection/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adId = isset($_POST['id']) ? mysqli_real_escape_string($conn, $_POST['id']) : null;
    $title = isset($_POST['title']) ? mysqli_real_escape_string($conn, $_POST['title']) : null;

    if (empty($adId) || empty($title)) {
        echo "error: Missing required fields.";
        exit;
    }

    // Get existing image (if any)
    $query = "SELECT image FROM home_ads WHERE id = '$adId'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "error: Failed to fetch record - " . mysqli_error($conn);
        exit;
    }

    $row = mysqli_fetch_assoc($result);
    $oldImage = !empty($row['image']) ? $row['image'] : null;

    // Upload Directory (Updated Path)
    $targetDir = __DIR__ . "../uploads/home_ads/";

    // Ensure directory exists
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $updateQuery = "UPDATE home_ads SET title = '$title' WHERE id = '$adId'";

    // Check if a new image is uploaded
    if (!empty($_FILES['image']['name'])) {
        $imageName = time() . "_" . basename($_FILES["image"]["name"]); // Unique file name
        $targetFilePath = $targetDir . $imageName;

        // Move new file to uploads folder
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            // Delete Old Image (if exists)
            if ($oldImage && file_exists($targetDir . $oldImage)) {
                unlink($targetDir . $oldImage);
            }

            // Update query to include new image
            $updateQuery = "UPDATE home_ads SET title = '$title', image = '$imageName' WHERE id = '$adId'";
        } else {
            echo "error: Image upload failed.";
            exit;
        }
    }

    // Execute the update query
    if (mysqli_query($conn, $updateQuery)) {
        echo "success";
    } else {
        echo "error: " . mysqli_error($conn);
    }
}
?>
