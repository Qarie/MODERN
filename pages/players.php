<?php

include "config.php";

if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['submit'])) {
    $ma_id_number  = $_POST['ma_id_number'];
    $first_name  = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $date_of_birth  = $_POST['date_of_birth'];
    $nationality    = $_POST['nationality'];
    $team           = $_POST['team'];
    $title           = $_POST['title'];
    $level           = $_POST['level'];
    $added_by       = $_SESSION['id'];

    // File upload path
    $photo = $_FILES["photo"]["name"];
    $tempname = $_FILES["photo"]["tmp_name"];
    $folder = "../uploads/players/" . $photo;
    $store = move_uploaded_file($tempname, $folder);

    $sql = "INSERT INTO players ( ma_id_number, first_name, last_name, date_of_birth, nationality, team, title, level, photo, added_by) VALUES('$ma_id_number', '$first_name', '$last_name', '$date_of_birth', '$nationality','$team','$title', '$level','$photo', '$added_by')";
    $query = mysqli_query($con, $sql);
    if ($query) {
        header("location:players.php");
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><a data-bs-toggle="modal" data-bs-target="#import" class="btn btn-success"><i class="las la-import"></i>Import</a> <a class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#player"><i class="las la-plus"></i> Add Player</a></h4>
                        </div>
                        <div class="modal fade" id="player" tabindex="-1" aria-labelledby="playerLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="playerLabel">Add Player</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body m-2">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div><?php if (isset($msg)) {
                                                        echo $msg;
                                                    } ?></div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="ma_id_number">MA ID Number</label>
                                                        <input type="text" name="ma_id_number" id="ma_id_number" class="form-control" placeholder="Enter Ma ID Number" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="title">Player Title</label>
                                                        <select name="title" id="" class="form-control" required>
                                                            <option value="">--select--</option>
                                                            <?php
                                                            $query = mysqli_query($con, "SELECT abbreviation FROM positions");
                                                            while ($row = mysqli_fetch_array($query)) {

                                                            ?>
                                                                <option><?= $row['abbreviation']; ?></option>

                                                            <?php
                                                            } ?>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="First Name">First Name</label>
                                                        <input type="text" required name="first_name" id="" class="form-control" placeholder="Enter First Name" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="last Name">Last Name</label>
                                                        <input type="text" required name="last_name" id="" class="form-control" placeholder="Enter Last Name" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="Nationality">Nationality</label>
                                                        <input type="text" required name="nationality" id="" class="form-control" placeholder="Enter Nationality Name" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="team">Club Name</label>
                                                        <select name="team" id="" class="form-control" required>
                                                            <option value="">--select--</option>
                                                            <?php
                                                            $quer = mysqli_query($con, "SELECT name FROM teams");
                                                            while ($rowy = mysqli_fetch_array($quer)) {

                                                            ?>
                                                                <option><?= $rowy['name']; ?></option>

                                                            <?php
                                                            } ?>

                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="level">Level</label>
                                                        <select name="level" id="" class="form-control" required>
                                                            <option value="">--select--</option>
                                                            <option>Professional</option>
                                                            <option>Amatuer(Under Contract)</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="date_of_birth">Date of Birth</label>
                                                        <input type="date" required class="form-control" name="date_of_birth" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="photo">Upload Photo</label>
                                                <input type="file" class="form-control" name="photo" id="">
                                            </div>

                                            <div class="mb-3 d-grid">
                                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- import players -->
                        <div class="modal fade" id="import" tabindex="-1" aria-labelledby="pimportLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="pimportLabel">Import</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body m-2">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label for="upload">Upload CSV</label>
                                                <input type="file" class="form-control" required name="file" id="file" accept=".csv,.xls,.xlsx">
                                            </div>

                                            <div class="mb-3">
                                                <button type="submit" name="submit" class="btn btn-primary">Import Data</button>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="table-responsive">
                                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                        <thead>
                                            <th>#</th>
                                            <th>Ma ID Number</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Nationality</th>
                                            <th>Date of Birth</th>
                                            <th>Club Name</th>
                                            <!-- <th>Title</th> -->
                                            <th>Level</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody style="text-transform: uppercase; font-size:11px; text-align:center;">
                                            <?php
                                            $count = 0;
                                            $query1 = mysqli_query($con, "SELECT * FROM players");
                                            while ($row = mysqli_fetch_array($query1)) {
                                                $count++;
                                            ?>
                                                <tr>
                                                    <td><?= $count; ?></td>
                                                    <td><?= $row['ma_id_number']; ?></td>
                                                    <td><?= $row['first_name']; ?></td>
                                                    <td><?= $row['last_name']; ?></td>
                                                    <td><?= ($row['nationality']); ?></td>
                                                    <td><?= ($row['date_of_birth']); ?></td>
                                                    <td><?= ($row['team']); ?></td>
                                                    <!-- <td><? //= ($row['title']); 
                                                                ?></td>                                                                                                                 -->
                                                    <td><?= ($row['level']); ?></td>
                                                    <td>
                                                        <a data-bs-toggle="modal" data-bs-target="#modalId<?= $row['id'] ?>" class="btn btn-warning"><i class="las la-edit "></i></a>



                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalId<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalTitleId">EDIT PLAYER</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <form action="" method="POST" enctype="multipart/form-data">
                                                                            <div><?php if (isset($msg)) {
                                                                                            echo $msg;
                                                                                        } ?></div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <div class="mb-3">
                                                                                            <input type="text" hidden name="id" value="<?= $row['id']; ?>">
                                                                                            <label for="ma_id_number">MA ID Number</label>
                                                                                            <input type="text" name="ma_id_number" id="ma_id_number" class="form-control" value="<?= $row['ma_id_number']; ?>" required>
                                                                                        </div>

                                                                                        <div class="mb-3">
                                                                                            <label for="title">Player Title</label>
                                                                                            <select name="title" id="" class="form-control" required>
                                                                                                <option value="<?= $row['title']; ?>" selected><?= $row['title']; ?></option>
                                                                                                <?php
                                                                                                $querys = mysqli_query($con, "SELECT abbreviation FROM positions");
                                                                                                while ($rowr = mysqli_fetch_array($querys)) {

                                                                                                ?>
                                                                                                    <option><?= $rowr['abbreviation']; ?></option>

                                                                                                <?php
                                                                                                } ?>
                                                                                            </select>
                                                                                        </div>

                                                                                        <div class="mb-3">
                                                                                            <label for="First Name">First Name</label>
                                                                                            <input type="text" required name="first_name" id="" class="form-control" value="<?= $row['first_name']; ?>" required>
                                                                                        </div>

                                                                                        <div class="mb-3">
                                                                                            <label for="last Name">Last Name</label>
                                                                                            <input type="text" required name="last_name" id="" class="form-control" value="<?= $row['last_name']; ?>" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <div class="mb-3">
                                                                                            <label for="Nationality">Nationality</label>
                                                                                            <input type="text" required name="nationality" id="" class="form-control" value="<?= $row['nationality']; ?>" required>
                                                                                        </div>

                                                                                        <div class="mb-3">
                                                                                            <label for="team">Club Name</label>
                                                                                            <select name="team" id="" class="form-control" required>
                                                                                                <option value="<?= $row['team']; ?>"><?= $row['team']; ?></option>
                                                                                                <?php
                                                                                                $quer = mysqli_query($con, "SELECT name FROM teams");
                                                                                                while ($rowy = mysqli_fetch_array($quer)) {

                                                                                                ?>
                                                                                                    <option><?= $rowy['name']; ?></option>

                                                                                                <?php
                                                                                                } ?>

                                                                                            </select>
                                                                                        </div>

                                                                                        <div class="mb-3">
                                                                                            <label for="level">Level</label>
                                                                                            <select name="level" id="" class="form-control" required>
                                                                                                <option value="<?= $row['level']; ?>"><?= $row['level']; ?></option>
                                                                                                <option>Professional</option>
                                                                                                <option>Amatuer(Under Contract)</option>
                                                                                            </select>
                                                                                        </div>

                                                                                        <div class="mb-3">
                                                                                            <label for="date_of_birth">Date of Birth</label>
                                                                                            <input type="date" required class="form-control" name="date_of_birth" value="<?= $row['date_of_birth']; ?>" required>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="photo">Upload Photo</label>
                                                                                    <input type="file" class="form-control" name="photo" id="">
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
                                                            $ma_id_number    = $_POST['ma_id_number'];
                                                            $title           = $_POST['title'];
                                                            $first_name      = $_POST['first_name'];
                                                            $last_name       = $_POST['last_name'];
                                                            $date_of_birth   = $_POST['date_of_birth'];
                                                            $nationality     = $_POST['nationality'];
                                                            $team            = $_POST['team'];
                                                            $level           = $_POST['level'];
                                                            $added_by        = $_SESSION['id'];
                                                            // File upload path
                                                            @$photo = $_FILES["photo"]["name"];
                                                            $tempname = $_FILES["photo"]["tmp_name"];
                                                            $folder = "../uploads/players/" . $photo;
                                                            $store = move_uploaded_file($tempname, $folder);

                                                            $id = $_POST['id'];
                                                            $sql4 = "UPDATE players SET ma_id_number = '$ma_id_number', title='$title', first_name='$first_name', last_name='$last_name', date_of_birth='$date_of_birth', nationality='$nationality', team='$team', level='$level', photo='$photo', added_by='$added_by' WHERE id = $id";
                                                            $query4 = mysqli_query($con, $sql4);
                                                            if($query4){
                                                                echo "
                                                                <script type='text/javascript'>setTimeout(function() { window.location.href = 'players.php';}, 3000);</script>
                                                                ";
                                                            }
                                                        }

                                                        ?>





                                                        <a href="delete_player.php?id=<?= $row['id'] ?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')"><i class="las la-trash"></i></a>

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