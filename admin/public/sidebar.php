<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #A9A8D4;">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center bg-light text-primary" href="./index.php">

        <div class="sidebar-brand-text mx-3">Kakinada <br> Hub</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Fetch and Display Services -->
    <div class="sidebar-heading">Services</div>

    <?php
    include '../../db.connection/db_connection.php';


    $result = mysqli_query($conn, "SELECT * FROM services");
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<li class="nav-item">
                <a class="nav-link" href="' . $row['slug'] . '.php">
                    <i class="fas fa-list"></i>
                    <span>' . $row['name'] . '</span>
                </a>
              </li>';
    }
    ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>