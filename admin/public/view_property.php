<?php
include '../../db.connection/db_connection.php';
include 'header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM properties WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $property = mysqli_fetch_assoc($result);
} else {
    $_SESSION['message'] = "Property not found!";
    $_SESSION['msg_type'] = "danger";
    header("Location: properties_list.php"); // Redirect to property list
    exit();
}
?>

<div class="container mt-5">
    <h2>Property Details</h2>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td><?php echo $property['id']; ?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?php echo $property['property_name']; ?></td>
        </tr>
        <tr>
            <th>Location</th>
            <td><?php echo $property['location']; ?></td>
        </tr>
        <tr>
            <th>Price</th>
            <td><?php echo $property['price']; ?></td>
        </tr>
        <tr>
            <th>Image</th>
            <td><img src="../uploads/properties/<?php echo $property['image']; ?>" width="300"></td>
        </tr>
    </table>
    <a href="properties_list.php" class="btn btn-secondary">Back to List</a>
</div>

<?php include 'footer.php'; ?>
