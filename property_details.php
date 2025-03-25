<?php
include 'navbar.php';
include './db.connection/db_connection.php';

if (isset($_GET['id'])) {
    $property_id = $_GET['id'];

    // Fetch property details
    $query = "SELECT * FROM properties WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $property_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $property = $result->fetch_assoc();

    if (!$property) {
        echo "<h2 class='text-center'>Property not found</h2>";
        exit;
    }

    // Fetch multiple images for the property
    $image_query = "SELECT images FROM properties WHERE id = ?";
    $image_stmt = $conn->prepare($image_query);
    $image_stmt->bind_param("i", $property_id);
    $image_stmt->execute();
    $image_result = $image_stmt->get_result();
    $images = explode(',', $property['images']);

    while ($row = $image_result->fetch_assoc()) {
        $images[] = $row['images'];
    }
} else {
    echo "<h2 class='text-center'>Invalid Property</h2>";
    exit;
}
?>

<section>
    <div class="container">
        <h1 class="text-center"><?php echo htmlspecialchars($property['title']); ?></h1>
        <div class="row">

            <div class="col-lg-7 col-12 order-1 order-md-0">
                <div class="row fadeIn" data-wow-delay="0.3s">
                    <section class="OfferContainer_exclusive__non wow fadeInUp my-2" data-wow-delay="100ms">
                        <div class="col-12 card_div px-3">
                            <div class="row py-3">
                                <h4><?php echo htmlspecialchars($property['type']); ?></h4>
                                <p><strong>Price:</strong> <?php echo htmlspecialchars($property['price']); ?></p>
                                <p><strong>Location:</strong> <?php echo htmlspecialchars($property['location']); ?></p>
                                <p><strong>Posted On:</strong> <?php echo htmlspecialchars($property['created_at']); ?></p>
                                <p><strong>Contact Person:</strong> <?php echo htmlspecialchars($property['phone']); ?></p>
                                <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($property['description'])); ?></p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <div class="col-lg-5 col-12 text_side_div text-center order-0 order-md-1">
                <div class="image-gallery">
                    <!-- Main Image Carousel -->
                    <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                        <div class="carousel-inner">
                            <?php
                            if (!empty($images)) {
                                foreach ($images as $index => $image) {
                                    $image = trim($image); // Ensure clean filenames
                                    $activeClass = ($index === 0) ? "active" : "";
                                    echo "
                                    <div class='carousel-item $activeClass'>
                                        <img src='./admin/uploads/properties/$image' class='d-block w-100' alt='Property Image'>
                                    </div>";
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Thumbnails Row -->
                    <div class="thumbnail-gallery mt-3">
                        <div class="row gx-2">
                            <?php
                            if (!empty($images)) {
                                foreach ($images as $index => $image) {
                                    $image = trim($image); // Remove extra spaces
                                    $activeClass = ($index === 0) ? "active-thumb" : "";
                                    echo "
                                <div class='col-3'>
                                    <img src='./admin/uploads/properties/$image' class='img-thumbnail thumb $activeClass' data-bs-target='#mainCarousel' data-bs-slide-to='$index'>
                                </div>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>


                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const thumbnails = document.querySelectorAll(".thumb");
                        const carousel = document.getElementById("mainCarousel");

                        function setActiveThumbnail(index) {
                            thumbnails.forEach((thumb, i) => {
                                thumb.classList.toggle("active-thumb", i === index);
                            });
                        }

                        setActiveThumbnail(0);

                        carousel.addEventListener("slid.bs.carousel", function(e) {
                            setActiveThumbnail(e.to);
                        });

                        thumbnails.forEach((thumb, index) => {
                            thumb.addEventListener("click", () => {
                                setActiveThumbnail(index);
                            });
                        });
                    });
                </script>
            </div>

        </div>
    </div>
</section>

<?php include 'footer.php'; ?>