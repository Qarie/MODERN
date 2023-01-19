<?php

include "config.php";

if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['submit'])) {
    $name           = $_POST['name'];
    $capacity       = $_POST['capacity'];
    $location       = $_POST['location'];
    $latitude       = $_POST['latitude'];
    $longitude       = $_POST['longitude'];
    $image = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "../uploads/stadiums/" . $image;
    $store = move_uploaded_file($tempname, $folder);
    $added_by       = $_SESSION['id'];

    $sql = "insert into stadiums(name, capacity, location, latitude, longitude, image, added_by)values('$name','$capacity','$location', '$latitude', '$longitude', '$image', '$added_by')";
    $query = mysqli_query($con, $sql);
    if ($query) {
        header("location:stadiums.php");
    }
    mysqli_close($conn);
}

?>

<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>

<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">STADIUMS</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">DDIBASTATS</a></li>
                                <li class="breadcrumb-item active">Stadiums</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Venue</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="stadium">Venue</label>
                                    <input type="text" name="name" id="" required class="form-control" placeholder="Enter Stadium Name">

                                </div>

                                <div class="mb-3">
                                    <label for="capacity">Capacity</label>
                                    <input type="text" name="capacity" required id="" class="form-control" placeholder="Enter Capacity">

                                </div>

                                <div class="mb-3">
                                    <label for="location">Address</label>
                                    <textarea type="text" name="location" required id="" class="form-control" placeholder="Enter Location"></textarea>

                                </div>

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="mb-3">
                                            <label for="longitude">Longitude</label>
                                            <input type="number" name="longitude" id="" class="form-control" required>

                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="mb-3">
                                            <label for="Latitude">Latitude</label>
                                            <input type="number" name="latitude" id="" class="form-control" required>

                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="Image">Image</label>
                                    <input type="file" class="form-control" name="image" id="">

                                </div>

                                <div class="mb-3 d-grid">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Venues</h4>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="buttons-table-preview">
                                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                        <thead>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Venue</th>
                                            <th>Capacity</th>
                                            <th>Location</th>
                                            <th></th>
                                        </thead>

                                        <tbody style="text-transform: uppercase; font-size:11px;">
                                            <?php
                                            $count = 0;
                                            $query1 = mysqli_query($con, "SELECT * FROM stadiums");
                                            while ($row = mysqli_fetch_array($query1)) {
                                                $count++;
                                                $location = $row['latitude'] . ", " . $row['longitude'];
                                            ?>
                                                <tr>
                                                    <td><?= $count ?></td>
                                                    <th><img src="../uploads/stadiums/<?= ($row['image']); ?>" width="50px" height="50px" alt=""></th>
                                                    <td><?= ($row['name']); ?></td>
                                                    <td><?= ($row['capacity']); ?></td>
                                                    <td><?= $row['location']; ?><br><b><?= $location;?></b></td>
                                                    <td>
                                                        <a data-bs-toggle="modal" data-bs-target="#modalId<?= $row['id'] ?>" class="btn btn-warning"><i class="las la-edit "></i></a>



                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalId<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalTitleId">EDIT STADIUM</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <form action="" method="POST" enctype="multipart/form-data">

                                                                                <div class="mb-3">
                                                                                    <input type="text" hidden name="id" value="<?= $row['id']; ?>">
                                                                                    <label for="stadium">Stadium Name</label>
                                                                                    <input type="text" name="name" id="" required class="form-control" required value="<?= $row['name']; ?>">

                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="capacity">Capacity</label>
                                                                                    <input type="text" name="capacity" required id="" class="form-control" required value="<?= $row['capacity']; ?>">

                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="location">Location</label>
                                                                                    <textarea type="text" name="location" required id="" class="form-control" required><?= $row['location']; ?></textarea>

                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-sm">
                                                                                        <div class="mb-3">
                                                                                            <label for="longitude">Longitude</label>
                                                                                            <input type="number" name="longitude" value="<?= $row['longitude']; ?>" id="" class="form-control" required>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm">
                                                                                        <div class="mb-3">
                                                                                            <label for="Latitude">Latitude</label>
                                                                                            <input type="number" name="latitude" id="" value="<?= $row['latitude']; ?>" class="form-control" required>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="Image">Image</label>
                                                                                    <input type="file" class="form-control" value="<?= $row['image']; ?>" name="image">

                                                                                </div>

                                                                                <div class="mb-3 d-grid">
                                                                                    <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <?php


                                                        if (isset($_POST['update'])) {
                                                            $name           = $_POST['name'];
                                                            $capacity       = $_POST['capacity'];
                                                            $location       = $_POST['location'];
                                                            $latitude       = $_POST['latitude'];
                                                            $longitude       = $_POST['longitude'];
                                                            $image = $_FILES["image"]["name"];
                                                            $tempname = $_FILES["image"]["tmp_name"];
                                                            $folder = "../uploads/stadiums/" . $image;
                                                            $store = move_uploaded_file($tempname, $folder);
                                                            $added_by       = $_SESSION['id'];
                                                            $id = $_POST['id'];

                                                            $sql3 = "UPDATE stadiums SET name = '$name', capacity = '$capacity', location = '$location', latitude = '$latitude',longitude = '$longitude', image = '$image',added_by='$added_by' WHERE id = $id";
                                                            $query3 = mysqli_query($con, $sql3);
                                                            if ($query3) {
                                                                echo "
        <script type='text/javascript'>setTimeout(function() { window.location.href = 'stadiums.php';}, 2000);</script>";
                                                            }
                                                        }

                                                        ?>


                                                        <script>
                                                            var modalId = document.getElementById('modalId');

                                                            modalId.addEventListener('show.bs.modal', function(event) {
                                                                // Button that triggered the modal
                                                                let button = event.relatedTarget;
                                                                // Extract info from data-bs-* attributes
                                                                let recipient = button.getAttribute('data-bs-whatever');

                                                                // Use above variables to manipulate the DOM
                                                            });
                                                        </script>



                                                        <a href="delete_stadium.php?id=<?= $row['id'] ?>" onclick="confirm('Do you want to delete Stadium/Venue')" class="btn btn-danger"><i class="las la-trash "></i>
                                                        </a>

                                                    </td>
                                                </tr>

                                            <?php
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../includes/footer.php"; ?>

</body>

</html>