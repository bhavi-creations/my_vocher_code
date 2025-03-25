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
                    <h1 class="h3 mb-0 text-gray-800">Available Properties</h1>
                    <a href="add_property_type.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fa-solid fa-plus"></i> Add Property
                    </a>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <?php include '../../db.connection/db_connection.php'; ?>

                            <!-- Display Success Message -->
                            <?php if (isset($_SESSION['message'])): ?>
                                <div id="alert-box" class="alert alert-<?php echo $_SESSION['msg_type']; ?>">
                                    <?php echo $_SESSION['message']; ?>
                                    <?php unset($_SESSION['message']); ?>
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

                            <!-- Property Table -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Property List</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Property Name</th>
                                                    <th>Location</th>
                                                    <th>Price</th>
                                                    <th>Image</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="property-table-body">
                                                <?php
                                                $query = "SELECT * FROM properties ORDER BY id DESC";
                                                $result = mysqli_query($conn, $query);
                                                $s_no = 1; // Initialize S.No counter
                                                while ($row = mysqli_fetch_assoc($result)):
                                                ?>
                                                    <tr data-id="<?php echo $row['id']; ?>">
                                                        <td class="serial-no"><?php echo $s_no++; ?></td>
                                                        <td><?php echo $row['title']; ?></td>
                                                        <td><?php echo $row['location']; ?></td>
                                                        <td><?php echo $row['price']; ?></td>
                                                        <td>
                                                            <img src="../uploads/properties/<?php echo $row['image']; ?>" width="100" height="70" alt="Property Image">
                                                        </td>
                                                        <td>
                                                            <a href="view_property.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                            <a href="edit_property.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                            <button class="btn btn-danger btn-sm delete-btn" data-id="<?php echo $row['id']; ?>">Delete</button>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        document.querySelectorAll(".delete-btn").forEach(button => {
                            button.addEventListener("click", function() {
                                let propertyId = this.getAttribute("data-id");
                                if (confirm("Are you sure you want to delete this property?")) {
                                    fetch("delete_property.php", {
                                            method: "POST",
                                            headers: {
                                                "Content-Type": "application/x-www-form-urlencoded"
                                            },
                                            body: "id=" + propertyId
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.success) {
                                                // Remove the row from the table
                                                let row = document.querySelector(`tr[data-id='${propertyId}']`);
                                                row.remove();

                                                // Re-adjust serial numbers
                                                let serialCells = document.querySelectorAll(".serial-no");
                                                serialCells.forEach((cell, index) => {
                                                    cell.textContent = index + 1;
                                                });
                                            } else {
                                                alert("Error deleting property.");
                                            }
                                        })
                                        .catch(error => console.error("Error:", error));
                                }
                            });
                        });
                    });
                </script>


            </div>
        </div>

        <?php include 'footer.php'; ?>
    </div>
</div>

<?php include 'end.php'; ?>