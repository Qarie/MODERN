<?php

include 'config.php';

if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['submit'])) {
    $name           = $_POST['name'];
    $slug           = $_POST['slug'];
    $description    = $_POST['description'];
    $added_by       = $_SESSION['id'];

    $sql = "INSERT INTO leagues(name, slug, description, added_by) VALUES('$name', '$slug', '$description', '$added_by')";
    $query = mysqli_query($con, $sql);
    if ($query) {
        header("location: leagues.php");
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
                        <h4 class="mb-sm-0">LEAGUES</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">DDIBASTATS</a></li>
                                <li class="breadcrumb-item active">Leagues</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create League</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="">League Name</label>
                                    <input type="text" name="name" id="" class="form-control" placeholder="Enter League Name" required>

                                </div>

                                <div class="mb-3">
                                    <label for="Slug">Slug</label>
                                    <input type="text" name="slug" id="" class="form-control" placeholder="Enter Slug" required>

                                </div>

                                <div class="mb-3">
                                    <label for="Description">Description</label>
                                    <textarea type="text" name="description" id="" class="form-control" placeholder="Enter Description" required></textarea>

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
                            <h4>Leagues</h4>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="table-responsive">
                                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                        <thead>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody style="text-transform: uppercase; font-size:11px;">
                                            <?php
                                            $count = 0;
                                            $query1 = mysqli_query($con, "SELECT * FROM leagues");
                                            while ($row = mysqli_fetch_array($query1)) {
                                                $count++;
                                            ?>
                                                <tr>
                                                    <td><?= $count ?></td>
                                                    <td><?= ($row['name']); ?></td>
                                                    <td><?= ($row['slug']); ?></td>
                                                    <td><?= ($row['description']); ?></td>
                                                    <td>
                                                        <a data-bs-toggle="modal" data-bs-target="#modalId<?= $row['id'] ?>" class="btn btn-warning"><i class="las la-edit"></i></a>



                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalId<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalTitleId">EDIT LEAGUE</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <div><?php if (isset($msg)) {
                                                                                        echo $msg;
                                                                                    } ?></div>
                                                                            <form action="" method="POST">
                                                                                <input type="text" name="id" hidden value="<?= $row['id']; ?>">
                                                                                <div class="mb-3">
                                                                                    <label for="">League Name</label>
                                                                                    <input type="text" name="name" id="" class="form-control" value="<?= $row['name']; ?>" required>

                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="Slug">Slug</label>
                                                                                    <input type="text" name="slug" id="" class="form-control" value="<?= $row['slug']; ?>" required>

                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="Description">Description</label>
                                                                                    <textarea type="text" name="description" id="" class="form-control" required><?= $row['description']; ?></textarea>

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
                                                            $name           = $_POST['name'];
                                                            $slug           = $_POST['slug'];
                                                            $description    = $_POST['description'];
                                                            $added_by       = $_SESSION['id'];
                                                            $id = $_POST['id'];

                                                            $sql = "UPDATE leagues SET name='$name', slug='$slug', description='$description', added_by='$added_by' WHERE id = $id";
                                                            $query3 = mysqli_query($con, $sql);
                                                            if ($query3) {
                                                                $msg = "<div class='alert alert-primary shadow' role='alert' style='border-left:#155724 5px solid; border-radius: 0px'>
                                                                Success
                                                                <script type='text/javascript'>setTimeout(function() { window.location.href = 'leagues.php';}, 3000);</script>
                                                                </div>";
                                                            }
                                                        }
                                                        ?>


                                                        <a href="delete_league.php?id=<?= $row['id'] ?>" onclick="confirm('Do you want to Delete League')" class="btn btn-danger"><i class="las la-trash"></i>
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