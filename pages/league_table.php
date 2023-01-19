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
                                        <strong><?= $result['tournament']; ?><br>TABLE</strong>
                                        <div class="mb-3"><img src="../stickers/world-cup.png" alt="image" class="avatar avatar-lg avatar-rounded rounded"></div>
                                        <?= $result['season']; ?>

                                    </div>

                                    <table class="table mb-0">

                                        <tr>



                                            <td>
                                                <a data-bs-toggle="modal" data-bs-target="#modalId<?= $result['id']; ?>" class="btn btn-warning"><i class="las la-eye"></i></a>




                                                <!-- Modal Body -->
                                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                                <div class="modal fade" id="modalId<?= $result['id']; ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <?php
                                                            $seasonId = $result['id'];
                                                            $query = mysqli_query($con, "SELECT * FROM seasons where id = $seasonId ");
                                                            $row = mysqli_fetch_array($query);

                                                            ?>
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalTitleId"><?= $row['tournament']; ?></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table">
                                                                    <thead style="text-transform: uppercase; background: grey; color: white;">
                                                                        <th>#</th>
                                                                        <th>Team</th>
                                                                        <th>p</th>
                                                                        <th>w</th>
                                                                        <th>d</th>
                                                                        <th>l</th>
                                                                        <th>gf</th>
                                                                        <th>ga</th>
                                                                        <th>gd</th>
                                                                        <th>pts</th>




                                                                    </thead>
                                                                    <tbody style="text-transform: uppercase; font-size:11px;">
                                                                        <?php
                                                                        $status = '1';
                                                                        $league = $row['tournament'];
                                                                        $season = $row['season'];
                                                                        $sql1 = mysqli_query($con, "select * from matches where league = '$league' and season ='$season' ");
                                                                        $result = mysqli_fetch_array($sql1);
                                                                        // $played = $result['status'];
                                                                        $home_score = $result['home_pts'];
                                                                        $away_score = $result['away_pts'];
                                                                        $win = 0;
                                                                        $draw = 0;
                                                                        $lose = 0;

                                                                        $w = 3;
                                                                        $d = 1;
                                                                        $l = 0;


                                                                        // $data = array();
                                                                        // $data = $row['teams'];
                                                                        // $sp_data = explode(",", $data);
                                                                        // $count = 0;


                                                                        $pts = ($w * $win) + ($d * $draw) + ($l * $lose);
                                                                        $count = 0;

                                                                        $teams = mysqli_query($con, "select * from registered_teams where season = $seasonId");
                                                                        foreach ($teams as $team) {
                                                                            $count++;;
                                                                        ?>

                                                                            <tr>
                                                                                <td><?= $count; ?></td>
                                                                                <td><?= $team['team']; ?></td>
                                                                                <td>
                                                                                    <?php
                                                                                    $id = $team['id'];

                                                                                    $results = mysqli_query($con, "select * from matches where league = '$league' and season ='$season' and home_team = 'ARUA HILL SC' ");
                                                                                    foreach ($results as $result) {
                                                                                        $played = $result['status'];
                                                                                    ?>
<?php echo $played;?>
                                                                                    <?php
                                                                                    } ?>
                                                                                </td>
                                                                                <td><?= $win; ?></td>
                                                                                <td><?= $draw; ?></td>
                                                                                <td><?= $lose; ?></td>
                                                                                <td><? ?></td>
                                                                                <td><? ?></td>
                                                                                <td><? ?></td>
                                                                                <td><?= $pts; ?></td>
                                                                            </tr>


                                                                        <?php
                                                                        } ?>


                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                            </td>





                                        </tr>

                                    </table>

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