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
                        <h4 class="mb-sm-0">MATCHES</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">DDIBASTATS</a></li>
                                <li class="breadcrumb-item active">Matches</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Match List</h4>
                        </div>

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="table-responsive">
                                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                        <thead>
                                            <th>#</th>
                                            <th>Matchday</th>
                                            <th>Season</th>
                                            <th>Matches</th>
                                            <th>Score</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th></th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 0;
                                            $sql = mysqli_query($con, "select * from matchday");
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                $matchday_id = $row['id'];
                                                $count++

                                            ?>
                                                <tr>
                                                    <td><?= $count; ?></td>
                                                    <td><?= $row['name']; ?></td>
                                                    <td><b><?php
                                                     $league_id = $row['league']; 
                                                     $leagues = mysqli_query($con, "select * from leagues where id = '$league_id'");
                                                     foreach ($leagues as $league):
                                                        echo $league['name'];
                                                     endforeach;
                                                     
                                                     
                                                     ?></b><br><?= $row['season']; ?></td>
                                                    <td>

                                                        <table class="table table-striped table-bordered">
                                                            <?php

                                                            $sql1 = mysqli_query($con, "select * from matches where matchday_id=$matchday_id");
                                                            while ($row1 = mysqli_fetch_array($sql1)) {

                                                                $homeID = $row1['home_team'];
                                                                $team1 = mysqli_query($con, " Select * from registered_teams where id = $homeID");
                                                                foreach ($team1 as $home) :
                                                                    $home_team = $home['tname'];

                                                                endforeach;

                                                                $awayID = $row1['away_team'];
                                                                $team2 = mysqli_query($con, " Select * from registered_teams where id = $awayID");
                                                                foreach ($team2 as $away) :
                                                                    $away_team = $away['tname'];

                                                                endforeach;


                                                                $match = $home_team . "      Vs        " . $away_team;
                                                            ?>
                                                                <tr>
                                                                    <td><?= $match; ?></td>
                                                                </tr>
                                                            <?php
                                                            } ?>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table class="table table-striped table-bordered">
                                                            <?php

                                                            $sql1 = mysqli_query($con, "select * from matches where matchday_id=$matchday_id");
                                                            while ($row1 = mysqli_fetch_array($sql1)) {
                                                                $score = $row1['home_score'] . "      :        " . $row1['away_score'];
                                                            ?>
                                                                <tr>
                                                                    <td><?= $score; ?></td>
                                                                </tr>
                                                            <?php
                                                            } ?>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table class="table table-striped table-bordered">
                                                            <?php

                                                            $sql1 = mysqli_query($con, "select * from matches where matchday_id=$matchday_id");
                                                            while ($row1 = mysqli_fetch_array($sql1)) {

                                                            ?>
                                                                <tr>
                                                                    <td><?= $row1['date']; ?></td>
                                                                </tr>
                                                            <?php
                                                            } ?>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table class="table table-striped table-bordered">
                                                            <?php

                                                            $sql1 = mysqli_query($con, "select * from matches where matchday_id=$matchday_id");
                                                            while ($row1 = mysqli_fetch_array($sql1)) {

                                                            ?>
                                                                <tr>
                                                                    <td><?= $row1['time']; ?></td>
                                                                </tr>
                                                            <?php
                                                            } ?>
                                                        </table>
                                                    </td>
                                                    <td>



                                                        <?php

                                                        $sql1 = mysqli_query($con, "select * from matches where matchday_id=$matchday_id");
                                                        while ($row1 = mysqli_fetch_array($sql1)) {
                                                            $status = $row1['status'];
                                                        ?>
                                                            <?php

                                                            if ($status == 0) {
                                                                echo "<p class='alert alert-primary' role='alert'>
                                                                            Fixture
                                                                            </p";
                                                            } elseif ($status == 1) {
                                                                echo "<p class='alert alert-success' role='alert'>
                                                                            Played
                                                                            </p>";
                                                            } elseif ($status == 2) {
                                                                echo "Live";
                                                            }

                                                            ?>
                                                        <?php
                                                        } ?>

                                                    </td>
                                                    <td>
                                                        <table class="table table-striped table-bordered">
                                                            <?php

                                                            $sql1 = mysqli_query($con, "select * from matches where matchday_id=$matchday_id");
                                                            while ($row1 = mysqli_fetch_array($sql1)) {

                                                            ?>
                                                                <tr>
                                                                    <td>
                                                                        <a href="edit_match.php?id=<?= $row1['id'] ?>" class="btn btn-warning"><i class="las la-edit "></i></a>


                                                                        <a href="delete_match.php?id=<?= $row1['id'] ?>" class="btn btn-danger"><i class="las la-trash "></i></a>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            } ?>

                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table class="table table-striped table-bordered">
                                                            <tr>
                                                                <td>
                                                                    <a href="add_match.php?id=<?= $row['league']; ?>" class="btn btn-success"><i class="las la-plus"></i></a>
                                                                </td>
                                                            </tr>
                                                        </table>
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