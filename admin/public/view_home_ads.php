<?php include 'header.php'; ?>

<!-- Page Wrapper -->
<div id="wrapper">
    <?php include 'sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <?php include 'navbar.php'; ?>

        <div id="content">
            <div class="container-fluid">
                <div class="container mt-4">
                    <h2 class="text-center text-primary">Home Images</h2>

                    <table class="table table-bordered mt-3">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>S.no</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="homeAdsTable">
                            <?php
                            include '../../db.connection/db_connection.php';

                            $query = "SELECT * FROM home_ads";
                            $result = mysqli_query($conn, $query);
                            $sno = 1;

                            while ($row = mysqli_fetch_assoc($result)) {
                                // $imagePath = !empty($row['image']) ? "uploads/{$row['image']}" : "default.jpg";
                                $imagePath = !empty($row['image']) ? "../uploads/home_ads/{$row['image']}" : "default.jpg";


                                echo "<tr data-id='{$row['id']}'>
                                        <td>{$sno}</td>
                                        <td class='title-text'>{$row['title']}</td>
                                        <td>
                                            <img src='{$imagePath}' alt='Ad Image' class='img-thumbnail' width='100' height='100'>
                                        </td>
                                        <td>{$row['created_at']}</td>
                                        <td>
                                            <button class='btn btn-warning btn-sm edit-btn' 
                                                data-id='{$row['id']}' data-title='{$row['title']}' 
                                                data-image='{$row['image']}'>Edit</button>
                                            <button class='btn btn-danger btn-sm delete-btn' data-id='{$row['id']}'>Delete</button>
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
                                <h5 class="modal-title">Edit Home Ad</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editForm" enctype="multipart/form-data">
                                    <input type="hidden" id="editAdId" name="id">

                                    <label class="form-label">Title:</label>
                                    <input type="text" class="form-control" id="editAdTitle" name="title" required>

                                    <label class="form-label mt-3">Current Image:</label>
                                    <div>
                                        <img id="currentImage" src="" class="img-thumbnail" width="100" height="100">
                                    </div>

                                    <label class="form-label mt-3">Choose New Image:</label>
                                    <input type="file" class="form-control" id="editAdImage" name="image">

                                    <div class="modal-footer mt-3">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save mage</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

              <script>
                    $(document).ready(function() {
                        // Open Edit Modal
                        $('.edit-btn').click(function() {
                            let id = $(this).data('id');
                            let title = $(this).data('title');
                            let image = $(this).data('image');

                            $('#editAdId').val(id);
                            $('#editAdTitle').val(title);
                            // $('#currentImage').attr('src', 'uploads/' + image);
                            $('#currentImage').attr('src', '../uploads/home_ads/' + image);


                            $('#editModal').modal('show');
                        });

                        // Submit Edit Form
                        $('#editForm').submit(function(e) {
                            e.preventDefault();

                            let formData = new FormData(this);

                            $.ajax({
                                url: 'edit_home_ads.php',
                                type: 'POST',
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                    console.log(response);

                                    if (response.trim() === 'success') {
                                        let id = $('#editAdId').val();
                                        let title = $('#editAdTitle').val();
                                        let newImage = $('#editAdImage')[0].files[0];

                                        // Update title in the table
                                        $('tr[data-id="' + id + '"] .title-text').text(title);

                                        // If a new image was uploaded, update the preview
                                        if (newImage) {
                                            let imageURL = URL.createObjectURL(newImage);
                                            $('tr[data-id="' + id + '"] img').attr('src', imageURL);
                                        }

                                        $('#editModal').modal('hide');
                                    } else {
                                        alert('Failed to update: ' + response);
                                    }
                                }
                            });
                        });



                        // Delete Image
                        $(document).ready(function() {
                            // Delete Image
                            $('.delete-btn').click(function() {
                                if (!confirm('Are you sure you want to delete this record?')) return;

                                let id = $(this).data('id');

                                $.post('delete_home_ads.php', {
                                    id: id
                                }, function(response) {
                                    console.log(response); // Debugging response

                                    if (response.trim() === 'success') {
                                        $('tr[data-id="' + id + '"]').remove(); // Remove row from table

                                        // Auto-adjust serial numbers (S. No.)
                                        $('#homeAdsTable tr').each(function(index) {
                                            $(this).find('td:first').text(index + 1); // Update S. No.
                                        });

                                    } else {
                                        alert('Delete failed: ' + response); // Show error message
                                    }
                                });
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