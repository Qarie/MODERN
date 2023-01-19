<?php

include 'config.php';

if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['submit'])) {
    $name           = $_POST['name'];
    $slug       = $_POST['slug'];
    $description          = $_POST['description'];
    $season          = $_POST['season'];
    $league          = $_POST['league'];
    $type  = $_POST['type'];
    $added_by       = $_SESSION['id'];



    $sql = "INSERT INTO matchday(name, league, slug, description, season, type, added_by) VALUES('$name', '$league', '$slug', '$description', '$season', '$type', '$added_by' )";
    $query = mysqli_query($con, $sql);
    if ($query) {
        header("location:matches.php");
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
                        <h4 class="mb-sm-0">LEAGUE TABLES</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">DDIBASTATS</a></li>
                                <li class="breadcrumb-item active">League Tables</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Match Day</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="name"> Name</label>
                                    <input type="text" name="name" id="" required class="form-control" placeholder="Enter Name">

                                </div>

                                <div class="mb-3">
                                    <label for="Slug"> Slug</label>
                                    <input type="text" name="slug" id="" required class="form-control" placeholder="Enter Slug">

                                </div>

                                <div class="mb-3">
                                    <label for="Description">Description</label>
                                    <textarea class="form-control" name="description" required id="" rows="3" placeholder="Enter Description"></textarea>

                                </div>

                                <div class="mb-3">
                                    <label for="season">Season</label>
                                    <select class="form-control" name="season" id="" required>
                                        <option>-- Select --</option>
                                        <?php
                                        $get = mysqli_query($con, 'select * from seasons');
                                        while ($result = mysqli_fetch_array($get)) { ?>
                                            <option><?= $result['season']; ?></option>
                                        <?php
                                        } ?>
                                    </select>

                                </div>

                                <div class="mb-3">
                                    <label for="season">League</label>
                                    <select class="form-control" name="league" id="" required>
                                        <option>-- Select --</option>
                                        <?php
                                        $get = mysqli_query($con, 'select * from leagues');
                                        while ($result = mysqli_fetch_array($get)) { ?>
                                            <option><?= $result['name']; ?></option>
                                        <?php
                                        } ?>
                                    </select>

                                </div>

                                <div class="mb-3">
                                    <label for="type">Match Day Type</label>
                                    <select class="form-control" name="type" id="" required>
                                        <option>Round Robin</option>
                                        <option>Elimination</option>
                                    </select>

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
                            <h4>Matchdays</h4>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="table-responsive">
                                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                        <thead>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Season</th>
                                            <th>Match Type</th>
                                            <th>Matches</th>
                                            <th></th>
                                        </thead>
                                        <tbody style="text-transform: uppercase; font-size:11px;">
                                            <?php
                                            $count = 0;
                                            $query = mysqli_query($con, "SELECT * FROM matchday");
                                            while ($row = mysqli_fetch_array($query)) {
                                                $count++;
                                            ?>
                                                <tr>
                                                    <td><?= $count ?></td>
                                                    <td><?= ($row['name']); ?></td>
                                                    <td><?= ($row['season']); ?></td>
                                                    <td><?= ($row['type']); ?></td>
                                                    <td><?= ($row['type']); ?></td>
                                                    <td>
                                                        <a data-bs-toggle="modal" data-bs-target="#modalId<?= $row['id'] ?>" class="btn btn-warning"><i class="las la-edit "></i></a>


                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalId<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalTitleId">EDIT MATCHDAY</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <form action="" method="POST">
                                                                                <div class="mb-3">
                                                                                    <input type="text" hidden name="id" value="<?= $row['id']; ?>">
                                                                                    <label for="name"> Name</label>
                                                                                    <input type="text" name="name" value="<?= $row['name']; ?>" required class="form-control" placeholder="Enter Name">

                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="Slug"> Slug</label>
                                                                                    <input type="text" name="slug" value="<?= $row['slug']; ?>" required class="form-control" placeholder="Enter Slug">

                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="Description">Description</label>
                                                                                    <textarea class="form-control" name="description" value="<?= $row['description']; ?>" required id="" rows="3" placeholder="Enter Description"></textarea>

                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="season">Season</label>
                                                                                    <select class="form-control" name="season" id="" required>
                                                                                        <option value="<?= $row['season']; ?>" selected><?= $row['season']; ?></option>
                                                                                        <?php
                                                                                        $get = mysqli_query($con, 'select * from seasons');
                                                                                        while ($result = mysqli_fetch_array($get)) { ?>
                                                                                            <option><?= $result['season']; ?></option>
                                                                                        <?php
                                                                                        } ?>
                                                                                    </select>

                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="season">League</label>
                                                                                    <select class="form-control" name="league" id="" required>
                                                                                        <option value="<?= $row['league']; ?>" selected><?= $row['league']; ?></option>
                                                                                        <?php
                                                                                        $get = mysqli_query($con, 'select * from leagues');
                                                                                        while ($result = mysqli_fetch_array($get)) { ?>
                                                                                            <option><?= $result['name']; ?></option>
                                                                                        <?php
                                                                                        } ?>
                                                                                    </select>

                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="type">Match Day Type</label>
                                                                                    <select class="form-control" name="type" id="" required>
                                                                                        <option value="<?= $row['type']; ?>" selected><?= $row['type']; ?></option>
                                                                                        <option>Round Robin</option>
                                                                                        <option>Elimination</option>
                                                                                    </select>

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
                                                            $slug       = $_POST['slug'];
                                                            $description          = $_POST['description'];
                                                            $season          = $_POST['season'];
                                                            $league          = $_POST['league'];
                                                            $type  = $_POST['type'];
                                                            $added_by       = $_SESSION['id'];
                                                            $id = $_POST['id'];


                                                            $sql2 = "UPDATE matchday SET name='$name', league='$league', slug='$slug', description='$description', season='$season', type='$type', added_by='$added_by' WHERE id = '$id'";
                                                            $query2 = mysqli_query($con, $sql2);
                                                            if ($query2) {
                                                                $msg ="<script type='text/javascript'>setTimeout(function() { window.location.href = 'matches.php';}, 3000);</script>";
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


                                                        <a href="delete_matchday.php?id=<?= $row['id'] ?>" onclick="confirm('Do you want to delete Matchday')" class="btn btn-danger"><i class="las la-trash "></i>
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

<?php include '../includes/footer.php' ?>
</body>

</html>