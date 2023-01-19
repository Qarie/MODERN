<?php

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASSWORD = '';
$DATABASE_NAME = 'ddibastats_db';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASSWORD, $DATABASE_NAME);

$ids = $_SESSION['id'];
$sql1 = mysqli_query($con, "SELECT * FROM accounts where id='$ids'");
$result1 = mysqli_fetch_array($sql1);
?>

<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->

        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <h4 style="color: white;">DDIBASTATS</h4>
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="home.php">
                        <i class="las la-tachometer-alt"></i> <span data-key="t-dashboard">Dashboard</span>
                    </a>

                </li> <!-- end Dashboard Menu -->


                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Pages</span></li>



                <li class="nav-item">
                    <a class="nav-link menu-link" href="league_table.php">
                        <i class="las la-columns"></i> <span data-key="t-League Table">League Table</span>
                    </a>

                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="match_day.php">
                        <i class=" las la-futbol"></i> <span data-key="t-Match Day">Match Day</span>
                    </a>

                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="matches.php">
                        <i class="las la-toggle-on"></i> <span data-key="t-Matches">Matches</span>
                    </a>

                </li>
                <?php
                $role = $result1['role'];
                if (isset($role) && $role == 1) {
                    echo '<li class="nav-item">
<a class="nav-link menu-link" href="users.php" >
    <i class="las la-users-cog"></i> <span data-key="t-Users">Users</span>
</a>

</li>';
                }

                ?>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="settings.php">
                        <i class=" ri-settings-4-line"></i> <span data-key="t-Settings">Settings</span>
                    </a>

                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link menu-link" href="season.php" >
                        <i class="lab la-delicious"></i> <span data-key="t-season">Season</span>
                    </a>
                    
                </li> -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="lab la-delicious"></i> <span data-key="t-Transfers">Seasons</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="season.php" class="nav-link">Add Season
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="register_teams.php" class="nav-link">Add Teams
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="register_players.php" class="nav-link">Add Players
                                </a>

                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="lar la-user-circle"></i> <span data-key="t-Transfers">Transfers</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarSignIn" class="nav-link">Add
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="#sidebarSignUp" class="nav-link">View
                                </a>

                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class=" ri-bar-chart-2-line"></i> <span data-key="t-Statistics">Statistics</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="pages-starter.html" class="nav-link" data-key="t-Top Scorers"> Top Scorers </a>
                            </li>

                            <li class="nav-item">
                                <a href="pages-team.html" class="nav-link" data-key="t-Hatrick"> Hatrick </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-timeline.html" class="nav-link" data-key="t-timeline"> Timeline </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-faqs.html" class="nav-link" data-key="t-faqs"> FAQs </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-pricing.html" class="nav-link" data-key="t-pricing"> Pricing </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-gallery.html" class="nav-link" data-key="t-gallery"> Gallery </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-account">Account</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="logout.php">
                        <i class="ri-logout-circle-r-line"></i> <span data-key="t-Logout">Logout</span>
                    </a>

                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>