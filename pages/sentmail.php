<?php
include 'config.php';

$email = $_GET['email'];
if (isset($_POST['vcodeconfirm'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $vcode = validate($_POST['vcode']);
    // $email = validate($_POST['email']);


    $sql = "SELECT * FROM accounts WHERE vcode='$vcode' AND email='$email'";

    $result = mysqli_query($con, $sql);
    $results = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) == 1) {
        if ($results['vcode'] == $vcode) {
            
            header("Location: change_password.php?vcode=$vcode");

        }
    } else {
        $msg = "<div class='alert alert-danger shadow' role='alert' style='border-left:#155724 5px solid; border-radius: 0px'>
         Invalid Verification Code
         
         </div>";
    }
    mysqli_close($con);
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

                                <div class="alert alert-borderless alert-warning text-center mb-2 mx-2" role="alert">
                                    Enter your code sent to you!
                                </div>
                                <div class="p-2">
                                    <form method="POST">
                                        <!-- <div class="mb-3">
                            <label for="emailaddress" class="form-label">Email Address</label>
                            <input class="form-control" type="email" required name="email" placeholder="Enter code here">
                        </div> -->
                                        <div><?php if (isset($msg)) {
                                                    echo $msg;
                                                } ?></div>

                                        <div class="mb-3">
                                            <label for="emailaddress" class="form-label">Enter Verification Code</label>
                                            <input class="form-control" type="text" required name="vcode" placeholder="Enter code here">
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" name="vcodeconfirm" value="Submit" class="btn btn-success form-control">
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
                </strong><br>
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