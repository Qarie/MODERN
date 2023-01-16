<?php
include 'config.php';
require "../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if (isset($_POST['fgpswdsubmit'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $email = validate($_POST['email']);


    $sql = "SELECT * FROM accounts WHERE email='$email'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // $_SESSION["login"] = "OK";
        // $_SESSION['email'] = $row['email'];
        // $_SESSION['name'] = $row['name'];
        // $_SESSION['id'] = $row['id'];
        function random_string($length)
        {
            $key = '';
            $keys = array_merge(range(0, 9), range('a', 'z'));

            for ($i = 0; $i < $length; $i++) {
                $key .= $keys[array_rand($keys)];
            }

            return $key;
        }
        $vcode = random_string(6);
        $Body = "<div style='padding-left:5px'>Your Verification code is <h2 style='color:green;'>" . $vcode . " </h2></div> ";



        $mail = new PHPMailer(true);

        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        $mail->isSMTP();
        $mail->SMTPAuth = true;

        $mail->Host = "mail.dscmuni.com";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->Username = "l.kulubasi@dscmuni.com";
        $mail->Password = "Sululaba@dsc22";

        $mail->setFrom("l.kulubasi@dscmuni.com", 'Dibbastats Password Recovery');
        $mail->addAddress($email);

        $mail->Subject = 'Dibbastats Verification Code';
        $mail->Body    = $Body;
        $mail->IsHTML(true);
        $mainsert = "UPDATE accounts SET vcode='$vcode' WHERE email='$email'";
        // $mainsert="INSERT INTO accounts(vcode) VALUES('$vcode')";
        $insquery = mysqli_query($con, $mainsert);
        if ($insquery) {
            $mail->send();
            $msg = "<div class='alert alert-primary shadow' role='alert' style='border-left:#155724 5px solid; border-radius: 0px'>
         Password Reset Code Has Been Sent To $email.
         <script type='text/javascript'>setTimeout(function() { window.location.href = 'sentmail.php?email=$email';}, 3000);</script>
         </div>";
            // header("Location: sentmail.php?email=$email");
        }
    } else {
        // $msg = "<div class='alert alert-primary shadow' role='alert' style='border-left:#155724 5px solid; border-radius: 0px'>
        //  Ooops! Email not found.
        //  </div>";

        $msg = "<div class='alert alert-danger shadow' role='alert' style='border-left:#155724 5px solid; border-radius: 0px'>Ooops! <h5 class='fw-bold'>Email not found.</h5> <script type='text/javascript'>setTimeout(function() { window.location.href = 'forgot_password.php';}, 3000);</script></div>";
        // header("Location: fgotpswd.php");
    }
    mysqli_close($con);
}

?>


<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="sm-hover" data-sidebar-image="none">

<head>

    <meta charset="utf-8" />
    <title>Reset Password | DDIBASTATS</title>
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
                                    <h5 class="text-primary">Forgot Password?</h5>

                                </div>

                                <div class="alert alert-borderless alert-warning text-center mb-2 mx-2" role="alert">
                                    Enter your email and instructions will be sent to you!
                                </div>
                                <div class="p-2">

                                    <form method="POST">
                                        <div><?php if (isset($msg)) {
                                                    echo $msg;
                                                } ?></div>
                                        <div class="mb-4">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter Email">
                                        </div>

                                        <div class="text-center mt-4">
                                            <button class="btn btn-success w-100" name="fgpswdsubmit" type="submit">Get Code</button>
                                        </div>
                                    </form><!-- end form -->
                                </div>
                                <div class="mt-4 text-center">
                                    <p class="mb-0">Wait, I remember my password... <a href="../index.php"> Click here </a> </p>
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