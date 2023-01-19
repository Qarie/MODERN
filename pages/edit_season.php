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

    $id = $_GET['id'];

    $sql = "UPDATE seasons SET tournament = '$tournament', season='$season',win='$win',draw='$draw',lose='$lose',teams='$teams',players='$players',rules='$rules', added_by='$added_by' WHERE id=$id";
    $query = mysqli_query($con, $sql);
    if ($query) {

        header("location:season.php");
    }
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
                            <h4>Edit Seasons <a href="season.php" class="btn btn-primary" style="float: right;">Seasons</a></h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="tournament">Tournament</label>
                                        <?php

                                        $id = $_GET['id'];
                                        $query = mysqli_query($con, "select * from seasons");
                                        $row = mysqli_fetch_array($query);

                                        ?>
                                        <select id="tournament" class="form-control" name="tournament" required>
                                            <option selected value="<?= $row['tournament']; ?>"><?= $row['tournament']; ?></option>
                                            <?php
                                            $leagues = mysqli_query($con, "SELECT name FROM leagues");
                                            while ($all = mysqli_fetch_array($leagues)) {
                                            ?>
                                                <option><?= $all['name']; ?></option>
                                            <?php
                                            } ?>
                                        </select>
                                        <small id="helpId" class="text-muted">*</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="season">Season Name</label>
                                        <input type="text" name="season" id="" class="form-control" value="<?= $row['season']; ?>" required>
                                        <small id="helpId" class="text-muted">*</small>
                                    </div>

                                    <div class="row ">
                                        <h5>Set Points</h5>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label style="text-align: center;" for="win">Win</label>
                                                <input type="number" value="<?= $row['win']; ?>" name="win" id="" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="Draw" style="text-align: center;">Draw</label>
                                                <input type="number" value="<?= $row['draw']; ?>" name="draw" id="" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="lose" style="text-align: center;">Lose</label>
                                                <input type="number" value="<?= $row['lose']; ?>" name="lose" id="" class="form-control" required>
                                            </div>
                                        </div>
                                        <small id="helpId" class="text-muted">*</small>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="teams">Add Teams</label><br>
                                                <select name="teams" id="select" multiple>
                                                    <option selected value="<?= $row['teams']; ?>"><?= $row['teams']; ?></option>
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
                                            <div class="form-group">
                                                <label for="players">Add Players</label><br>
                                                <select id="players" multiple name="players">
                                                    <option selected value="<?= $row['players']; ?>"><?= $row['players']; ?></option>
                                                    <?php
                                                    $count = 0;
                                                    $players = mysqli_query($con, "SELECT * FROM players");
                                                    while ($all = mysqli_fetch_array($players)) {
                                                        $name = $all['first_name'] . " " . $all['last_name'];
                                                        $count++

                                                    ?>
                                                        <option value="<?= $name; ?>"><?= $name; ?></option>
                                                    <?php
                                                    } ?>
                                                </select>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="rules">Season Rules</label>
                                        <textarea class="form-control" name="rules" id="" rows="2" required><?= $row['rules']; ?></textarea>
                                        <small id="helpId" class="text-muted">*</small>
                                    </div>

                                    <div class="form-group d-grid">
                                        <button type="submit" name="submit" class="btn btn-primary" style="float:right">Submit</button>
                                    </div>
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