<?php

include "config.php";

if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("Location: ../index.php");
    exit;
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
                        <h4 class="mb-sm-0">SETTINGS</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">DDIBASTATS</a></li>
                                <li class="breadcrumb-item active">Settings</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-10 m-auto">
                <div class="row">

                    <div class="col-md-6 col-xl-3">
                        <div class="card user-card">
                            <div class="card-body text-center">
                               
                                <div class="card-title mb-4">
                                    <strong class="text-uppercase">Leagues</strong>

                                    <?php
                                    $sql = mysqli_query($con, "select * from seasons");
                                    $result = mysqli_num_rows($sql);
                                    

                                    ?>
                                </div>
                                <div class="mb-5">
                                <a href="leagues.php" class="btn btn-primary">MORE DETAILS
                                    
                                    
                                </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card user-card">
                            <div class="card-body text-center">
                                
                                <div class="card-title mb-4">
                                    <strong class="text-uppercase">Teams</strong>


                                </div>
                                <div class="mb-5">
                                <a href="teams.php" class="btn btn-primary">MORE DETAILS
                                    
                                    <?php
                                    $sql = mysqli_query($con, "select * from seasons");
                                    $result = mysqli_fetch_array($sql);

                                    ?>
                                </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card user-card">
                            <div class="card-body text-center">
                               
                                <div class="card-title mb-4">
                                    <strong class="text-uppercase">Players</strong>


                                </div>
                                <div class="mb-5">
                                <a href="players.php" class="btn btn-primary">MORE DETAILS
                                    
                                    <?php
                                    $sql = mysqli_query($con, "select * from seasons");
                                    $result = mysqli_fetch_array($sql);

                                    ?>
                                </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card user-card">
                            <div class="card-body text-center">
                                
                                <div class="card-title mb-4">
                                    <strong class="text-uppercase">Coaches</strong>


                                </div>
                                <div class="mb-5">
                                <a href="coaches.php" class="btn btn-primary">MORE DETAILS
                                   
                                    <?php
                                    $sql = mysqli_query($con, "select * from seasons");
                                    $result = mysqli_fetch_array($sql);

                                    ?>
                                </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card user-card">
                            <div class="card-body text-center">
                                
                                <div class="card-title mb-4">
                                    <strong class="text-uppercase">Referees</strong>


                                </div>
                                <div class="mb-5">
                                <a href="referees.php" class="btn btn-primary">MORE DETAILS
                                    
                                    <?php
                                    $sql = mysqli_query($con, "select * from seasons");
                                    $result = mysqli_fetch_array($sql);

                                    ?>
                                </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card user-card">
                            <div class="card-body text-center">
                                
                                <div class="card-title mb-4">
                                    <strong class="text-uppercase">Positions</strong>


                                </div>
                                <div class="mb-5">
                                <a href="positions.php" class="btn btn-primary">MORE DETAILS
                                    
                                    <?php
                                    $sql = mysqli_query($con, "select * from seasons");
                                    $result = mysqli_fetch_array($sql);

                                    ?>
                                </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card user-card">
                            <div class="card-body text-center">
                                
                                <div class="card-title mb-4">
                                    <strong class="text-uppercase">Stadiums</strong>


                                </div>
                                <div class="mb-5">
                                <a href="stadiums.php" class="btn btn-primary">MORE DETAILS
                                    
                                    <?php
                                    $sql = mysqli_query($con, "select * from seasons");
                                    $result = mysqli_fetch_array($sql);

                                    ?>
                                </a>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 col-xl-3">
                        <div class="card user-card">
                            <div class="card-body text-center">
                                
                                <div class="card-title mb-4">
                                    <strong class="text-uppercase">Cards</strong>


                                </div>
                                <div class="mb-5">
                                <a href="cards.php" class="btn btn-primary">MORE DETAILS
                                    
                                    <?php
                                    $sql = mysqli_query($con, "select * from seasons");
                                    $result = mysqli_fetch_array($sql);

                                    ?>
                                </a>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 col-xl-3">
                        <div class="card user-card">
                            <div class="card-body text-center">
                                
                                <div class="card-title mb-4">
                                    <strong class="text-uppercase">Awards</strong>


                                </div>
                                <div class="mb-5">
                                <a href="awards.php" class="btn btn-primary">MORE DETAILS
                                    
                                    <?php
                                    $sql = mysqli_query($con, "select * from seasons");
                                    $result = mysqli_fetch_array($sql);

                                    ?>
                                </a>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 col-xl-3">
                        <div class="card user-card">
                            <div class="card-body text-center">
                                
                                <div class="card-title mb-4">
                                    <strong class="text-uppercase">Formations</strong>


                                </div>
                                <div class="mb-5">
                                <a href="formations.php" class="btn btn-primary">MORE DETAILS
                                    
                                    <?php
                                    $sql = mysqli_query($con, "select * from seasons");
                                    $result = mysqli_fetch_array($sql);

                                    ?>
                                </a>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 col-xl-3">
                        <div class="card user-card">
                            <div class="card-body text-center">
                               
                                <div class="card-title mb-4">
                                    <strong class="text-uppercase">Weather Day</strong>


                                </div>

                                <div class="mb-5">
                                <a href="weather_day.php" class="btn btn-primary">MORE DETAILS
                                  
                                    <?php
                                    $sql = mysqli_query($con, "select * from seasons");
                                    $result = mysqli_fetch_array($sql);

                                    ?>
                                </a>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body text-center">

                                <div class="card-title mb-4">
                                    <strong class="text-uppercase">Stadiums</strong>
                                </div>
                                <div class="mb-5">
                                    <a href="stadiums.php" class="btn btn-primary">MORE DETAILS

                                        <?php
                                        $sql = mysqli_query($con, "select * from seasons");
                                        $result = mysqli_fetch_array($sql);

                                        ?>

                                    </a>
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