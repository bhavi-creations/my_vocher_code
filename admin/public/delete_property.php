<?php
include '../../db.connection/db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Get Image Path
    $query = "SELECT image FROM properties WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $property = mysqli_fetch_assoc($result);

    // Delete Image File
    $imagePath = "../uploads/properties/" . $property['image'];
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Delete Property from Database
    $delete_query = "DELETE FROM properties WHERE id = $id";
    if (mysqli_query($conn, $delete_query)) {
        $_SESSION['message'] = "Property deleted successfully!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Failed to delete property!";
        $_SESSION['msg_type'] = "danger";
    }
}

header("Location: properties_list.php");
exit();
?>
