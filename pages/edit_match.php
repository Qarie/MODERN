<?php
include 'config.php';

if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("Location: ../index.php");
    exit;
}

$id = $_GET['id'];


if (isset($_POST['submit'])) {
    $home_team           = $_POST['home_team'];
    $home_score       = $_POST['home_score'];
    $away_score          = $_POST['away_score'];
    $away_team          = $_POST['away_team'];
    $status  = $_POST['status'];
    $date  = $_POST['date'];
    $time  = $_POST['time'];
    $added_by       = $_SESSION['id'];

    $sql = "UPDATE matches SET  home_score='$home_score', away_score='$away_score', status='$status', added_by='$added_by' where id=$id";
    $query = mysqli_query($con, $sql);
    if ($query) {
        header("location:matches.php");
    }
    mysqli_close($con);
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
                <div class="col-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Match<a href="matches.php" class="btn btn-primary" style="float: right;">All</a> </h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">

                                        <div class="row">
                                            <div class="col mb-3">
                                                <?php
                                                $id = $_GET['id'];
                                                $sql1 = mysqli_query($con, "select * from matches where id=$id");
                                                $row1 = mysqli_fetch_array($sql1);

                                                ?>
                                                <label for="hometeam" style="text-align: center;">Hometeam</label>
                                                <select class="form-control" name="home_team" id="" required>
                                                    <option selected value="<?= $row1['home_team']; ?>" disabled> <?php

                                                            $sql1 = mysqli_query($con, "select * from matches where id=$id");
                                                            while ($row4 = mysqli_fetch_array($sql1)) {

                                                                $homeID = $row4['home_team'];
                                                                $team1 = mysqli_query($con, " Select * from registered_teams where id = $homeID");
                                                                foreach ($team1 as $home) :
                                                                    $home_team = $home['tname'];
                                                                    echo $home_team;

                                                                endforeach;
                                                            }

                                                                


                                                                
                                                            ?></option>
                                                    
                                                </select>
                                            </div>
                                            <div class="col">
                                            <div class="mb-3">
                                                <label for="awayteam" style="text-align: center;">Awayteam</label>
                                                <select class="form-control" name="away_team" id="" required>
                                                    <option selected value="<?= $row1['away_team']; ?>" disabled>
                                                        <?php

                                                            $sql1 = mysqli_query($con, "select * from matches where id=$id");
                                                            while ($row4 = mysqli_fetch_array($sql1)) {

                                                                $homeID = $row4['away_team'];
                                                                $team1 = mysqli_query($con, " Select * from registered_teams where id = $homeID");
                                                                foreach ($team1 as $away) :
                                                                    $away_team = $away['tname'];
                                                                    echo $away_team;

                                                                endforeach;
                                                            }

                                                            ?>
                                                    </option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="score" style="text-align: center;">Home Score</label>
                                                        <input type="text" name="home_score"  class="form-control">

                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="score" style="text-align: center;">Away Score</label>
                                                        <input type="text" name="away_score"  class="form-control">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="Status" style="text-align: center;">Status</label>
                                                <select class="form-control form-select" name="status" id="" required>
                                                    <option selected value="<?= $row1['status']; ?>">
                                                    <?php
                                                        $status=$row1['status'];

                                                        if ($status == 0) {
                                                            echo "<p>
                                                                        Fixture
                                                                        </p";
                                                        } else {
                                                            echo "<p>
                                                                        Played
                                                                        </p>";
                                                        } 

                                                        ?>
                                                    </option>
                                                    <option value="0">fixture</option>
                                                    <option value="1">played</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="date">Date</label>
                                                <input type="date" name="date" value="<?= $row1['date']; ?>" class="form-control" placeholder="YY-MM-DD" required disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="time">Time</label>
                                                <input type="time" name="time" value="<?= $row1['time']; ?>" required class="form-control" disabled>
                                            </div>
                                        </div>

                               

                                <div class="mb-3">
                                    <button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include '../includes/footer.php' ?>
</body>

</html>