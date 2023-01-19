<?php

include 'config.php';

if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['submit'])) {
    $name          = $_POST['name'];
    $abbreviation  = $_POST['abbreviation'];
    $description   = $_POST['description'];
    $added_by       = $_SESSION['id'];

    $sql = "INSERT INTO positions(name, abbreviation, description, added_by) VALUES('$name', '$abbreviation', '$description', '$added_by')";
    $query = mysqli_query($con, $sql);
    if ($query) {
        # code...
        header("location:positions.php");
    }

    # code...
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
                        <h4 class="mb-sm-0">POSITIONS</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">DDIBASTATS</a></li>
                                <li class="breadcrumb-item active">Positions</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Position</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="position">Position Name</label>
                                    <input type="text" name="name" id="" class="form-control" placeholder="Enter Position Name" aria-describedby="helpId" required>

                                </div>

                                <div class="mb-3">
                                    <label for="abbreviation">Abbreviation</label>
                                    <input type="text" name="abbreviation" id="" class="form-control" placeholder="Enter Abbreviation" aria-describedby="helpId" required>

                                </div>

                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="" rows="3" placeholder="Enter Description" required></textarea>

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
                            <h4>Positions</h4>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="buttons-table-preview">
                                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                        <thead>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Abbreviation</th>
                                            <th>Action</th>
                                        </thead>

                                        <tbody style="text-transform: uppercase; font-size:11px;">
                                            <?php
                                            $count = 0;
                                            $query2 = mysqli_query($con, "SELECT * FROM positions");
                                            while ($row = mysqli_fetch_array($query2)) {
                                                $count++;
                                            ?>
                                                <tr>
                                                    <td><?= $count ?></td>
                                                    <td><?= ($row['name']); ?></td>
                                                    <td><?= ($row['abbreviation']); ?></td>
                                                    <td>
                                                        <a data-bs-toggle="modal" data-bs-target="#modalId<?= $row['id'] ?>" class="btn btn-warning"><i class="las la-edit "></i></a>



                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalId<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalTitleId">EDIT POSITION</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <form action="" method="POST">
                                                                                <div class="mb-3">
                                                                                    <input type="text" name="id" hidden value="<?= $row['id']; ?>">
                                                                                    <label for="position">Position Name</label>
                                                                                    <input type="text" name="name" id="" class="form-control" value="<?= $row['name']; ?>" aria-describedby="helpId" required>

                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="abbreviation">Abbreviation</label>
                                                                                    <input type="text" name="abbreviation" id="" class="form-control" value="<?= $row['abbreviation']; ?>" aria-describedby="helpId" required>

                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="description">Description</label>
                                                                                    <textarea class="form-control" name="description" id="" rows="3"  required><?= $row['description']; ?></textarea>

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
                                                            $name          = $_POST['name'];
                                                            $abbreviation  = $_POST['abbreviation'];
                                                            $description   = $_POST['description'];
                                                            $added_by       = $_SESSION['id'];

                                                            $id = $_POST['id'];

                                                            $sql3 = "UPDATE positions SET name = '$name', abbreviation ='$abbreviation', description = '$description', added_by='$added_by' WHERE id = $id";
                                                            $query3 = mysqli_query($con, $sql3);
                                                            if ($query3) {
                                                                echo "
        <script type='text/javascript'>setTimeout(function() { window.location.href = 'positions.php';}, 2000);</script>
        ";
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


                                                        <a href="delete_position.php?id=<?= $row['id'] ?>" onclick="confirm('o you want to delete Position')" class="btn btn-danger"><i class="las la-trash "></i>
                                                        </a>

                                                    </td>
                                                </tr>

                                            <?php
                                            } ?>
                                        </tbody>
                                    </table>
                                </div> <!-- end preview-->


                            </div> <!-- end tab-content-->

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
    < </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


        <?php include "../includes/footer.php"; ?>

        </body>

        </html>