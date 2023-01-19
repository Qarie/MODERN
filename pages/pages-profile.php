<?php include "config.php"; ?>
<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>




<?php


if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("Location: ../index.php");
    exit;
}
$id = $_SESSION['id'];
$sql1 = mysqli_query($con, "Select * from accounts where id='$id'");
$results = mysqli_fetch_array($sql1);




?>



<?php
// update password

if (isset($_POST['change'])) {
    $old_password       = md5($_POST['old_password']);
    $new_password       = md5($_POST['new_password']);
    $password = $results['password'];
    $email = $results['email'];

    if ($old_password == $password) {
        $maupdate = "UPDATE accounts SET password='$new_password' WHERE email='$email'";
        // "UPDATE employee ". "SET emp_salary = $emp_salary ". "WHERE emp_id = $emp_id" ;
        // $update = mysqli_query($con, "UPDATE accounts SET password = $new_password WHERE email = $email ");
        if (mysqli_query($con, $maupdate)) {
            echo '<script type="text/javascript">alert("Your Password has been successfully updated");window.location=\'pages-profile.php\';</script>';
        } else {
            $maerror = "Error: " . $maupdate . "<br>" . mysqli_error($dbconn);
            $feed = "<div class='alert alert-primary shadow' role='alert' style='border-left:#155724 5px solid; border-radius: 0px'>'.$maerror.' <script type='text/javascript'>setTimeout(function() { window.location.href = 'pages-profile.php';}, 2000);</script></div>";
        }
        // echo '<script type="text/javascript">alert("Your Password has been updated Successfully");window.location=\'logout.php\';</script>';

        // $feed = "<div class='alert alert-primary shadow' role='alert' style='border-left:#155724 5px solid; border-radius: 0px'>Password Changed <script type='text/javascript'>setTimeout(function() { window.location.href = 'logout.php';}, 2000);</script></div>";

    } else {
        $feed = "<div class='alert alert-danger shadow' role='alert' style='border-left:#155724 5px solid; border-radius: 0px'>Wrong Password! Please Enter Your correct old Password <script type='text/javascript'>setTimeout(function() {window.location.href = 'pages-profile.php';}, 2000);</script></div>";
    }
}

?>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="profile-foreground position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg">
                    <img src="../assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
                </div>
            </div>
            <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
                <div class="row g-4">
                    <div class="col-auto">
                        <div class="avatar-lg">
                            <img src="../assets/images/users/avatar-1.jpg" alt="user-img" class="img-thumbnail rounded-circle" />
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col">
                        <div class="p-2">

                            <h3 class="text-white mb-1"><?= $result['name']; ?></h3>
                            <p class="text-white-75"><?php
                                                        $role = $result['role'];

                                                        if ($role == 1) {
                                                            echo "Administrator";
                                                        } else {
                                                            echo "User";
                                                        }

                                                        ?></p>
                            <div class="hstack text-white-50 gap-1">
                                <div class="me-2"><i class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i><?= $result['address']; ?></div>

                            </div>
                        </div>
                    </div>

                    <!--end col-->

                </div>
                <!--end row-->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div class="d-flex">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                        <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Overview</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fs-14" data-bs-toggle="tab" href="#activities" role="tab">
                                        <i class="ri-list-unordered d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Edit Info</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fs-14" data-bs-toggle="tab" href="#projects" role="tab">
                                        <i class="ri-price-tag-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Change Password</span>
                                    </a>
                                </li>

                            </ul>

                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content pt-4 text-muted">
                            <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                <div class="row">
                                    <div class="col-xxl-3">


                                        <div class="card">
                                            <div class="card-body">
                                                <div class="container-fluid">
                                                    <h5 class="card-title mb-3">Account Info</h5>
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Full Name :</th>
                                                                    <td class="text-muted"><?= $result['name']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Mobile :</th>
                                                                    <td class="text-muted"><?= $result['phone']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">E-mail :</th>
                                                                    <td class="text-muted"><?= $result['email']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Location :</th>
                                                                    <td class="text-muted"><?= $result['address']; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Joining Date</th>
                                                                    <td class="text-muted">24 Nov 2021</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div>





                                        <!--end card-->
                                    </div>
                                    <!--end col-->

                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <div class="tab-pane fade" id="activities" role="tabpanel">
                                <div class="card">
                                    <div class="card-header text-capitalize bold">
                                        Edit Account info
                                    </div>
                                    <div class="card-body">
                                        <div class="container-fluid">
                                            <?php

                                            if (isset($_POST['submit'])) {
                                                $name           = $_POST['name'];
                                                $role       = $_POST['role'];
                                                $phone          = $_POST['phone'];
                                                $email          = $_POST['email'];
                                                $date_of_birth  = $_POST['date_of_birth'];
                                                $address        = $_POST['address'];
                                                $added_by       = $_SESSION['id'];
                                                $photo = $_FILES["photo"]["name"];
                                                $tempname = $_FILES["photo"]["tmp_name"];
                                                $folder = "../uploads/users/" . $photo;
                                                $store = move_uploaded_file($tempname, $folder);

                                                $sql = "UPDATE accounts SET name='$name', role='$role', phone='$phone', email = '$email', date_of_birth='$date_of_birth', address='$address', photo='$photo', added_by='$added_by' WHERE id = $id";
                                                $query = mysqli_query($con, $sql);
                                                if ($query) {
                                                    $msg = "<div class='alert alert-primary shadow' role='alert' style='border-left:#155724 5px solid; border-radius: 0px'>Records Updated Successfully <script type='text/javascript'>setTimeout(function() { window.location.href = 'pages-profile.php';}, 2000);</script></div>";
                                                }
                                            }

                                            mysqli_close($con);

                                            ?>
                                            <form method="POST" enctype="multipart/form-data">

                                                <div class="row p-2">
                                                    <?php
                                                    if (isset($msg)) {
                                                        echo $msg;
                                                    } ?>
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label for="name"> Name</label>
                                                            <input type="text" name="name" id="" class="form-control" value="<?= ($results['name']); ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="phone">Phone</label>
                                                            <input type="text" name="phone" id="" class="form-control" value="<?= ($results['phone']); ?>" placeholder="Enter Phone">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="date_of_birth">Date of Birth</label>
                                                            <input type="date" class="form-control" name="date_of_birth" id="" value="<?= ($results['date_of_birth']); ?>">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" class="form-control" name="email" required value="<?= ($results['email']); ?>">
                                                        </div>

                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label for="role"> role</label>
                                                            <select type="text" name="role" id="" class="form-select">
                                                                <option value="<?= ($results['role']); ?>" selected>
                                                                    <?php
                                                                    $role = $result['role'];

                                                                    if ($role == 1) {
                                                                        echo "Administrator";
                                                                    } else {
                                                                        echo "User";
                                                                    }

                                                                    ?>
                                                                </option>
                                                                <option value="1">Adminstrator</option>
                                                                <option value="2">User</option>

                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="photo">Upload Photo</label>
                                                            <input type="file" class="form-control" name="photo" id="">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="address">Address</label>
                                                            <textarea class="form-control" name="address" id="" rows="5"><?= ($results['address']); ?></textarea>
                                                        </div>

                                                    </div>
                                                    <div class="mb-3 d-grid">
                                                        <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                                                    </div>
                                                </div>
                                            </form>


                                        </div>
                                        <!--end card-body-->
                                    </div>
                                    <!--end card-->
                                </div>
                            </div>
                            <!--end tab-pane-->
                            <div class="tab-pane fade" id="projects" role="tabpanel">
                                <div class="card ">
                                    <div class="card-header text-capitalize bold">
                                        Change Password
                                    </div>
                                    <div class="card-body">
                                        <div class="container-fluid">
                                            <form  method="POST">

                                                <?php
                                                if (isset($feed)) {
                                                    echo $feed;
                                                } ?>

                                                <div class="mb-3">
                                                    <label for="password">Current Password</label>
                                                    <input type="password" class="form-control" name="old_password" id="" placeholder="Enter Old Password" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="password">New Password</label>
                                                    <input type="password" class="form-control" name="new_password" id="" placeholder="Enter New Password" required>
                                                </div>

                                                <div class="mb-3 d-grid">
                                                    <button type="submit" class="btn btn-primary" name="change">Change Password</button>
                                                </div>

                                            </form>
                                            <!--end card-body-->
                                        </div>
                                        <!--end card-->
                                    </div>
                                    <!--end tab-pane-->

                                    <!--end tab-pane-->
                                </div>
                                <!--end tab-content-->
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                </div><!-- container-fluid -->
            </div><!-- End Page-content -->


        </div><!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

</div>





<?php include "../includes/footer.php"; ?>
</body>

</html>