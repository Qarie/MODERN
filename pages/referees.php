<?php

include 'config.php';

if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['submit'])) {
    $name           = $_POST['name'];
    $date_of_birth  = $_POST['date_of_birth'];
    $phone          = $_POST['phone'];
    $email          = $_POST['email'];
    $address        = $_POST['address'];
    $added_by       = $_SESSION['id'];

    $sql = "INSERT INTO referees(name, date_of_birth, phone, email, address, added_by) VALUES('$name', '$date_of_birth,', '$phone', '$email', '$address', '$added_by')";
    $query = mysqli_query($con, $sql);
    if ($query) {
        header("location:referees.php");
    }
    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">


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
                        <h4 class="mb-sm-0">REFEREE</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">DDIBASTATS</a></li>
                                <li class="breadcrumb-item active">Referee</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Referee</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="referee">Referee Name</label>
                                    <input type="text" name="name" id="" class="form-control" placeholder="Enter Referee Name" aria-describedby="helpId">

                                </div>

                                <div class="mb-3">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <input type="date" class="form-control" name="date_of_birth" id="">

                                </div>

                                <div class="mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="" class="form-control" placeholder="Enter Phone" aria-describedby="helpId">

                                </div>

                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="" class="form-control" placeholder="Enter Email" aria-describedby="helpId">

                                </div>

                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" name="address" id="" rows="3" placeholder="Enter Address"></textarea>

                                </div>

                                <div class="mb-3 d-grid">
                                    <button type="submit" name='submit' class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Referees</h4>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="buttons-table-preview">
                                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                        <thead>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </thead>

                                        <tbody style="text-transform: uppercase; font-size:11px;">
                                            <?php
                                            $count = 0;
                                            $query1 = mysqli_query($con, "SELECT * FROM referees");
                                            while ($row = mysqli_fetch_array($query1)) {
                                                $count++;
                                            ?>
                                                <tr>
                                                    <td><?= $count ?></td>
                                                    <td><?= ($row['name']); ?></td>
                                                    <td><?= ($row['phone']); ?></td>
                                                    <td><?= ($row['email']); ?></td>
                                                    <td><?= ($row['address']); ?></td>
                                                    <td>
                                                        <a data-bs-toggle="modal" data-bs-target="#modalId<?= $row['id'] ?>" class="btn btn-warning"><i class="las la-edit "></i></a>




                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalId<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalTitleId">EDIT REFEREE</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <div><?php if (isset($msg)) {
                                                                                        echo $msg;
                                                                                    } ?></div>
                                                                            <form action="" method="POST">
                                                                                <div class="mb-3">
                                                                                    <input type="text" name="id" hidden value="<?= $row['id']; ?>">
                                                                                    <label for="name"> Name</label>
                                                                                    <input type="text" name="name" id="" class="form-control" value="<?= ($row['name']); ?>" aria-describedby="helpId">

                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="date_of_birth">Date of Birth</label>
                                                                                    <input type="date" class="form-control" name="date_of_birth" id="" value="<?= ($row['date_of_birth']); ?>">
                                                                                    <small id="emailHelpId" class="form-text text-muted">*</small>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="phone">Phone</label>
                                                                                    <input type="text" name="phone" id="" class="form-control" value="<?= ($row['phone']); ?>" placeholder="Enter Phone" aria-describedby="helpId">

                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="email">Email</label>
                                                                                    <input type="text" name="email" id="" class="form-control" value="<?= ($row['email']); ?>" aria-describedby="helpId">

                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="address">Address</label>
                                                                                    <textarea class="form-control" name="address" id="" rows="3"><?= ($row['address']); ?></textarea>

                                                                                </div>

                                                                                <div class="mb-3 d-grid">
                                                                                    <button type="submit" name="update" class="btn btn-primary">Submit</button>
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
                                                            $date_of_birth  = $_POST['date_of_birth'];
                                                            $phone          = $_POST['phone'];
                                                            $email          = $_POST['email'];
                                                            $address        = $_POST['address'];
                                                            $added_by       = $_SESSION['id'];
                                                            $id = $_POST['id'];


                                                            $sql = "UPDATE referees SET name='$name', phone='$phone', email='$email', date_of_birth='$date_of_birth', address='$address', added_by='$added_by' WHERE id = $id";
                                                            $query3 = mysqli_query($con, $sql);
                                                            if ($query3) {
                                                                # code...
                                                                $msg = "<div class='alert alert-primary shadow' role='alert' style='border-left:#155724 5px solid; border-radius: 0px'>
                                                                Success
                                                                <script type='text/javascript'>setTimeout(function() { window.location.href = 'referees.php';}, 3000);</script>
                                                                </div>";
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





                                                        <a href="delete_referee.php?id=<?= $row['id'] ?>" onclick="confirm('Do you want to Delete Referee')" class="btn btn-danger"><i class="las la-trash "></i>
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