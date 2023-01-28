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
$tournament = $league . "  " . $season;

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
                            <h4><b><?= $tournament; ?></b></h4>
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


                            <table id="button-datatables" class="table">
                                <thead style="text-transform: uppercase; background: grey; color: white;" >
                                    <th>#</th>
                                    <th>Team</th>

                                    <!-- <th>ph</th> -->
                                    <!-- <th>pa</th> -->
                                    <!-- <th>home goals</th>
                                    <th>away goals</th> -->
                                    <th>p</th>
                                    <!-- <th>hw</th>
                                    <th>aw</th> -->
                                    <th>w</th>
                                    <!-- <th>hd</th>
                                    <th>ad</th> -->
                                    <th>d</th>
                                    <!-- <th>hl</th>
                                    <th>al</th> -->
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


                                    
                                    $count = 0;

                                    // $sql4 = mysqli_query($con, $sql3);
                                    $reg_teams = mysqli_query($con, "select * from registered_teams where season = '$seasonId'");
                                    foreach ($reg_teams as $res) {
                                        $team = $res['id'];
                                        $count++

                                    ?>



                                        <tr>
                                            <td><?= $count; ?>.</td>
                                            <td style="width: 500px;">
                                            
                                            <?= $res['tname']; ?></td>

                                            <?php

                                            $sql1 = mysqli_query($con, "select * from matches where home_team = '$team' and status = '1' and league = '$league' and season ='$season' ");
                                            while ($row1 = mysqli_fetch_array($sql1)) {
                                                $score = $row1['home_team'] . "     Vs       " . $row1['away_team'];
                                            ?>
                                                
                                            <?php
                                            } ?>


                                            <?php

                                            $sql2 = mysqli_query($con, "select * from matches where away_team = '$team' and status = '1' and league = '$league' and season ='$season'");

                                            while ($row1 = mysqli_fetch_array($sql2)) {
                                                $score = $row1['home_team'] . "     Vs       " . $row1['away_team'];
                                            ?>
                                                
                                            <?php
                                            } ?>



                                            <td><?php
                                                $sql1 = mysqli_query($con, "select * from matches where home_team = '$team' and status = '1' and league = '$league' and season ='$season' ");

                                                $ph = mysqli_num_rows($sql1);

                                                $sql2 = mysqli_query($con, "select * from matches where away_team = '$team' and status = '1' and league = '$league' and season ='$season'");

                                                $pa = mysqli_num_rows($sql2);

                                                $p = $ph + $pa;


                                                echo $p;
                                                ?></td>
                                            </td>


                                            <?php

                                            $sql1 = mysqli_query($con, "select * from matches where home_team = '$team' and status = '1' and league = '$league' and season ='$season'");
                                            $hw = 0;
                                            while ($row1 = mysqli_fetch_array($sql1)) {
                                                $home_score = $row1['home_score'];
                                                $away_score = $row1['away_score'];
                                                if ($home_score > $away_score) {
                                                    # code...
                                                    $hw = $hw + 1;
                                                } 
                                                // else {
                                                //     $hw = 0;
                                                // }

                                                // echo $hw;
                                            }

                                            ?>



                                            <?php

                                            $sql1 = mysqli_query($con, "select * from matches where away_team = '$team' and status = '1' and league = '$league' and season ='$season'");
                                            $aw = 0;
                                            while ($row1 = mysqli_fetch_array($sql1)) {
                                                $home_score = $row1['home_score'];
                                                $away_score = $row1['away_score'];


                                                if ($away_score > $home_score) {
                                                    # code...
                                                    $aw++;
                                                } 
                                                // else {
                                                //     $aw = 0;
                                                // }
                                                // echo $aw;
                                            }
                                            ?>


                                            <td><?php

                                                $w = $hw + $aw;
                                                echo $w;
                                                ?>
                                            </td>

                                            <?php

                                            $sql1 = mysqli_query($con, "select * from matches where home_team = '$team' and status = '1' and league = '$league' and season ='$season'");
                                            $hd = 0;
                                            while ($row1 = mysqli_fetch_array($sql1)) {
                                                $home_score = $row1['home_score'];
                                                $away_score = $row1['away_score'];



                                                if ($home_score == $away_score) {
                                                    # code...
                                                    $hd++;
                                                }
                                            }
                                            ?>

                                            <?php

                                            $sql2 = mysqli_query($con, "select * from matches where away_team = '$team' and status = '1' and league = '$league' and season ='$season'");
                                            $ad = 0;
                                            while ($row1 = mysqli_fetch_array($sql2)) {
                                                $home_score = $row1['home_score'];
                                                $away_score = $row1['away_score'];



                                                if ($away_score == $home_score) {
                                                    # code...
                                                    $ad++;
                                                }
                                            }
                                            ?>


                                            <td><?php

                                                $d = $hd + $ad;
                                                echo $d;
                                                ?>
                                            </td>

                                            <?php

                                            $sql1 = mysqli_query($con, "select * from matches where home_team = '$team' and status = '1' and league = '$league' and season ='$season'");
                                            $hl = 0;
                                            while ($row1 = mysqli_fetch_array($sql1)) {
                                                $home_score = $row1['home_score'];
                                                $away_score = $row1['away_score'];


                                                if ($home_score < $away_score) {
                                                    # code...
                                                    $hl++;
                                                }
                                            }
                                            ?>

                                            <?php

                                            $sql2 = mysqli_query($con, "select * from matches where away_team = '$team' and status = '1' and league = '$league' and season ='$season'");
                                            $al = 0;
                                            while ($row1 = mysqli_fetch_array($sql2)) {
                                                $home_score = $row1['home_score'];
                                                $away_score = $row1['away_score'];


                                                if ($away_score < $home_score) {
                                                    # code...
                                                    $al++;
                                                }
                                            }
                                            ?>

                                            <td><?php

                                                $l = $hl + $al;
                                                echo $l;
                                                ?>
                                            </td>

                                            <?php

                                            $sql1 = mysqli_query($con, "select * from matches where home_team = '$team' and status = '1' and league = '$league' and season ='$season'");
                                            $home_score = 0;
                                            while ($row1 = mysqli_fetch_array($sql1)) {
                                                $home_score = $home_score + $row1['home_score'];
                                                // $away_score = $row1['away_score'];
                                            }
                                            ?>

                                            <td><?php


                                                echo $home_score;
                                                ?>
                                            </td>

                                            <?php

                                            $sql2 = mysqli_query($con, "select * from matches where away_team = '$team' and status = '1' and league = '$league' and season ='$season'");
                                            $away_score = 0;
                                            while ($row1 = mysqli_fetch_array($sql2)) {
                                                $away_score = $away_score + $row1['away_score'];
                                                // $away_score = $row1['away_score'];
                                            }
                                            ?>

                                            <td><?php


                                                echo $away_score;
                                                ?>
                                            </td>

                                            <?php

                                            $sql1 = mysqli_query($con, "select SUM(home_score) AS sum, SUM(away_score) AS sumaway from matches where home_team = '$team' and status = '1' and league = '$league' and season ='$season'");
                                            $gd = 0;
                                            while ($row1 = mysqli_fetch_array($sql1)) {
                                                $home_goals=$row1['sum'];
                                                $away_goals=$row1['sumaway'];
                                                // $gd = $home_goals - $away_goals;
                                                // $away_score = $row1['away_score'];
                                            }
                                            ?>

                                            <?php

                                            $sql2 = mysqli_query($con, "select SUM(home_score) AS sum, SUM(away_score) AS sumaway from matches where away_team = '$team' and status = '1' and league = '$league' and season ='$season'");

                                            while ($row2 = mysqli_fetch_array($sql2)) {
                                                $home_goal=$row2['sum'];
                                                $away_goal=$row2['sumaway'];
                                                // $gd = $away_goal - $home_goal;
                                                // $away_score = $row1['away_score'];
                                            }
                                            ?>

                                            <td><?php


                                                // echo $home_goals;
                                                $gd = $home_goals - $away_goals + $away_goal - $home_goal;
                                                echo $gd;
                                                ?>
                                            </td>

                                            <td>
                                                <?php

$pts = $w*3 + $d*1 + $l*0;
echo $pts;

                                                ?>
                                            </td>
                                            <!-- <td><?= $res['P']; ?></td>
                                            <td><?= $res['W']; ?></td>
                                            <td><?= $res['D']; ?></td>
                                            <td><?= $res['L']; ?></td>
                                            <td><?= $res['F']; ?></td>
                                            <td><?= $res['A']; ?></td>
                                            <td><?= $res['GD']; ?></td>
                                            <td><?= $res['Pts']; ?></td> -->
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