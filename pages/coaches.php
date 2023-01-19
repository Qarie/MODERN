<?php

include "config.php";

if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['submit'])) {
    $name           = $_POST['name'];
    $team           = $_POST['team'];
    $role           = $_POST['role'];
    $date_of_birth  = $_POST['date_of_birth'];
    $phone          = $_POST['phone'];
    $email          = $_POST['email'];
    $address        = $_POST['address'];
    $added_by       = $_SESSION['id'];

    $photo          = $_FILES["photo"]["name"];
    $tempname       = $_FILES["photo"]["tmp_name"];
    $folder         = "../uploads/coaches/" . $photo;
    $store          = move_uploaded_file($tempname, $folder);

    $sql = "INSERT INTO coaches(name, team, role, date_of_birth, phone, email, address, photo, added_by) VALUES('$name', '$team', '$role', '$date_of_birth,', '$phone', '$email', '$address', '$photo', '$added_by')";
    $query = mysqli_query($con, $sql);
    if ($query) {
        header("location:coaches.php");
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
                        <h4 class="mb-sm-0">COACHES</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">DDIBASTATS</a></li>
                                <li class="breadcrumb-item active">Coaches</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Coaches<a class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#add"><i class="las la-plus"></i> Add Coach</a></h4>
                        </div>
                        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addLabel">Add Coach</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body m-2">

                                        <form action="" method="POST" enctype="multipart/form-data">

                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="Coach">Coach Name</label>
                                                        <input type="text" name="name" id="" class="form-control" placeholder="Enter Coach Name" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="team">Team</label>
                                                        <select name="team" id="" class="form-control" required>
                                                            <option value="">--select--</option>
                                                            <?php
                                                            $query3 = mysqli_query($con, "SELECT name FROM teams");
                                                            while ($row = mysqli_fetch_array($query3)) {

                                                            ?>
                                                                <option><?= $row['name']; ?></option>

                                                            <?php
                                                            } ?>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="role">Role</label>
                                                        <input type="text" name="role" id="" class="form-control" placeholder="Enter Role" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="date_of_birth">Date of Birth</label>
                                                        <input type="date" required class="form-control" name="date_of_birth" id="">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="phone">Phone</label>
                                                        <input type="text" name="phone" id="" class="form-control" placeholder="Enter Phone" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="email">Email</label>
                                                        <input type="text" name="email" id="" class="form-control" placeholder="Enter Email" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="address">Address</label>
                                                        <textarea required class="form-control" name="address" id="" rows="1" placeholder="Enter Address"></textarea>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="photo">Photo</label>
                                                        <input type="file" class="form-control" name="photo" id="">
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="mb-3 d-grid">
                                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Team</th>
                                            <th>Role</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Date of Birth</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody style="text-transform: uppercase; text-align:center; font-size:11px;">
                                            <?php
                                            $count = 0;
                                            $query1 = mysqli_query($con, "SELECT * FROM coaches");
                                            while ($row = mysqli_fetch_array($query1)) {
                                                $count++;
                                            ?>
                                                <tr>
                                                    <td><?= $count ?></td>
                                                    <th><img src="../uploads/coaches/<?= $row['photo']; ?>" alt="" width="50px" height="50px"></th>
                                                    <td><?= ($row['name']); ?></td>
                                                    <td><?= ($row['team']); ?></td>
                                                    <td><?= ($row['role']); ?></td>
                                                    <td><?= ($row['phone']); ?></td>
                                                    <td><?= ($row['email']); ?></td>
                                                    <td><?= ($row['address']); ?></td>
                                                    <td><?= ($row['date_of_birth']); ?></td>
                                                    <td>
                                                        <a data-bs-toggle="modal" data-bs-target="#modalId<?= $row['id'] ?>" class="btn btn-warning"><i class="las la-edit"></i></a>



                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalId<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalTitleId">EDIT COACH</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <form action="" method="POST" enctype="multipart/form-data">
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <div class="mb-3">
                                                                                            <input type="text" hidden name="id" value="<?= $row['id'] ?>">
                                                                                            <label for="Coach">Coach Name</label>
                                                                                            <input type="text" name="name" id="" class="form-control" value="<?= $row['name']; ?>" aria-describedby="helpId">

                                                                                        </div>

                                                                                        <div class="mb-3">
                                                                                            <label for="team">Team</label>
                                                                                            <select name="team" id="" class="form-control">
                                                                                                <option selected value="<?= $row['team']; ?>"><?= $row['team']; ?></option>
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
                                                                                            <label for="role">Role</label>
                                                                                            <input type="text" name="role" id="" class="form-control" aria-describedby="helpId" value="<?= $row['role']; ?>">

                                                                                        </div>

                                                                                        <div class="mb-3">
                                                                                            <label for="date_of_birth">Date of Birth</label>
                                                                                            <input type="date" class="form-control" name="date_of_birth" id="" value="<?= $row['date_of_birth']; ?>">

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col">


                                                                                        <div class="mb-3">
                                                                                            <label for="phone">Phone</label>
                                                                                            <input type="text" name="phone" id="" class="form-control" value="<?= $row['phone']; ?>" aria-describedby="helpId">

                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <label for="email">Email</label>
                                                                                            <input type="text" name="email" id="" class="form-control" aria-describedby="helpId" value="<?= $row['email']; ?>">

                                                                                        </div>

                                                                                        <div class="mb-3">
                                                                                            <label for="address">Address</label>
                                                                                            <input class="form-control" name="address" value="<?= $row['address']; ?>">

                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <label for="photo">Photo</label>
                                                                                            <input type="file" class="form-control" name="photo" value="<?= $row['photo']; ?>" >

                                                                                        </div>
                                                                                    </div>

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
                                                            $team           = $_POST['team'];
                                                            $role           = $_POST['role'];
                                                            $date_of_birth  = $_POST['date_of_birth'];
                                                            $phone          = $_POST['phone'];
                                                            $email          = $_POST['email'];
                                                            $address        = $_POST['address'];
                                                            $added_by       = $_SESSION['id'];
                                                            $photo          = $_FILES["photo"]["name"];
                                                            $tempname       = $_FILES["photo"]["tmp_name"];
                                                            $folder         = "../uploads/coaches/" . $photo;
                                                            $store          = move_uploaded_file($tempname, $folder);
                                                            $id = $_POST['id'];

                                                            $sql2 = "UPDATE coaches SET name='$name', team='$team', phone='$phone', email='$email', date_of_birth='$date_of_birth', address='$address', photo='$photo', added_by='$added_by' WHERE id = $id";
                                                            $query2 = mysqli_query($con, $sql2);
                                                            if ($query2) {
                                                                echo "
                                                                <script type='text/javascript'>setTimeout(function() { window.location.href = 'coaches.php';}, 2000);</script>
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


                                                        <a href="delete_coach.php?id=<?= $row['id'] ?>" onclick="confirm('Do you want to Delete Coach')" class="btn btn-danger"><i class="las la-trash"></i>
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