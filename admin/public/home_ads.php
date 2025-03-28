<?php
// session_start(); // Ensure session starts at the top
include '../../db.connection/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate title
    if (empty($_POST['title'])) {
        $_SESSION['error'] = "Title is required!";
        header("Location: home_ads.php");
        exit();
    }

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $type = isset($_POST['type']) ? mysqli_real_escape_string($conn, $_POST['type']) : 'upper'; // Default to 'upper'

    // Validate if an image is uploaded
    if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        $_SESSION['error'] = "Error uploading image!";
        header("Location: home_ads.php");
        exit();
    }

    $image = $_FILES['image'];
    $imageName = time() . "_" . basename($image['name']); // Unique filename
    $targetDir = "../uploads/home_ads/"; // Updated folder where images will be stored
    $targetFile = $targetDir . $imageName;

    // Validate file type (only images allowed)
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/svg+xml'];
    if (!in_array($image['type'], $allowedTypes)) {
        $_SESSION['error'] = "Invalid file type! Only JPG, PNG, GIF, WEBP, and SVG allowed.";
        header("Location: home_ads.php");
        exit();
    }

    // Ensure uploads folder exists
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Move file to uploads folder
    if (move_uploaded_file($image['tmp_name'], $targetFile)) {
        // Insert into database
        $query = "INSERT INTO home_ads (title, image, type) VALUES ('$title', '$imageName', '$type')";
        if (mysqli_query($conn, $query)) {
            $_SESSION['success'] = "Image uploaded successfully!";
            header("Location: view_home_ads.php");
            exit();
        } else {
            $_SESSION['error'] = "Database error: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['error'] = "Failed to move uploaded file!";
    }

    header("Location: home_ads.php");
    exit();
}
?>

<?php include 'header.php'; ?>

<!-- Page Wrapper -->
<div id="wrapper">

    <?php include 'sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <?php include 'navbar.php'; ?>

        <!-- Main Content -->
        <div id="content">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">UPLOAD IMAGE</h1>
                    <a href="view_home_ads.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fa-regular fa-eye"></i> View Images
                    </a>
                </div>

                <div class="row">
                    <div class="col-xl-11">
                        <div class="card shadow mb-4">
                            <!-- Card Header -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-success">ADD IMAGE</h6>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body">

                                <form style="color:black;" id="addblogform" action="home_ads.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter image title" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="imageType" class="form-label">Select Image Type</label>
                                        <select class="form-control" name="type" id="imageType" placeholder required>
                                            <option value="upper" selected>Upper Image</option>
                                            <option value="lower">Lower Image</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="imageUpload" class="form-label">Select Image</label>
                                        <input type="file" class="form-control" name="image" id="imageUpload" accept="image/*" required>
                                    </div>

                                    <?php
                                    if (isset($_SESSION['success'])) {
                                        echo "<div class='alert alert-success' id='successMessage' role='alert'>" . $_SESSION['success'] . "</div>";
                                        unset($_SESSION['success']);
                                    }
                                    if (isset($_SESSION['error'])) {
                                        echo "<div class='alert alert-danger' id='errorMessage' role='alert'>" . $_SESSION['error'] . "</div>";
                                        unset($_SESSION['error']);
                                    }
                                    ?>

                                    <div class="row p-3">
                                        <div class="col-xl-7 col-sm-2"></div>
                                        <button type="reset" class="btn btn-danger mx-1 my-2 col-xl-2">Clear</button>
                                        <button type="submit" class="btn btn-success mx-1 my-2 col-xl-2">Upload Image</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    // Auto-hide success/error message after 4 seconds
                    setTimeout(function() {
                        let successMessage = document.getElementById("successMessage");
                        let errorMessage = document.getElementById("errorMessage");
                        if (successMessage) successMessage.style.display = "none";
                        if (errorMessage) errorMessage.style.display = "none";
                    }, 4000);
                </script>

            </div>
        </div>

    </div>

</div>

<?php include 'end.php'; ?>
