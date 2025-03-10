<?php include 'navbar.php';  ?>



<div id="overlay" class="overlay"></div>
<button id="restaurant-icon" class="restaurant-icon">🍽</button>
<div id="sidebar" class="sidebar side_view">
    <h1 class="side_bar_tittle">Restaurants 🍽</h1>
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
            name: "Dominos",
            link: "./business_layout.php"
        },
        {
            name: "PizzaHut",
            link: "./business_layout.php"
        },
        {
            name: "KFC",
            link: "./business_layout.php"
        },
        {
            name: "MC donald's",
            link: "./business_layout.php"
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



<h1 class="text-center my-4">C&C</h1>

<section>
    <div class="container">
        <div class="row  ">
            <div class="col-6">
                <div class="container">
                    <div class="card bg-dark text-white shadow-lg  d-flex flex-column align-items-center"
                        style="height: 220px;">
                        <img src="assets/img/self_images/cc.jpg" alt="Offer Image" class="img-fluid pic"
                            style="width: 100%; height: 220px; object-fit: cover;">
                        <h3 class="mt-2 p-3 text-center  list_page_test_tittle flex-grow-1 text-white">
                        Chanakya :  Screen 1</h3>
                    </div>
                </div>

            </div>
            <div class="col-6">
            <div class="container">
                    <div class="card bg-dark text-white shadow-lg  d-flex flex-column align-items-center"
                        style="height: 220px;">
                        <img src="assets/img/self_images/cc.jpg" alt="Offer Image" class="img-fluid pic"
                            style="width: 100%; height: 220px; object-fit: cover;">
                        <h3 class="mt-2 p-3 text-center  list_page_test_tittle flex-grow-1 text-white">Chandra Gupta : Screen 2 </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


 





<?php include 'footer.php';  ?>