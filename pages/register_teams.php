<?php
include 'config.php';

if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['submit'])) {
    $team           = $_POST['team'];
    $season       = $_POST['season'];

    $added_by       = $_SESSION['id'];


    $sql = "INSERT INTO registered_teams (tname, season, added_by) VALUES('$team', '$season', '$added_by' )";
    $query = mysqli_query($con, $sql);
    if ($query) {
        header("location:register_teams.php");
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
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">SEASONS</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">DDIBASTATS</a></li>
                                <li class="breadcrumb-item active">Seasons</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <!-- end page title -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Register Team</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="mb-4">
                                    <label for="name"> Team</label>
                                    <select type="text" name="team" id="" class="form-select">
                                        <option selected disabled>-- Select Role --</option>
                                        <?php
                                        $teams = mysqli_query($con, "select * from teams");
                                        foreach ($teams as $team) {
                                        ?>
                                            <option value="<?= $team['name']; ?>"><?= $team['name']; ?></option>
                                        <?php } ?>

                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="role"> Season</label>
                                    <select type="text" name="season" id="" class="form-select">
                                        <option selected disabled>-- Select Role --</option>
                                        <?php
                                        $seasons = mysqli_query($con, "select * from seasons");
                                        foreach ($seasons as $season) {
                                        ?>
                                            <option value="<?= $season['id']; ?>"><?= $season['season']; ?></option>
                                        <?php } ?>


                                    </select>
                                </div>



                                <div class="mb-4 d-grid">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                $count = 0;
                $get = mysqli_query($con, "SELECT * FROM registered_teams");

                $count++;
                ?>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Registered Teams</h4>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="table-responsive">
                                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                        <thead>
                                            <th>#</th>
                                            <th>Team Name</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody style="text-transform: uppercase; font-size:11px;">
                                            <?php
                                            $count = 0;
                                            foreach ($get as $row) {
                                                $count++;
                                            ?>
                                                <tr>
                                                    <td><?= $count ?></td>
                                                    <td><?= ($row['tname']); ?></td>

                                                    <td>
                                                        <a data-bs-toggle="modal" data-bs-target="#modalId<?= $row['id']; ?>" class="btn btn-warning"><i class="las la-edit "></i></a>



                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalId<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalTitleId">EDIT USER</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <div><?php if (isset($msg)) {
                                                                                        echo $msg;
                                                                                    } ?></div>
                                                                            <form action="" method="POST" >
                                                                                <input type="text" name="id" hidden value="<?= $row['id']; ?>">
                                                                                <div class="mb-4">
                                                                                    <label for="name"> Team</label>
                                                                                    <select type="text" name="team" id="" class="form-select">
                                                                                    <option selected value="<?= $row['team']; ?>"><?= $row['team']; ?></option>
                                                                                        <?php
                                                                                        $teams = mysqli_query($con, "select * from teams");
                                                                                        foreach ($teams as $team) {
                                                                                        ?>
                                                                                            <option value="<?= $team['name']; ?>"><?= $team['name']; ?></option>
                                                                                        <?php } ?>

                                                                                    </select>
                                                                                </div>

                                                                                <div class="mb-4">
                                                                                    <label for="role"> Season</label>
                                                                                    <select type="text" name="season" id="" class="form-select">
                                                                                        <option selected value="<?= $row['season']; ?>">
                                                                                        <?php
                                                                                        
                                                                                        $seasona=$row['season'];
                                                                                        $getSeason = mysqli_query($con, "select * from seasons where id = '$seasona'");
                                                                                        $result = mysqli_fetch_array($getSeason);
                                                                                        $seasons=$result['season'];
                                                                                        
                                                                                        echo $seasons;
                                            
                                                                                        
                                                                                        
                                                                                        ?>

                                                                                        </option>
                                                                                        <?php
                                                                                        $seasons = mysqli_query($con, "select * from seasons");
                                                                                        foreach ($seasons as $season) {
                                                                                        ?>
                                                                                            <option value="<?= $season['id']; ?>"><?= $season['season']; ?></option>
                                                                                        <?php } ?>


                                                                                    </select>
                                                                                </div>



                                                                                <div class="mb-4 d-grid">
                                                                                    <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <?php


                                                        if (isset($_POST['update'])) {
                                                            $team           = $_POST['team'];
                                                            $season       = $_POST['season'];

                                                            $added_by       = $_SESSION['id'];
                                                            $id = $_POST['id'];


                                                            $sql2 = "UPDATE registered_teams SET team='$team', season='$season',  added_by='$added_by' WHERE id = $id";
                                                            $query2 = mysqli_query($con, $sql2);
                                                            if ($query2) {
                                                                echo "
                                                                <script type='text/javascript'>setTimeout(function() { window.location.href = 'register_teams.php';}, 3000);</script>
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



                                                        <a href="delete_register.php?id=<?= $row['id']; ?>" class="btn btn-danger" onclick='confirm("Are you sure you want to delete User")'><i class="las la-trash "></i>
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
            <!-- end row -->


            <!--end modal -->

        </div>
        <!-- container-fluid -->

        <!-- End Page-content -->

        <?php include "../includes/footer.php"; ?>
        </body>

        </html>