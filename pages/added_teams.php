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
                <div class="col-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Registered Teams</a></h4>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="table-responsive">
                                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                        <thead>
                                            <th>#</th>
                                            <th>Teams</th>

                                        </thead>
                                        <tbody style="text-transform: uppercase; font-size:11px; ">
                                            <?php

                                            $query = mysqli_query($con, "SELECT teams FROM seasons");
                                            while ($row = mysqli_fetch_array($query)) {


                                                $data = array();
                                                $data = $row['teams'];
                                                $sp_data = explode(",", $data);
                                                $count = 0;
                                                foreach ($sp_data as $value) {
                                                    // echo "$value <br>";}
                                                    $count++;
                                                    echo '<tr>';
                                                    echo '<td>' . $count . '</td>';
                                                    echo '<td>' . $value . '<br></td>';
                                                    echo '</tr>';
                                                }
                                            ?>
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