<?php
include '../../db.connection/db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM properties WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $property = mysqli_fetch_assoc($result);
} else {
    $_SESSION['message'] = "Property not found!";
    $_SESSION['msg_type'] = "danger";
    header("Location: properties_list.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['property_name'];
    $location = $_POST['location'];
    $price = $_POST['price'];

    // Handle Image Upload
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $target = "../uploads/properties/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);

        $update_query = "UPDATE properties SET property_name='$name', location='$location', price='$price', image='$image' WHERE id=$id";
    } else {
        $update_query = "UPDATE properties SET property_name='$name', location='$location', price='$price' WHERE id=$id";
    }

    if (mysqli_query($conn, $update_query)) {
        $_SESSION['message'] = "Property updated successfully!";
        $_SESSION['msg_type'] = "success";
        header("Location: properties_list.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<?php include 'header.php'; ?>

<div class="container mt-5">
    <h2>Edit Property</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Property Name</label>
            <input type="text" name="property_name" value="<?php echo $property['property_name']; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Location</label>
            <input type="text" name="location" value="<?php echo $property['location']; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" value="<?php echo $property['price']; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Current Image</label><br>
            <img src="../uploads/properties/<?php echo $property['image']; ?>" width="150">
        </div>
        <div class="form-group">
            <label>Upload New Image (optional)</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update Property</button>
        <a href="properties_list.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php include 'footer.php'; ?>
