<?php
include 'config.php';

if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("Location: ../index.php");
    exit;
}

$id = $_GET['id'];
$sql1 = mysqli_query($con, "select name, season, league from matchday where id=$id");
$row1 = mysqli_fetch_array($sql1);


if (isset($_POST['submit'])) {
    $matchday = $row1['name'];
    $season = $row1['season'];
    $league = $row1['league'];
    $home_team           = $_POST['home_team'];
    $home_pts       = $_POST['home_pts'];
    $away_pts          = $_POST['away_pts'];
    $away_team          = $_POST['away_team'];
    $status  = $_POST['status'];
    $date  = $_POST['date'];
    $time  = $_POST['time'];
    $added_by       = $_SESSION['id'];

    $sql = "INSERT INTO matches (matchday_id, league,matchday, season, home_team, home_pts,away_pts, away_team, status, date, time, added_by) VALUES('$id', '$league', '$matchday', '$season', '$home_team', '$home_pts','$away_pts', '$away_team', '$status', '$date', '$time', '$added_by' )";
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
                <div class="col-md-12 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Match<a href="matches.php" class="btn btn-primary" style="float: right;">All</a> </h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">

                                <div class="mb-3" id="dynamic_field">
                                    <div class="row" id="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="hometeam" style="text-align: center;">Hometeam</label>
                                                <select class="form-control" name="home_team" id="" required>
                                                    <option>-- Select --</option>
                                                    <?php
                                                    $hometeam = mysqli_query($con, 'select name from teams');
                                                    while ($resulty = mysqli_fetch_array($hometeam)) { ?>
                                                        <option><?= $resulty['name']; ?></option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <label for="score" style="text-align: center;">Score</label>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <input type="text" name="home_pts" id="" class="form-control">

                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <input type="text" name="away_pts" id="" class="form-control">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="awayteam" style="text-align: center;">Awayteam</label>
                                                <select class="form-control" name="away_team" id="" required>
                                                    <option>-- Select --</option>
                                                    <?php
                                                    $awayteam = mysqli_query($con, 'select name from teams');
                                                    while ($resulty = mysqli_fetch_array($awayteam)) { ?>
                                                        <option><?= $resulty['name']; ?></option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="Status" style="text-align: center;">Status</label>
                                                <select class="form-control" name="status" id="" required>
                                                    <option value="fixture">fixture</option>
                                                    <option value="played">played</option>
                                                    <option value="live">live</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="date">Date</label>
                                                <input type="date" name="date" id="" class="form-control" placeholder="YY-MM-DD" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="time">Time</label>
                                                <input type="time" name="time" id="" required class="form-control">
                                            </div>
                                        </div>
                                        <!-- <div class="col">
                                                
                                                <div class="mb-3">
                                                    <a id='add' class="btn btn-primary"><i class="las la-plus"></i></a>
                                                </div>
                                            </div> -->
                                    </div>

                                </div>

                                <div class="mb-3">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var i = 1;
            $('#add').click(function() {
                i++;
                $('#dynamic_field').append('<div class="row" id="row' + i + '"><div class="col"><div class="mb-3"><label for="hometeam" style="text-align: center;">Hometeam</label><select class="form-control" name="hometeam" id=""><option>-- Select --</option><?php $hometeam = mysqli_query($con, 'select name from teams');
                                                                                                                                                                                                                                                                    while ($resulty = mysqli_fetch_array($hometeam)) { ?><option><?= $resulty['name']; ?></option><?php } ?></select></div></div><div class="col"><div class="row"><label for="score" style="text-align: center;">Score</label><div class="col"><div class="mb-3"><input type="text" name="home" id="" class="form-control"></div></div><div class="col"><div class="mb-3"><input type="text" name="away" id="" class="form-control"></div></div></div></div><div class="col"><div class="mb-3"><label for="awayteam" style="text-align: center;">Awayteam</label><select class="form-control" name="awayteam" id=""><option>-- Select --</option><?php $awayteam = mysqli_query($con, 'select name from teams');
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    while ($resulty = mysqli_fetch_array($awayteam)) { ?><option><?= $resulty['name']; ?></option><?php } ?></select></div></div><div class="col"><div class="mb-3"><label for="Status" style="text-align: center;">Status</label><select class="form-control" name="status" id=""><option value="fixture">fixture</option><option value="played">played</option><option value="live">live</option></select></div></div><div class="col"><div class="mb-3"><label for="date">Date</label><input type="date" name="date" id="" class="form-control" placeholder="YY-MM-DD"></div></div><div class="col"><div class="mb-3"><label for="time">Time</label><input type="time" name="time" id="" class="form-control"></div></div><div class="col"><div class="mb-3"><a  class="btn btn-danger btn_remove" id="' + i + '" ><i class="las la-trash"></i></a></div></div></div>');
            });

            $(document).on('click', '.btn_remove', function() {

                var button_id = $(this).attr("id");

                $('#row' + button_id + '').remove();
            });

        });
    </script> -->
</body>

</html>