<?php

include 'config.php';

if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['submit'])) {
    $tournament    = $_POST['tournament'];
    $season        = $_POST['season'];
    $win           = $_POST['win'];
    $draw          = $_POST['draw'];
    $lose          = $_POST['lose'];
    $teams         = $_POST['teams'];
    $players       = $_POST['players'];
    $rules         = $_POST['rules'];
    $added_by      = $_SESSION['id'];

    $sql = "INSERT INTO seasons(tournament, season, win, draw, lose, teams, players, rules, added_by) VALUES('$tournament','$season','$win','$draw','$lose','$teams','$players','$rules', '$added_by')";
    $query = mysqli_query($con, $sql);
    if ($query) {
        # code...
        header("location:season.php");
    }

    # code...
    mysqli_close($con);
}


?>
<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>
<link rel="stylesheet" href="../assets/css/virtual-select.min.css">
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
                        <h4 class="mb-sm-0">SEASONS</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">DDIBASTATS</a></li>
                                <li class="breadcrumb-item active">Seasons</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Seasons <a href="season.php" class="btn btn-primary" style="float: right;">ALL</a></h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="row">

                                    <div class="mb-3">
                                        <label for="tournament">Tournament</label>
                                        <select id="tournament" class="form-control" name="tournament" required>
                                            <option>-- Select Tournament --</option>
                                            <?php
                                            $leagues = mysqli_query($con, "SELECT name FROM leagues");
                                            while ($all = mysqli_fetch_array($leagues)) {
                                            ?>
                                                <option><?= $all['name']; ?></option>
                                            <?php
                                            } ?>
                                        </select>

                                    </div>

                                    <div class="mb-3">
                                        <label for="season">Season Name</label>
                                        <input type="text" name="season" id="" class="form-control" placeholder="Enter Season Name" required>

                                    </div>

                                    <div class="row ">
                                        <h5>Set Points</h5>
                                        <div class="col-sm">
                                            <div class="mb-3">
                                                <label style="text-align: center;" for="win">Win</label>
                                                <input type="number" name="win" id="" class="form-control" required>
                                                <small id="helpId" class="text-muted">Home/Away</small>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="mb-3">
                                                <label for="Draw" style="text-align: center;">Draw</label>
                                                <input type="number" name="draw" id="" class="form-control" required>
                                                <small id="helpId" class="text-muted">Home/Away</small>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="mb-3">
                                                <label for="lose" style="text-align: center;">Lose</label>
                                                <input type="number" name="lose" id="" class="form-control" required>
                                                <small id="helpId" class="text-muted">Home/Away</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="mb-3">
                                            <label for="teams">Add Teams</label><br>
                                            <select name="teams" id='select' placeholder="select teams" multiple>
                                                <?php
                                                $count = 0;
                                                $teams = mysqli_query($con, "SELECT name FROM teams");
                                                while ($all = mysqli_fetch_array($teams)) {
                                                    $count++
                                                ?>
                                                    <option value="<?= $all['name']; ?>"><?= $all['name']; ?></option>
                                                <?php
                                                } ?>
                                            </select>
                                        </div><br>
                                    </div>
                                    <div class="col-sm">
                                        <div class="mb-3">
                                            <label for="players">Add Players</label><br>
                                            <select id="players" placeholder="select players" multiple name="players">
                                                <?php
                                                $count = 0;
                                                $players = mysqli_query($con, "SELECT * FROM players");
                                                while ($all = mysqli_fetch_array($players)) {
                                                    $name = $all['first_name'] . " " . $all['last_name'];
                                                    $filter = $name . " " . ($all['team']);
                                                    $count++

                                                ?>
                                                    <option value="<?= $name; ?>"><?= $filter; ?></option>
                                                <?php
                                                } ?>
                                            </select>
                                        </div><br>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="rules">Season Rules</label>
                                    <textarea class="form-control" name="rules" id="" rows="2"></textarea>
                                </div>
                                <br>

                                <div class="mb-3 d-grid">
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


<?php include '../includes/footer.php'; ?>

<script type="text/javascript" src="../assets/js/virtual-select.min.js"></script>
<script type="text/javascript">
    VirtualSelect.init({
        ele: '#select'
    });
</script>
<script type="text/javascript">
    VirtualSelect.init({
        ele: '#players'
    });
</script>
</body>

</html>