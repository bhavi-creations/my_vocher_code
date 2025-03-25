<?php
include 'header.php';
?>

<!-- Page Wrapper -->
<div id="wrapper">
    <?php include 'sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <?php include 'navbar.php'; ?>

        <div id="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Add Travel Package</h1>
                    <a href="travel_packages.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fa-regular fa-eye"></i> View Travel Packages
                    </a>
                </div>

                <?php
                include '../../db.connection/db_connection.php';

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $title = $_POST['title'];
                    $destination = $_POST['destination'];
                    $price = (int) $_POST['price'];
                    $phone = $_POST['phone'];
                    $duration = $_POST['duration'];
                    $departure_date = $_POST['departure_date'];
                    $return_date = $_POST['return_date'];
                    $description = $_POST['description'];
                    $amenities = isset($_POST['amenities']) ? implode(',', $_POST['amenities']) : '';

                    // ✅ Set Correct Upload Path (Relative Path)
                    $upload_folder = "../uploads/travel/";

                    // ✅ Ensure Directory Exists
                    if (!file_exists($upload_folder)) {
                        mkdir($upload_folder, 0777, true);
                    }

                    // ✅ Single Image Upload
                    $image_name = '';
                    if (!empty($_FILES['image']['name'])) {
                        $image_name = time() . '_' . basename($_FILES['image']['name']);
                        $image_path = $upload_folder . $image_name;

                        if (!move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
                            $_SESSION['message'] = "Error: Failed to upload main image.";
                            $_SESSION['msg_type'] = "danger";
                            header("Location: add_travel.php");
                            exit();
                        }
                    }

                    // ✅ Multiple File Uploads
                    $multiple_images = [];
                    if (!empty($_FILES['package_images']['name'][0])) {
                        foreach ($_FILES['package_images']['name'] as $key => $file_name) {
                            $file_tmp = $_FILES['package_images']['tmp_name'][$key];
                            $unique_file_name = time() . '_' . basename($file_name);
                            $file_path = $upload_folder . $unique_file_name;

                            if (move_uploaded_file($file_tmp, $file_path)) {
                                $multiple_images[] = $unique_file_name;
                            } else {
                                $_SESSION['message'] = "Error: Failed to upload $file_name.";
                                $_SESSION['msg_type'] = "danger";
                                header("Location: add_travel.php");
                                exit();
                            }
                        }
                    }
                    $multiple_images_str = implode(',', $multiple_images);

                    // ✅ Insert into Database
                    $query = "INSERT INTO travel_packages (title, destination, price, phone, duration, departure_date, return_date, amenities, image, images, description) 
                              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("ssisissssss", $title, $destination, $price, $phone, $duration, $departure_date, $return_date, $amenities, $image_name, $multiple_images_str, $description);

                    if ($stmt->execute()) {
                        $_SESSION['message'] = "Travel package added successfully!";
                        $_SESSION['msg_type'] = "success";
                        header("Location: add_travel.php");
                        exit();
                    } else {
                        $_SESSION['message'] = "Error: " . $stmt->error;
                        $_SESSION['msg_type'] = "danger";
                        header("Location: add_travel.php");
                        exit();
                    }
                }
                ?>

                <!-- ✅ Success Message Display in HTML -->
                <?php if (isset($_SESSION['message'])): ?>
                    <div id="alert-box" class="alert alert-<?php echo $_SESSION['msg_type']; ?>">
                        <?php
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                        ?>
                    </div>

                    <script>
                        setTimeout(function() {
                            let alertBox = document.getElementById('alert-box');
                            if (alertBox) {
                                alertBox.style.display = 'none';
                            }
                        }, 3000);
                    </script>
                <?php endif; ?>

                <!-- Travel Package Form -->
                <div class="container">
                    <form action="add_travel.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Title:</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Destination:</label>
                                <input type="text" name="destination" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Price:</label>
                                <input type="text" name="price" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone Number:</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Duration (days):</label>
                                <input type="number" name="duration" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Departure Date:</label>
                                <input type="date" name="departure_date" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Return Date:</label>
                                <input type="date" name="return_date" class="form-control" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Amenities:</label><br>
                                <input type="checkbox" name="amenities[]" value="Meals"> Meals
                                <input type="checkbox" name="amenities[]" value="Tour Guide"> Tour Guide
                                <input type="checkbox" name="amenities[]" value="Hotel Stay"> Hotel Stay
                                <input type="checkbox" name="amenities[]" value="Transport"> Transport
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Main Image:</label>
                                <input type="file" name="image" required>

                                <label>Upload More Images:</label>
                                <input type="file" name="package_images[]" multiple>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Description:</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">Add Travel Package</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </div>
</div>
<?php include 'end.php'; ?>