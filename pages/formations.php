<?php

include "config.php";

if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['submit'])) {
    $name           = $_POST['name'];
    $description       = $_POST['description'];
    $added_by       = $_SESSION['id'];

    $sql = "INSERT INTO formation(name, description, added_by) VALUES('$name', '$description', '$added_by')";
    $query = mysqli_query($con, $sql);
    if ($query) {
        # code...
        header("location:formations.php");
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
                        <h4 class="mb-sm-0">FORMATIONS</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">DDIBASTATS</a></li>
                                <li class="breadcrumb-item active">Formations</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Formation</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="formation">Formation Name</label>
                                    <input type="text" name="name" id="" required class="form-control" placeholder="Enter formation Name" aria-describedby="helpId">

                                </div>

                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea type="text" name="description" required id="" class="form-control" placeholder="Enter Description" aria-describedby="helpId"></textarea>

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
                            <h4>Seasons</h4>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="buttons-table-preview">
                                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                        <thead>
                                            <th>#</th>
                                            <th>Formation</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </thead>

                                        <tbody style="text-transform: uppercase; font-size:11px;">
                                            <?php
                                            $count = 0;
                                            $query2 = mysqli_query($con, "SELECT * FROM formation");
                                            while ($row = mysqli_fetch_array($query2)) {
                                                $count++;
                                            ?>
                                                <tr>
                                                    <td><?= $count ?></td>
                                                    <td><?= ($row['name']); ?></td>
                                                    <td><?= $row['description'];?></td>
                                                    <td>
                                                        <a data-bs-toggle="modal" data-bs-target="#modalId<?= $row['id'] ?>" class="btn btn-warning"><i class="las la-edit"></i></a>
                                                        <a href="delete_formation.php?id=<?= $row['id'] ?>" onclick="confirm('Do you want to Delete Formation')" class="btn btn-danger"><i class="las la-trash"></i>
                                                        </a>



                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalId<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalTitleId">EDIT FORMATION</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <form action="" method="POST">
                                                                                <div class="mb-3">
                                                                                    <input type="text" hidden name="id" value="<?= $row['id']; ?>">
                                                                                    <label for="formation">Formation Name</label>
                                                                                    <input type="text" name="name" id="" class="form-control" required value="<?= $row['name']; ?>">

                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="description">Description</label>
                                                                                    <textarea type="text" name="description" id="" class="form-control"><?= $row['description']; ?></textarea>

                                                                                </div>

                                                                                <div class="mb-3 d-grid">
                                                                                    <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <?php

                                                            if (isset($_POST['update'])) {
                                                                $name           = $_POST['name'];
                                                                $description    = $_POST['description'];
                                                                $added_by       = $_SESSION['id'];
                                                                $id = $_POST['id'];

                                                                $sql3 = "UPDATE formation SET name = '$name', description = '$description', added_by='$added_by' WHERE id = $id";
                                                                $query3 = mysqli_query($con, $sql3);
                                                                if ($query3) {
                                                                    echo "
                                                                <script type='text/javascript'>setTimeout(function() { window.location.href = 'formations.php';}, 2000);</script>
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



</div>
<!-- END wrapper -->


<?php include "../includes/footer.php"; ?>

</body>

</html>