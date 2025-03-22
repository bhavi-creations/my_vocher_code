<?php include 'header.php';   ?>


<!-- Page Wrapper -->
<div id="wrapper">

    <?php include 'sidebar.php';   ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <?php include 'navbar.php';  ?>

        <div id="content">

            <div class="container-fluid">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Available Services</h1>
                    <a href="add_service.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa-solid fa-plus"></i>
                        Add Service</a>
                </div>

                <div class="container">
                    <div class="row">

                        <div class='row row-custom no-gutters col-12'>
                            <?php
                            include '../../db.connection/db_connection.php';

                            $query = "SELECT * FROM services";
                            $result = mysqli_query($conn, $query);
                            ?>
                            <div class="container mt-4">
                                <h2 class="text-center text-primary">Available Services</h2>

                                <table class="table table-bordered mt-3">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>S.No</th>
                                            <th>Service Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="servicesTable">
                                        <?php
                                        $result = mysqli_query($conn, "SELECT * FROM services");
                                        $sno = 1; 
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr data-id='{$row['id']}'>
                                                    <td>{$sno}</td>
                                                    <td class='service-name'>{$row['name']}</td>
                                                    <td>
                                                        <a href='service_details.php?id={$row['id']}' class='btn btn-success'>View</a>
                                                        <button class='btn btn-warning edit-btn' data-id='{$row['id']}'>Edit</button>
                                                        <button class='btn btn-danger delete-btn' data-id='{$row['id']}'>Delete</button>
                                                    </td>
                                                </tr>";
                                            $sno++;
                                        }
                                        ?>



                                    </tbody>
                                </table>
                            </div>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Service</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" id="editServiceId">
                                            <label class="form-label">Service Name:</label>
                                            <input type="text" class="form-control" id="editServiceName">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary" id="saveEditBtn">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

                            <script>
                                $(document).ready(function() {
                                    // Delete Service
                                    $(".delete-btn").click(function() {
                                        var serviceId = $(this).data("id"); // Get Service ID
                                        var row = $(this).closest("tr"); // Get the table row

                                        $.ajax({
                                            url: "delete_service.php",
                                            type: "POST",
                                            data: {
                                                id: serviceId
                                            },
                                            success: function(response) {
                                                if (response == "success") {
                                                    row.remove(); // Remove the row from the table
                                                    updateSerialNumbers(); // Adjust serial numbers dynamically
                                                } else {
                                                    alert("Failed to delete the service.");
                                                }
                                            }
                                        });
                                    });

                                    // Update Serial Numbers after deleting
                                    function updateSerialNumbers() {
                                        $("#servicesTable tr").each(function(index) {
                                            $(this).find("td:first").text(index + 1); // Reassign serial numbers
                                        });
                                    }

                                    // Open Edit Modal
                                    $(".edit-btn").click(function() {
                                        var serviceId = $(this).data("id");
                                        var serviceName = $(this).closest("tr").find(".service-name").text();

                                        $("#editServiceId").val(serviceId);
                                        $("#editServiceName").val(serviceName);
                                        $("#editModal").modal("show");
                                    });

                                    // Save Edited Service
                                    $("#saveEditBtn").click(function() {
                                        var serviceId = $("#editServiceId").val();
                                        var serviceName = $("#editServiceName").val();

                                        $.ajax({
                                            url: "edit_service.php",
                                            type: "POST",
                                            data: {
                                                id: serviceId,
                                                name: serviceName
                                            },
                                            success: function(response) {
                                                if (response == "success") {
                                                    $("tr[data-id='" + serviceId + "'] .service-name").text(serviceName);
                                                    $("#editModal").modal("hide");
                                                } else {
                                                    alert("Failed to update the service.");
                                                }
                                            }
                                        });
                                    });
                                });
                            </script>
                        </div>


                    </div>

                </div>

            </div>

        </div>

        <?php include 'footer.php'; ?>

    </div>

</div>


<?php include 'end.php'; ?>