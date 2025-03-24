<?php include 'navbar.php';  ?>


<div id="overlay" class="overlay"></div>
<button id="restaurant-icon" class="restaurant-icon">🏠</button>


<div id="sidebar" class="sidebar side_view">
    <h1 class="side_bar_tittle">Propertys 🏠</h1>
    <ul id="restaurant-list" class="restaurant-list"></ul>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
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

    const restaurants = [{
            name: "House Rent",
            link: "#"
        },
        {
            name: "Commercial Rent",
            link: "#"
        },
        {
            name: "House Sale",
            link: "#"
        },
        {
            name: "Commercial Sale",
            link: "#"
        },
        {
            name: "Land Sale",
            link: "#"
        },
        {
            name: "Land Lease",
            link: "#"
        },
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
















<div class="container text-center">
    <!-- For larger screens (lg and up) - Show buttons -->
    <div class="filter_buttons redirect_section mt-5 d-none d-lg-flex flex-wrap justify-content-center">
        <a href="blogs.php?service= "><button class="redirect_blog_srivice">All</button></a>
        <a href="blogs.php?service= "><button class="redirect_blog_srivice">House Rent</button></a>
        <a href="blogs.php?service= "><button class="redirect_blog_srivice">Commercial Rent</button></a>
        <a href="blogs.php?service= "><button class="redirect_blog_srivice">House Sale</button></a>
        <a href="blogs.php?service= "><button class="redirect_blog_srivice">Commercial Sale</button></a>
        <a href="blogs.php?service= "><button class="redirect_blog_srivice">Land Sale</button></a>
        <a href="blogs.php?service= "><button class="redirect_blog_srivice">Land Lease</button></a>
    </div>

    <!-- For smaller screens (md and below) - Show dropdown -->
    <div class="d-lg-none mt-5">
        <select id="filterDropdown" class="form-select">
            <option value="blogs.php?service=">All</option>
            <option value="blogs.php?service= ">House Rent</option>
            <option value="blogs.php?service= ">Commercial Rent</option>
            <option value="blogs.php?service= ">House Sale</option>
            <option value="blogs.php?service= ">Commercial Sale</option>
            <option value="blogs.php?service= ">Land Sale</option>
            <option value="blogs.php?service= ">Land Lease</option>
        </select>
    </div>
</div>

<script>
    document.getElementById('filterDropdown').addEventListener('change', function() {
        window.location.href = this.value;
    });
</script>




<section>
    <div class="container">

        <div class="text-center   ">
            <h1>List Of Properties</h1>
            <h5>Find Your Residency By One Click</h5>
        </div>
        <div class="row">

            <div class="col-lg-9 col-12 ">
                <div class="row    fadeIn" data-wow-delay="0.3s">





                    <section class="OfferContainer_exclusive__non wow fadeInUp my-2" data-wow-delay="100ms">
                        <div class="col-12  card_div px-3">
                            <div class="row  py-3">
                                <div class="col-12 col-md-3 job_image_card">
                                    <img src="assets/img/test/sideimg1.png" class="img-fluid company_logo_size" alt="">

                                </div>

                                <div class="col-12 col-md-9">
                                    <h4>Commercial Building </h4>
                                    <p class="property_p_tag"><strong class="property_strong"> Price :</strong> Not Provided </p>
                                    <p class="property_p_tag"> <strong class="property_strong"> Location : </strong> Suryaraopet, Kkd </p>
                                    <p class="property_p_tag"> <strong class="property_strong"> Posted On :</strong> 01 jan 2025 </p>

                                    <p class="sale_tag"> For Sale </p>

                                </div>




                                <div class="col-12 terms_cond_styles">
                                    <div class="terms_justify">

                                        <p>
                                            <a href="#" class="toggle-terms">View More Details</a>
                                        </p>
                                    </div>

                                    <div class="terms-content mb-3" style="display: none;">
                                        <h4>Ad Details</h4>
                                        <p class="property_p_tag"><strong class="property_strong"> Contact Person :</strong> Not Provided </p>
                                        <p class="property_p_tag"><strong class="property_strong"> Description :</strong> Ready To Occupy
                                            G+3 Floor Building is Available For Rent.
                                            4 Road Corner Building
                                            Each Floor With 2500 Square Feet Area.
                                            Total Ground Floor With Exclusive Parking.
                                            Floor Wise or Total Building is available
                                            Lift Facility is available.
                                            Facing: North West Corner.
                                            For More Details Contact: 9490188815, 9390219275. (see full description) </p>
                                        <a href="property_details.php" class=" ">View full Details</a>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </section>

                    <section class="OfferContainer_exclusive__non wow fadeInUp my-2" data-wow-delay="100ms">
                        <div class="col-12  card_div px-3">
                            <div class="row  py-3">
                                <div class="col-12 col-md-3 job_image_card">
                                    <img src="assets/img/test/sideimg1.png" class="img-fluid company_logo_size" alt="">

                                </div>

                                <div class="col-8 col-md-9">
                                    <h4>Commercial Building </h4>
                                    <p class="property_p_tag"><strong class="property_strong"> Price :</strong> Not Provided </p>
                                    <p class="property_p_tag"> <strong class="property_strong"> Location : </strong> Suryaraopet, Kkd </p>
                                    <p class="property_p_tag"> <strong class="property_strong"> Posted On :</strong> 01 jan 2025 </p>
                                    <p class="rent_tag"> For Rent </p>


                                </div>




                                <div class="col-12 terms_cond_styles">
                                    <div class="terms_justify">

                                        <p>
                                            <a href="#" class="toggle-terms">View More Details</a>
                                        </p>
                                    </div>

                                    <div class="terms-content mb-3" style="display: none;">
                                        <h4>Ad Details</h4>
                                        <p class="property_p_tag"><strong class="property_strong"> Contact Person :</strong> Not Provided </p>
                                        <p class="property_p_tag"><strong class="property_strong"> Description :</strong> Ready To Occupy
                                            G+3 Floor Building is Available For Rent.
                                            4 Road Corner Building
                                            Each Floor With 2500 Square Feet Area.
                                            Total Ground Floor With Exclusive Parking.
                                            Floor Wise or Total Building is available
                                            Lift Facility is available.
                                            Facing: North West Corner.
                                            For More Details Contact: 9490188815, 9390219275. (see full description) </p>
                                        <a href="property_details.php" class=" ">View full Details</a>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </section>


                    <section class="OfferContainer_exclusive__non wow fadeInUp my-2" data-wow-delay="100ms">
                        <div class="col-12  card_div px-3">
                            <div class="row  py-3">
                                <div class="col-12 col-md-3 job_image_card">
                                    <img src="assets/img/test/sideimg1.png" class="img-fluid company_logo_size" alt="">

                                </div>

                                <div class="col-8 col-md-9">
                                    <h4>Commercial Building </h4>
                                    <p class="property_p_tag"><strong class="property_strong"> Price :</strong> Not Provided </p>
                                    <p class="property_p_tag"> <strong class="property_strong"> Location : </strong> Suryaraopet, Kkd </p>
                                    <p class="property_p_tag"> <strong class="property_strong"> Posted On :</strong> 01 jan 2025 </p>
                                    <p class="lease_tag"> For Lease </p>


                                </div>




                                <div class="col-12 terms_cond_styles">
                                    <div class="terms_justify">

                                        <p>
                                            <a href="#" class="toggle-terms">View More Details</a>
                                        </p>
                                    </div>

                                    <div class="terms-content mb-3" style="display: none;">
                                        <h4>Ad Details</h4>
                                        <p class="property_p_tag"><strong class="property_strong"> Contact Person :</strong> Not Provided </p>
                                        <p class="property_p_tag"><strong class="property_strong"> Description :</strong> Ready To Occupy
                                            G+3 Floor Building is Available For Rent.
                                            4 Road Corner Building
                                            Each Floor With 2500 Square Feet Area.
                                            Total Ground Floor With Exclusive Parking.
                                            Floor Wise or Total Building is available
                                            Lift Facility is available.
                                            Facing: North West Corner.
                                            For More Details Contact: 9490188815, 9390219275. (see full description) </p>
                                        <a href="property_details.php" class=" ">View full Details</a>

                                    </div>

                                </div>
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

            <div class="col-lg-3  col-12 text_side_div d-none d-lg-block">

                <img src="assets/img/test/sideimg2.png" alt="" class="img-fluid">

                <img src="assets/img/test/animation.gif" alt="Animated GIF" class="mt-5">

                <img src="assets/img/test/sideimg1.png" alt="" class="img-fluid mt-5">
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


















<?php include 'chat_bot.php';  ?>


<?php include 'footer.php';  ?>