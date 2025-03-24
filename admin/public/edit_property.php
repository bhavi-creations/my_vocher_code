<?php include 'header.php'; ?>

<!-- Page Wrapper -->
<div id="wrapper">
    <?php include 'sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <?php include 'navbar.php'; ?>

        <div id="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Available Services</h1>
                    <a href="add_service.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fa-solid fa-plus"></i> Add Property Types
                    </a>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="row row-custom no-gutters col-12">

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
                                header("Location: properties.php");
                                exit();
                            }

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $name = $_POST['title'];
                                $location = $_POST['location'];
                                $price = $_POST['price'];

                                // Handle Image Upload
                                if (!empty($_FILES['image']['name'])) {
                                    $image = $_FILES['image']['name'];
                                    $target = "../uploads/properties/" . basename($image);
                                    move_uploaded_file($_FILES['image']['tmp_name'], $target);

                                    $update_query = "UPDATE properties SET title='$name', location='$location', price='$price', image='$image' WHERE id=$id";
                                } else {
                                    $update_query = "UPDATE properties SET title='$name', location='$location', price='$price' WHERE id=$id";
                                }

                                if (mysqli_query($conn, $update_query)) {
                                    $_SESSION['message'] = "Property updated successfully!";
                                    $_SESSION['msg_type'] = "success";
                                    header("Location: properties.php");
                                    exit();
                                } else {
                                    echo "Error updating record: " . mysqli_error($conn);
                                }
                            }
                            ?>


                            <div class="container mt-5">
                                <h2>Edit Property</h2>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Property Name</label>
                                        <input type="text" name="title" value="<?php echo $property['title']; ?>" class="form-control" required>
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
                                    <a href="properties.php" class="btn btn-secondary">Cancel</a>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>

        <?php include 'footer.php'; ?>
    </div>
</div>

<?php include 'end.php'; ?>