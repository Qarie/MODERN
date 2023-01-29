<?php

include "config.php";

if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("Location: ../index.php");
    exit;
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
                        <h4 class="mb-sm-0">LEAGUE TABLES</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">DDIBASTATS</a></li>
                                <li class="breadcrumb-item active">League Tables</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-11 m-auto">
                <div class="row">
                    <?php
                    $sql = mysqli_query($con, "select * from seasons");
                    while ($result = mysqli_fetch_array($sql)) {

                    ?>
                        <div class="col-md-6 col-xl-3">
                            <div class="card user-card">
                                <div class="card-body text-center">

                                    <div class="card-title mb-1">
                                        <strong><?php
                                        $league_id = $result['tournament'];
                                        $leagues = mysqli_query($con, "select * from leagues where id = '$league_id'");
                                        foreach ($leagues as $league) :
                                            echo $league['name'];
                                        endforeach;
                                        
                                        ?></strong>
                                        <div class="mb-3"><img src="../stickers/world-cup.png" alt="image" class="avatar avatar-lg avatar-rounded rounded"></div>
                                        <?= $result['season']; ?>

                                    </div>





                                    <div>
                                        <a href="view.php?id=<?= $result['id']; ?>" class="btn btn-warning">VIEW</a>





                                    </div>









                                </div>
                            </div>
                        </div>
                    <?php
                    } ?>
                </div>
            </div>

        </div>
    </div>


</div>
<?php include "../includes/footer.php"; ?>
</body>

</html>