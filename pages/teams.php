<?php

include 'config.php';

if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['submit'])) {
    $name        = $_POST['name'];
    $slug        = $_POST['slug'];
    $description = $_POST['description'];
    $venue       = $_POST['venue'];
    $logo = $_FILES["logo"]["name"];
    $tempname = $_FILES["logo"]["tmp_name"];
    $folder = "../uploads/logos/" . $logo;
    $store = move_uploaded_file($tempname, $folder);


    $sql = "INSERT INTO teams(name, slug, description, venue, logo, added_by) VALUES('$name', '$slug', '$description',  '$venue', '$logo', '$added_by')";
    $query = mysqli_query($con, $sql);
    if ($query) {

        header("location: teams.php");
    }
    mysqli_close($con);
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
                        <h4 class="mb-sm-0">TEAMS</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">DDIBASTATS</a></li>
                                <li class="breadcrumb-item active">Teams</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Team </h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="team">Team Name</label>
                                    <input type="text" name="name" id="" class="form-control" required placeholder="Enter Team Name">

                                </div>

                                <div class="mb-3">
                                    <label for="Slug">Slug</label>
                                    <input type="text" name="slug" id="" class="form-control" placeholder="Enter Slug" required>

                                </div>

                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="" rows="3" required placeholder="Enter description"></textarea>

                                </div>

                                <div class="mb-3">
                                    <label for="Venue">Venue</label>
                                    <input type="text" name="venue" id="" class="form-control" placeholder="Enter Venue" required>

                                </div>

                                <div class="mb-3">
                                    <label for="logo">Upload Team Logo</label>
                                    <input type="file" class="form-control" name="logo" id="" placeholder="Upload Team Logo">

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
                            <h4>Teams</h4>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="table-responsive">
                                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                        <thead>
                                            <th>#</th>
                                            <th>logo</th>
                                            <th>Team</th>
                                            <th>Slug</th>
                                            <th>Home Venue</th>
                                            <th></th>
                                        </thead>
                                        <tbody style="text-transform: uppercase; font-size:11px;">
                                            <?php
                                            $count = 0;
                                            $query1 = mysqli_query($con, "SELECT * FROM teams");
                                            while ($row = mysqli_fetch_array($query1)) {
                                                $count++;
                                            ?>
                                                <tr>
                                                    <td><?= $count ?></td>
                                                    <td><img src="../uploads/logos/<?= ($row['logo']); ?>" alt="" height="50px" width="50px"> </td>
                                                    <td><?= ($row['name']); ?></td>
                                                    <td><?= ($row['slug']); ?></td>
                                                    <td><?= ($row['venue']); ?></td>
                                                    <td>
                                                        <a data-bs-toggle="modal" data-bs-target="#modalId<?= $row['id'] ?>" class="btn btn-warning"><i class="las la-edit"></i></a>



                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalId<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalTitleId">EDIT TEAM</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <form action="" method="POST" enctype="multipart/form-data">

                                                                                <div class="mb-3">
                                                                                    <input type="text" hidden name="id" value="<?= $row['id']; ?>">
                                                                                    <label for="team">Team Name</label>
                                                                                    <input type="text" name="name" id="" class="form-control" required value="<?= $row['name']; ?>">

                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="Slug">Slug</label>
                                                                                    <input type="text" name="slug" id="" class="form-control" value="<?= $row['slug']; ?>" required>

                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="description">Description</label>
                                                                                    <textarea class="form-control" name="description" id="" rows="3" required><?= $row['description']; ?></textarea>

                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="Venue">Venue</label>
                                                                                    <input type="text" name="venue" id="" class="form-control" value="<?= $row['venue']; ?>" required>

                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="logo">Upload Team Logo</label>
                                                                                    <input type="file" class="form-control" name="logo" id="" >

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

                                                        <?php
                                                        if (isset($_POST['update'])) {
                                                            $name        = $_POST['name'];
                                                            $slug        = $_POST['slug'];
                                                            $description = $_POST['description'];
                                                            $venue       = $_POST['venue'];
                                                            $logo = $_FILES["logo"]["name"];
                                                            $tempname = $_FILES["logo"]["tmp_name"];
                                                            $folder = "../uploads/logos/" . $logo;
                                                            $store = move_uploaded_file($tempname, $folder);
                                                            $id = $_POST['id'];
                                                            $added_by = $_SESSION['id'];

                                                            $sql = "UPDATE teams SET name= '$name', slug='$slug', description='$description',  venue='$venue', logo='$logo', added_by='$added_by' WHERE id=$id";
                                                            $query2 = mysqli_query($con, $sql);
                                                            if ($query2) {
                                                                $msg = "<div class='alert alert-primary shadow' role='alert' style='border-left:#155724 5px solid; border-radius: 0px'>
                                                                Success
                                                                <script type='text/javascript'>setTimeout(function() { window.location.href = 'teams.php';}, 3000);</script>
                                                                </div>";
                                                            }
                                                        }

                                                        ?>


                                                        <a href="delete_team.php?id=<?= $row['id'] ?>" class="btn btn-danger" onclick="confirm('Do you to Delete Team')"><i class="las la-trash"></i>
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