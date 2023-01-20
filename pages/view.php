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
                    <div class="card">
                        <div class="card-header">
                            leaggue table
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead style="text-transform: uppercase; background: grey; color: white;">
                                    <th>#</th>
                                    <th style="width: 500px;">Team</th>
                                    <th>p</th>
                                    <th>w</th>
                                    <th>d</th>
                                    <th>l</th>
                                    <th>gf</th>
                                    <th>ga</th>
                                    <th>gd</th>
                                    <th>pts</th>
                                </thead>

                                <?php
                                $seasonId = $_GET['id'];
                                $query = mysqli_query($con, "SELECT * FROM seasons where id = $seasonId ");
                                $row = mysqli_fetch_array($query);


                                $status = '1';
                                $league = $row['tournament'];
                                $season = $row['season'];
                                $sql1 = mysqli_query($con, "select * from matches where league = '$league' and season ='$season' and status ='1'");


                                $standings = array();
                                $standingTemplate = array('matches' => 0, 'wins' => 0, 'draws' => 0, 'losses' => 0, 'goalsfor' => 0, 'goalsagainst' => 0, 'goalsdiff' => 0, 'points' => 0);



                                function handleMatch($team, $goalsfor, $goalsagainst)
                                {
                                    global $standings, $standingTemplate;

                                    if ($goalsfor > $goalsagainst) {
                                        $points = 3;
                                        $win = 1;
                                        $draw = 0;
                                        $loss = 0;
                                    } elseif ($goalsfor == $goalsagainst) {
                                        $points = 1;
                                        $win = 0;
                                        $draw = 1;
                                        $loss = 0;
                                    } else {
                                        $points = 0;
                                        $win = 0;
                                        $draw = 0;
                                        $loss = 1;
                                    }

                                    if (empty($standings[$team])) {
                                        $standing = $standingTemplate;
                                    } else {
                                        $standing = $standings[$team];
                                    }

                                    $standing['matches']++;
                                    $standing['wins'] += $win;
                                    $standing['draws'] += $draw;
                                    $standing['losses'] += $loss;
                                    $standing['goalsfor'] += $goalsfor;
                                    $standing['goalsagainst'] += $goalsagainst;
                                    $standing['goalsdiff'] += $goalsfor - $goalsagainst;
                                    $standing['points'] += $points;

                                    $standings[$team] = $standing;
                                }

                                // function comparePoints($a, $b)
                                // {
                                //     if ($a['points'] == $b['points']) {
                                //         if ($a['goalsdiff'] == $b['goalsdiff']) return 0;
                                //         return ($a['goalsdiff'] < $b['goalsdiff']) ? 1 : -1;
                                //     }
                                //     return ($a['points'] < $b['points']) ? 1 : -1;
                                // }

                                while ($row1 = mysqli_fetch_array($sql1)) {
                                    handleMatch($row1['home_team'], $row1['home_pts'], $row1['away_pts']);
                                    handleMatch($row1['away_team'], $row1['away_pts'], $row1['home_pts']);

                                    print_r(($standings));  // up to you to format the output as you like




                                ?>


                                    <tbody>
                                        <td>#</td>
                                        <td>team</td>
                                        <td>p</td>
                                        <td><?php  ?></td>
                                        <td><?php echo $standingTemplate['draws']; ?></td>
                                        <td><?php echo $standingTemplate['losses']; ?></td>
                                        <td>gf</td>
                                        <td>ga</td>
                                        <td>gd</td>
                                        <td>pts</td>
                                    </tbody>
                                <?php
                                } ?>
                            </table>




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