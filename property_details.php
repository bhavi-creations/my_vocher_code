<?php include 'navbar.php';  ?>

   
    <div id="overlay" class="overlay"></div>
    <button id="restaurant-icon" class="restaurant-icon">🍽</button>
    <div id="sidebar" class="sidebar side_view">
        <h1 class="side_bar_tittle">Restaurants 🍽</h1>
        <ul id="restaurant-list" class="restaurant-list"></ul>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const restaurantIcon = document.getElementById("restaurant-icon");
            const sidebar = document.getElementById("sidebar");
            const overlay = document.getElementById("overlay");
            
            function openSidebar() {
                sidebar.classList.add("open");
                overlay.classList.add("active");
            }
            
            function closeSidebar() {
                sidebar.classList.remove("open");
                overlay.classList.remove("active");
            }
            
            restaurantIcon.addEventListener("click", openSidebar);
            overlay.addEventListener("click", closeSidebar);
        });

        const restaurants = [
            { name: "Dominos", link: "./business_layout.php" },
            { name: "PizzaHut", link: "./business_layout.php" },
            { name: "KFC", link: "./business_layout.php" },
            { name: "MC donald's", link: "./business_layout.php" },
        ];

        const restaurantList = document.getElementById("restaurant-list");
        restaurants.forEach((restaurant) => {
            const listItem = document.createElement("li");
            const link = document.createElement("a");
            link.href = restaurant.link;
            // link.target = "_blank";
            link.rel = "noopener noreferrer";
            link.textContent = restaurant.name;
            
            listItem.appendChild(link);
            restaurantList.appendChild(listItem);
        });
    </script>



    <section>
        <div class="container">
            <div class="row">
                <img src="assets/img/self_images/top_add.png" class="img-fluid "   alt="">
            </div>
        </div>
    </section>






    <section>
        <div class="container">

            <div class="text-center   ">
                <h1>List Of Properties</h1>
                <h5>Find Your Residency By One Click</h5>
            </div>
            <div class="row">

                <div class="col-lg-7 col-12 order-1 order-md-0">
                    <div class="row    fadeIn" data-wow-delay="0.3s">
                        
 
                        <section class="OfferContainer_exclusive__non wow fadeInUp my-2" data-wow-delay="100ms">
                            <div class="col-12  card_div px-3"  >
                                <div class="row py-3">
                                    
                            
                                     
                                         <h4>Commercial Building   </h4>
                                         <p class="property_p_tag"><strong class="property_strong"> Price :</strong>  Not Provided  </p>
                                         <p class="property_p_tag"> <strong class="property_strong"> Location : </strong>  Suryaraopet, Kkd   </p>
                                         <p class="property_p_tag"> <strong class="property_strong"> Posted On :</strong>  01 jan 2025  </p>
                                         <p class="property_p_tag"><strong class="property_strong"> Contact Person :</strong>  Not Provided  </p>
                                         <p class="property_p_tag"><strong class="property_strong"> Description :</strong>  Ready To Occupy
                                             G+3 Floor Building is Available For Rent.
                                             4 Road Corner Building
                                             Each Floor With 2500 Square Feet Area.
                                             Total Ground Floor With Exclusive Parking.
                                             Floor Wise or Total Building is available
                                             Lift Facility is available.
                                             Facing: North West Corner.
                                             For More Details Contact: 9490188815, 9390219275. (see full description)  </p>
                                              
                                </div>
                            </div>
                        </section>

      
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                document.querySelectorAll(".toggle-terms").forEach(function(link) {
                                    link.addEventListener("click", function(event) {
                                        event.preventDefault(); // Prevent default anchor behavior
                                        
                                        var parentDiv = this.closest(".col-12");
                                        var termsDiv = parentDiv.querySelector(".terms-content");
                                        var separator = parentDiv.querySelector(".terms-separator");
                        
                                        // Toggle visibility
                                        if (termsDiv.style.display === "none" || termsDiv.style.display === "") {
                                            termsDiv.style.display = "block";
                                            separator.style.display = "block"; // Show the separator
                                        } else {
                                            termsDiv.style.display = "none";
                                            separator.style.display = "none"; // Hide the separator
                                        }
                                    });
                                });
                            });
                        </script>
                        
       
                
                    </div>

                </div>

                <div class="col-lg-5  col-12 text_side_div  text-center  order-0 order-md-1">
              
                    <div class="image-gallery">
                        <!-- Main Image Carousel -->
                        <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="assets/img/test/sideimg2.png" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/img/test/2.png" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/img/test/sideimg1.png" class="d-block w-100" alt="...">
                                </div>
                            </div>
                        </div>
                    
                        <!-- Thumbnails Row -->
                        <div class="thumbnail-gallery mt-3">
                            <div class="row gx-2">
                                <div class="col-3">
                                    <img src="assets/img/test/sideimg2.png" class="img-thumbnail thumb active-thumb" data-bs-target="#mainCarousel" data-bs-slide-to="0">
                                </div>
                                <div class="col-3">
                                    <img src="assets/img/test/2.png" class="img-thumbnail thumb" data-bs-target="#mainCarousel" data-bs-slide-to="1">
                                </div>
                                <div class="col-3">
                                    <img src="assets/img/test/sideimg1.png" class="img-thumbnail thumb" data-bs-target="#mainCarousel" data-bs-slide-to="2">
                                </div>
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

                            // Initial active thumbnail
                            setActiveThumbnail(0);

                            // When carousel slides, update thumbnail highlight
                            carousel.addEventListener("slid.bs.carousel", function(e) {
                                setActiveThumbnail(e.to);
                            });

                            // When clicking thumbnail, also highlight it directly
                            thumbnails.forEach((thumb, index) => {
                                thumb.addEventListener("click", () => {
                                    setActiveThumbnail(index);
                                });
                            });
                        });

                    </script>
                    
                </div>


               









                <div id="mobileModal" class="mobile-modal-overlay">
                    <div class="mobile-modal-content">
                        <button class="close-btn" onclick="closeMobileModal()">×</button>
                        <div class="col-12 text_side_div">
                            <img src="assets/img/test/sideimg2.png" alt="" class="img-fluid">
            
                        </div>


                    </div>
                </div>
                
                <script>
                function closeMobileModal() {
                    document.getElementById("mobileModal").style.display = "none";
                }
                
                document.addEventListener("DOMContentLoaded", function() {
                    if (window.innerWidth <= 991) {
                        document.getElementById("mobileModal").style.display = "flex";
                    }
                });
                </script>
                
  

            </div>

        </div>
    </section>






    
    <section>
        <div class="container">
            <div class="row">
                <img src="assets/img/self_images/last_add.png" class="img-fluid "   alt="">
            </div>
        </div>
    </section>

    <script>
        let currentSlide = 0;
        function slideImages() {
            const slides = document.querySelectorAll('.custom-slide');
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add('active');
        }
        setInterval(slideImages, 3000); // Auto-slide every 3 seconds
    </script>

    <script>
        function toggleText(element) {
            let hiddenText = element.previousElementSibling.querySelector(".hidden-text");
            if (hiddenText.style.display === "none" || hiddenText.style.display === "") {
                hiddenText.style.display = "inline";
                element.innerText = "Read Less";
            } else {
                hiddenText.style.display = "none";
                element.innerText = "Read More";
            }
        }

        function toggleImages(element) {
            let imagesDiv = element.nextElementSibling;
            if (imagesDiv.style.display === "none" || imagesDiv.style.display === "") {
                imagesDiv.style.display = "flex";
                element.innerText = "Hide Images";
            } else {
                imagesDiv.style.display = "none";
                element.innerText = "View Images";
            }
        }

        function openLightbox(image) {
            let lightbox = document.getElementById("lightbox");
            let lightboxImg = document.getElementById("lightbox-img");
            lightboxImg.src = image.src;
            lightbox.style.display = "flex";
        }

        function closeLightbox() {
            document.getElementById("lightbox").style.display = "none";
        }
    </script>



<?php include 'footer.php';  ?>
    

 