<?php
// update password
include "config.php";
$vcode = $_GET['vcode'];
if (isset($_POST['change'])) {
    $new_password       = md5($_POST['new_password']);
    $repeat_new_password       = md5($_POST['repeat_new_password']);


    if ($new_password == $repeat_new_password) {
        $maupdate = "UPDATE accounts SET password='$new_password' WHERE vcode='$vcode'";
        // $update = mysqli_query($con, "UPDATE accounts SET password = $new_password WHERE email = $email ");
        if (mysqli_query($con, $maupdate)) {

            $msg = "<div class='alert alert-primary shadow' role='alert' style='border-left:#155724 5px solid; border-radius: 0px'>
            Password has Been Successfully Reset.
            <script type='text/javascript'>setTimeout(function() { window.location.href = '../index.php';}, 3000);</script>
            </div>";

            //     echo '<script type="text/javascript">window.onload = function () { alert("Your Password has been successfully updated. Kindly login with your new password");window.location=\'logout.php\'; } 
            // </script>';

            // echo '<script type="text/javascript">alert("Your Password has been successfully updated");window.location=\'logout.php\';</script>'; 
        } else {
            $maerror = "Error: " . $maupdate . "<br>" . mysqli_error($dbconn);
            $feed = "<div class='alert alert-primary shadow' role='alert' style='border-left:#155724 5px solid; border-radius: 0px'>'.$maerror.' <script type='text/javascript'>setTimeout(function() { window.location.href = 'account.php';}, 2000);</script></div>";
        }
        // echo '<script type="text/javascript">alert("Your Password has been updated Successfully");window.location=\'logout.php\';</script>';

        // $feed = "<div class='alert alert-primary shadow' role='alert' style='border-left:#155724 5px solid; border-radius: 0px'>Password Changed <script type='text/javascript'>setTimeout(function() { window.location.href = 'logout.php';}, 2000);</script></div>";

    } else {
        $msg = "<div class='alert alert-danger shadow' role='alert' style='border-left:#155724 5px solid; border-radius: 0px'>Wrong Password! Please Enter Your correct old Password </div>";
    }
}

?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="sm-hover" data-sidebar-image="none">

<head>

    <meta charset="utf-8" />
    <title>Verify Password | DDIBASTATS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Themesbrand" name="author" />


    <!-- Layout config Js -->
    <script src="../assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="../assets/css/custom.min.css" rel="stylesheet" type="text/css" />


</head>

<body>

    <div class="auth-page-wrapper p-5">
        <!-- auth page bg -->


        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">

                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card ">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Verify Email</h5>

                                </div>

                                <br>
                                <div class="p-2">
                                    <form method="POST">
                                        <?php
                                        if (isset($msg)) {
                                            echo $msg;
                                        } ?>


                                        <div class="mb-3">
                                            <label for="password">New Password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" class="form-control" name="new_password" id="" placeholder="Enter New Password" required>
                                                <div class="input-group-text" data-password="false">
                                                    <span class="ri-eye-fill align-middle"></span>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="mb-3">
                                            <label for="password">Repeat Password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" class="form-control" name="repeat_new_password" id="" placeholder="Repeat Password" required>
                                                <div class="input-group-text" data-password="false">
                                                    <span class="ri-eye-fill align-middle"></span>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="mb-3 d-grid">
                                            <button type="submit" class="btn btn-success" name="change">Change Password</button>
                                        </div>

                                    </form>

                                </div>

                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->



                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="text-center">

            <p class=" text-muted">&copy;
                <strong>
                    <script>
                        document.write(new Date().getFullYear())
                    </script> DbibaStats.
                </strong><br>Developed by HI DEVELOPERS
            </p>


        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/simplebar/simplebar.min.js"></script>
    <script src="../assets/libs/node-waves/waves.min.js"></script>
    <script src="../assets/libs/feather-icons/feather.min.js"></script>
    <script src="../assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="../assets/js/plugins.js"></script>

    <!-- particles js -->
    <script src="../assets/libs/particles.js/particles.js"></script>

    <!-- particles app js -->
    <script src="../assets/js/pages/particles.app.js"></script>
</body>

</html>