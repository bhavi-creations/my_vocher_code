<?php
include '../../db.connection/db_connection.php';
session_start(); // Start session to store messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $slug = strtolower(str_replace(' ', '-', $name)); // Convert name to URL-friendly slug

    $query = "INSERT INTO services (name, slug) VALUES ('$name', '$slug')";
    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = "Service added successfully!";
    } else {
        $_SESSION['error'] = "Error adding service. Please try again.";
    }
    
    header("Location: new_service.php"); // Redirect to prevent form resubmission
    exit();
}
?>
