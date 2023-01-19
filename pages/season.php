<?php

include 'config.php';

if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("Location: ../index.php");
    exit;
}




if (isset($_POST['submit'])) {
    $tournament    = $_POST['tournament'];
    $season        = $_POST['season'];
    // $win           = $_POST['win'];
    // $draw          = $_POST['draw'];
    // $lose          = $_POST['lose'];
    // $teams         = $_POST['teams'];
    // $players       = $_POST['players'];
    $rules         = $_POST['rules'];
    $added_by      = $_SESSION['id'];

    $sql = "INSERT INTO seasons(tournament, season, rules, added_by) VALUES('$tournament','$season','$rules', '$added_by')";
    $query = mysqli_query($con, $sql);
    if ($query) {
        # code...
        header("location:season.php");
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

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Season</h4>
                        </div>

                        <div class="card-body">
                            <div class="tab-content">
                                <form action="" method="POST">


                                    <div class="mb-3">
                                        <label for="tournament">Tournament</label>
                                        <select required id="tournament" class="form-control" name="tournament" required>
                                            <option>-- Select Tournament --</option>
                                            <?php
                                            $leagues = mysqli_query($con, "SELECT name FROM leagues");
                                            while ($all = mysqli_fetch_array($leagues)) {
                                            ?>
                                                <option><?= $all['name']; ?></option>
                                            <?php
                                            } ?>
                                        </select>

                                    </div>

                                    <div class="mb-3">
                                        <label for="season">Season Name</label>
                                        <input required type="text" name="season" id="" class="form-control" placeholder="Enter Season Name" required>

                                    </div>

                                    <!-- <div class="row ">
                                        <h5>Set Points</h5>
                                        <div class="col-sm">
                                            <div class="mb-3">
                                                <label style="text-align: center;" for="win">Win</label>
                                                <input type="number" name="win" id="" class="form-control" required>
                                                <small id="helpId" class="text-muted">Home/Away</small>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="mb-3">
                                                <label for="Draw" style="text-align: center;">Draw</label>
                                                <input type="number" name="draw" id="" class="form-control" required>
                                                <small id="helpId" class="text-muted">Home/Away</small>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="mb-3">
                                                <label for="lose" style="text-align: center;">Lose</label>
                                                <input type="number" name="lose" id="" class="form-control" required>
                                                <small id="helpId" class="text-muted">Home/Away</small>
                                            </div>
                                        </div>
                                    </div> -->



                                    <div class="mb-3">
                                        <label for="rules">Season Rules</label>
                                        <textarea required class="form-control" name="rules" id="" rows="2"></textarea>
                                    </div>


                                    <div class="mb-3 d-grid">
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Seasons </h4>
                        </div>

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="table-responsive">
                                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                        <thead>
                                            <th>#</th>
                                            <th>Tournament</th>
                                            <th>Season</th>
                                            <th>Rules</th>

                                            <th>Action</th>
                                        </thead>
                                        <tbody style="text-transform: uppercase; font-size:11px;">
                                            <?php
                                            $count = 0;
                                            $query1 = mysqli_query($con, "SELECT * FROM seasons");
                                            while ($row = mysqli_fetch_array($query1)) {
                                                $teams = $row['teams'];
                                                $players = $row['players'];
                                                $count++;
                                            ?>
                                                <tr>
                                                    <td><?= $count ?></td>
                                                    <td><?= ($row['tournament']); ?></td>
                                                    <td><?= ($row['season']); ?></td>
                                                    <td><?= $row['rules']; ?></td>
                                                    <td>
                                                        <a data-bs-toggle="modal" data-bs-target="#modalId<?= $row['id']; ?>" class="btn btn-warning"><i class="las la-edit"></i></a>




                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalId<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <form action="" method="POST">
                                                                                <input type="text" name="id" hidden value="<?= $row['id']; ?>">
                                                                                <div class="mb-3">
                                                                                    <label for="tournament">Tournament</label>

                                                                                    <select id="tournament" class="form-control" name="tournament" required>
                                                                                        <option selected value="<?= $row['tournament']; ?>"><?= $row['tournament']; ?></option>
                                                                                        <?php
                                                                                        $leagues = mysqli_query($con, "SELECT name FROM leagues");
                                                                                        while ($all = mysqli_fetch_array($leagues)) {
                                                                                        ?>
                                                                                            <option><?= $all['name']; ?></option>
                                                                                        <?php
                                                                                        } ?>
                                                                                    </select>

                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="season">Season Name</label>
                                                                                    <input type="text" name="season" id="" class="form-control" value="<?= $row['season']; ?>" required>

                                                                                </div>

                                                                                <!-- <div class="row ">
                                                                                        <h5>Set Points</h5>
                                                                                        <div class="col-sm">
                                                                                            <div class="mb-3">
                                                                                                <label style="text-align: center;" for="win">Win</label>
                                                                                                <input type="number" value="<?= $row['win']; ?>" name="win" id="" class="form-control" required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm">
                                                                                            <div class="mb-3">
                                                                                                <label for="Draw" style="text-align: center;">Draw</label>
                                                                                                <input type="number" value="<?= $row['draw']; ?>" name="draw" id="" class="form-control" required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm">
                                                                                            <div class="mb-3">
                                                                                                <label for="lose" style="text-align: center;">Lose</label>
                                                                                                <input type="number" value="<?= $row['lose']; ?>" name="lose" id="" class="form-control" required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <small id="helpId" class="text-muted">*</small>
                                                                                    </div> -->

                                                                                <div class="mb-3">
                                                                                    <label for="rules">Season Rules</label>
                                                                                    <textarea class="form-control" name="rules" id="" rows="2" required><?= $row['rules']; ?></textarea>

                                                                                </div>

                                                                                <div class="mb-3 d-grid">
                                                                                    <button type="submit" name="update" class="btn btn-primary" style="float:right">Save Changes</button>
                                                                                </div>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                </div>
                                <?php

                                                if (isset($_POST['update'])) {
                                                    $tournament    = $_POST['tournament'];
                                                    $season        = $_POST['season'];
                                                    $rules         = $_POST['rules'];
                                                    $added_by      = $_SESSION['id'];

                                                    $id = $_POST['id'];

                                                    $sql = "UPDATE seasons SET tournament = '$tournament', season='$season',rules='$rules', added_by='$added_by' WHERE id=$id";
                                                    $query = mysqli_query($con, $sql);
                                                    if ($query) {

                                                        echo "
        <script type='text/javascript'>setTimeout(function() { window.location.href = 'season.php';}, 3000);</script>
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



                                <a href="delete_season.php?id=<?= $row['id'] ?>" onclick="confirm('Do you want to Delete Season')" class="btn btn-danger"><i class="las la-trash"></i>
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
<?php include '../includes/footer.php'; ?> </body>

</html>