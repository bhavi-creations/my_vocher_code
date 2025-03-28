<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../../db.connection/db_connection.php';

if (isset($_POST['id'])) {
    $adId = mysqli_real_escape_string($conn, $_POST['id']);

    // Check if ID is valid
    if (empty($adId)) {
        echo "error: Missing Ad ID.";
        exit;
    }

    // Get image name before deleting the record
    $query = "SELECT image FROM home_ads WHERE id = '$adId'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "error: Failed to fetch image - " . mysqli_error($conn);
        exit;
    }

    $row = mysqli_fetch_assoc($result);
    $imageName = $row['image'];

    // Upload Directory (Updated Path)
    $imagePath = __DIR__ . "../uploads/home_ads/" . $imageName;

    // Delete image file if it exists
    if (!empty($imageName) && file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Delete record from database
    $deleteQuery = "DELETE FROM home_ads WHERE id = '$adId'";
    if (!mysqli_query($conn, $deleteQuery)) {
        echo "error: " . mysqli_error($conn);
        exit;
    }

    // **Auto-Adjustment of IDs in the database**
    mysqli_query($conn, "SET @num := 0;");
    mysqli_query($conn, "UPDATE home_ads SET id = @num := (@num+1) ORDER BY id;");
    mysqli_query($conn, "ALTER TABLE home_ads AUTO_INCREMENT = 1;");

    echo "success";
}
?>
