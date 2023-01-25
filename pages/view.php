<?php

include "config.php";

if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("Location: ../index.php");
    exit;
}

$seasonId = $_GET['id'];
$query = mysqli_query($con, "SELECT * FROM seasons where id = $seasonId ");
$row = mysqli_fetch_array($query);
$league = $row['tournament'];
$season = $row['season'];
$tournament = $league."  ".$season;

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
                            <?= $tournament;?>
                        </div>
                        <div class="card-body">


                            <?php
                            // $seasonId = $_GET['id'];
                            // $query = mysqli_query($con, "SELECT * FROM seasons where id = $seasonId ");
                            // $row = mysqli_fetch_array($query);


                            // $status = '1';
                            // $league = $row['tournament'];
                            // $season = $row['season'];
                            // $sql1 = mysqli_query($con, "select * from matches where league = '$league' and season ='$season' and status ='1'");

                            // $sql1 = mysqli_query($con, "select * from registered_teams");
                            // $sql2 = mysqli_query($con, "select * from matches");
                            ?>


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
                                <tbody style="text-transform: uppercase;">

                                    <?php

                                    $seasonId = $_GET['id'];
                                    $query = mysqli_query($con, "SELECT * FROM seasons where id = $seasonId ");
                                    $row = mysqli_fetch_array($query);


                                    $status = '1';
                                    $league = $row['tournament'];
                                    $season = $row['season'];


                                    $sql3 = "SELECT
                                     tname AS Team, Sum(P) AS P,Sum(W) AS W,Sum(D) AS D,Sum(L) AS L,
                                     SUM(F) as F,SUM(A) AS A,SUM(GD) AS GD,SUM(Pts) AS Pts
                                     FROM(
                                     SELECT
                                       home_team Team,
                                       1 P,
                                       IF(home_score > away_score,1,0) W,
                                       IF(home_score = away_score,1,0) D,
                                       IF(home_score < away_score,1,0) L,
                                       home_score F,
                                       away_score A,
                                       home_score-away_score GD,
                                       CASE WHEN home_score > away_score THEN 3 WHEN home_score = away_score THEN 1 ELSE 0 END PTS
                                     FROM matches where status = '1' and league = '$league' and season ='$season'
                                     UNION ALL
                                     SELECT
                                       away_team,
                                       1,
                                       IF(home_score < away_score,1,0),
                                       IF(home_score = away_score,1,0),
                                       IF(home_score > away_score,1,0),
                                       away_score,
                                       home_score,
                                       away_score-home_score GD,
                                       CASE WHEN home_score < away_score THEN 3 WHEN home_score = away_score THEN 1 ELSE 0 END
                                     FROM matches where status = '1' and league = '$league' and season ='$season'
                                     ) as tot
                                     JOIN registered_teams t ON tot.Team=t.id
                                     GROUP BY Team
                                     ORDER BY SUM(Pts) DESC ";

                                    $count = 0;

                                    $sql4 = mysqli_query($con, $sql3);
                                    foreach ($sql4 as $res) {
                                        $count++

                                    ?>



                                        <tr>
                                            <td><?= $count; ?></td>
                                            <td style="width: 600px;"><?= $res['Team']; ?></td>
                                            <td><?= $res['P']; ?></td>
                                            <td><?= $res['W']; ?></td>
                                            <td><?= $res['D']; ?></td>
                                            <td><?= $res['L']; ?></td>
                                            <td><?= $res['F']; ?></td>
                                            <td><?= $res['A']; ?></td>
                                            <td><?= $res['GD']; ?></td>
                                            <td><?= $res['Pts']; ?></td>
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
<?php include "../includes/footer.php"; ?>
</body>

</html>