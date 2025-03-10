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

            <div class="text-center   ">
                <h1>Welcome to The Royal Feast</h1>
                <h5> Experience Luxury Dining at The Royal Feast</h5>
            </div>
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-md-8 col-12">





                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="assets/img/test/1.png" class="  img-fluid  d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/img/test/2.png" class="img-fluid d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/img/test/3.png" class="img-fluid  d-block w-100" alt="...">
                                    </div>
                                </div>
                            </div>

                             
                        </div>
                        <div class="col-md-4 col-12 p-3">
                            <div class="product-content">
                                <h3>The Royal Feast</h3>
                                <p class="product-title h5 mt-1">Savor elegance, taste perfection, indulge in luxury</p>

                                <div class="rating-wrap">
                                    <div class="star-rating " role="img" aria-label="Rated 5.00 out of 5"><span
                                            style="width:100%">Rated <strong class="rating">5.00</strong> out of
                                            5</span></div>
                                </div>

                                <!-- <span class="price">$120.00</span> -->
                            </div>
                        </div>
                    </div>
                    <div class="row my-5 p-3">
                        <div class="col-md-8 col-12 ">
                            <h6>
                                A Royal Feast is a grand celebration of flavors, tradition, and opulence, offering an unforgettable dining experience fit for kings and queens. It brings together the finest ingredients, exquisite culinary craftsmanship, and a lavish presentation to create a meal that delights all the senses.
                                From rich, slow-cooked delicacies to aromatic spices and gourmet desserts, every dish in a royal feast tells a story of heritage and culinary mastery. Whether it’s a medieval banquet, a Mughal spread, or a regal European dining affair, the essence of a Royal Feast lies in its abundance, elegance, and ability to transport diners to a world of luxury.


                            </h6>
                        </div>
                        <div class="col-md-4 col-12  ">
                            <h3 class="text-center">Menu</h3>
                            <div class="menu-container">
                                <div class="menu-item">
                                    <span class="food-name">Classic American Breakfast</span>
                                    <span class="price">$12.99</span>
                                </div>
                                <div class="menu-item">
                                    <span class="food-name">Continental Breakfast</span>
                                    <span class="price">$10.99</span>
                                </div>
                                <div class="menu-item">
                                    <span class="food-name">Healthy Start (Oatmeal, Yogurt, Fresh Fruits)</span>
                                    <span class="price">$9.99</span>
                                </div>
                                <div class="menu-item">
                                    <span class="food-name">Pancake Delight</span>
                                    <span class="price">$8.99</span>
                                </div>
                                <div class="menu-item">
                                    <span class="food-name">Custom Omelette Station</span>
                                    <span class="price">$11.99</span>
                                </div>
                                <div class="menu-item">
                                    <span class="food-name">Starters & Appetizers</span>
                                    <span class="price">$7.99</span>
                                </div>
                                <div class="menu-item">
                                    <span class="food-name">Creamy Tomato Soup</span>
                                    <span class="price">$5.99</span>
                                </div>
                                <div class="menu-item">
                                    <span class="food-name">Crispy Chicken Wings</span>
                                    <span class="price">$9.49</span>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="row p-3">
                        <div class="col-md-8 col-12">
                            <div class="review-container">
                                <h2>Customer Reviews</h2>

                                <div class="review">
                                    <div class="review-header">
                                        <img src="assets/img/test/woman.png" alt="User" class="profile-img">
                                        <div class="">
                                            <p><strong>Emma R</strong></p>
                                            <p class="stars">⭐⭐⭐⭐⭐</p>
                                        </div>
                                    </div>
                                    <p class="review-text">
                                        "The ambiance was elegant, and the food was absolutely delicious! Every dish was beautifully presented, and the flavors were exceptional.
                                        <span class="hidden-text">The staff was courteous and attentive, making the experience even more enjoyable. Highly recommended!"</span>
                                    </p>
                                    <p class="view-more" onclick="toggleText(this)">Read More</p>
                                    <p class="view-images" onclick="toggleImages(this)">View Images</p>
                                    <div class="review-images">
                                        <img src="assets/img/test/1.png" alt="Review Image"
                                            onclick="openLightbox(this)">
                                        <img src="assets/img/test/2.png" alt="Review Image"
                                            onclick="openLightbox(this)">
                                    </div>
                                </div>

                                <div class="review">
                                    <div class="review-header">
                                        <img src="assets/img/test/boy11.png" alt="User" class="profile-img">
                                        <div class="">
                                            <p><strong>David M</strong></p>
                                            <p class="stars">⭐⭐⭐⭐</p>
                                        </div>
                                    </div>
                                    <p class="review-text">
                                        "A top-notch restaurant with a warm and inviting atmosphere. The wine selection was impressive, and the.
                                        <span class="hidden-text">chef’s special was divine. Will definitely be coming back!"</span>
                                    </p>
                                    <p class="view-more" onclick="toggleText(this)">Read More</p>
                                    <p class="view-images" onclick="toggleImages(this)">View Images</p>
                                    <div class="review-images">
                                        <img src="assets/img/review3.jpg" alt="Review Image"
                                            onclick="openLightbox(this)">
                                    </div>
                                </div>


                                <div class="review">
                                    <div class="review-header">
                                        <img src="assets/img/test/woman.png" alt="User" class="profile-img">
                                        <div class="">
                                            <p><strong> Sophia L.</strong></p>
                                            <p class="stars">⭐⭐⭐⭐⭐</p>
                                        </div>
                                    </div>
                                    <p class="review-text">
                                        "The food was amazing, especially the wood-fired pizza and seafood platter! However, the service was a
                                        <span class="hidden-text">little slow during peak hours. Overall, a great place for a relaxed meal."</span>
                                    </p>
                                    <p class="view-more" onclick="toggleText(this)">Read More</p>
                                    <p class="view-images" onclick="toggleImages(this)">View Images</p>
                                    <div class="review-images">
                                        <img src="assets/img/test/1.png" alt="Review Image"
                                            onclick="openLightbox(this)">
                                        <img src="assets/img/test/2.png" alt="Review Image"
                                            onclick="openLightbox(this)">
                                    </div>
                                </div>

                                <div class="review">
                                    <div class="review-header">
                                        <img src="assets/img/test/boy11.png" alt="User" class="profile-img">
                                        <div class="">
                                            <p><strong>David M</strong></p>
                                            <p class="stars">⭐⭐⭐⭐</p>
                                        </div>
                                    </div>
                                    <p class="review-text">
                                        "A top-notch restaurant with a warm and inviting atmosphere. The wine selection was impressive, and the.
                                        <span class="hidden-text">chef’s special was divine. Will definitely be coming back!"</span>
                                    </p>
                                    <p class="view-more" onclick="toggleText(this)">Read More</p>
                                    <p class="view-images" onclick="toggleImages(this)">View Images</p>
                                    <div class="review-images">
                                        <img src="assets/img/review3.jpg" alt="Review Image"
                                            onclick="openLightbox(this)">
                                    </div>
                                </div>


                                <div class="review">
                                    <div class="review-header">
                                        <img src="assets/img/test/woman.png" alt="User" class="profile-img">
                                        <div class="">
                                            <p><strong> Sophia L.</strong></p>
                                            <p class="stars">⭐⭐⭐⭐⭐</p>
                                        </div>
                                    </div>
                                    <p class="review-text">
                                        "The food was amazing, especially the wood-fired pizza and seafood platter! However, the service was a
                                        <span class="hidden-text">little slow during peak hours. Overall, a great place for a relaxed meal."</span>
                                    </p>
                                    <p class="view-more" onclick="toggleText(this)">Read More</p>
                                    <p class="view-images" onclick="toggleImages(this)">View Images</p>
                                    <div class="review-images">
                                        <img src="assets/img/test/1.png" alt="Review Image"
                                            onclick="openLightbox(this)">
                                        <img src="assets/img/test/2.png" alt="Review Image"
                                            onclick="openLightbox(this)">
                                    </div>
                                </div>  
                            </div>

                            <!-- Lightbox for Image Popup -->
                            <div class="lightbox" id="lightbox">
                                <span class="close" onclick="closeLightbox()">&times;</span>
                                <img id="lightbox-img" src="">
                            </div>


                        </div>
                        <div class="col-md-4 col-12">
                            <div class="review-form">
                                <h2>Submit Your Review</h2>
                                <input type="text" id="name" placeholder="Your Name" required>
                                <select id="rating">
                                    <option value="⭐">⭐</option>
                                    <option value="⭐⭐">⭐⭐</option>
                                    <option value="⭐⭐⭐">⭐⭐⭐</option>
                                    <option value="⭐⭐⭐⭐">⭐⭐⭐⭐</option>
                                    <option value="⭐⭐⭐⭐⭐" selected>⭐⭐⭐⭐⭐</option>
                                </select>
                                <textarea id="comment" rows="3" placeholder="Write a comment..." required></textarea>
                                <input type="file" id="imageUpload" accept="image/*">
                                <button onclick="submitReview()">Submit Review</button>
                            </div>
                        </div>

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



    


<?php include 'footer.php';  ?>
