<!DOCTYPE html>

<head>

    <!-- Basic Page Needs
================================================== -->
    <title>Listeo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
================================================== -->
    <link rel="stylesheet" href="<?php echo base_url() . "/css/style.css"; ?>">
    <link id="color" rel="stylesheet" href="<?php echo base_url() . "/css/main-color.css"; ?>">

</head>

<body>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header Container
================================================== -->
        <header id="header-container" class="fixed fullwidth dashboard">

            <!-- Header -->
            <div id="header" class="not-sticky" style="min-height: 60px;">
                <div class="container">

                    <!-- Left Side Content -->
                    <div class="left-side margin-bottom-20">

                        <!-- Logo -->
                        <div id="logo">
                            <a href="<?php echo base_url() . "/" ?>"><img src="<?php echo base_url() . "/images/logo.png"; ?>"></a>
                            <a href="<?php echo base_url() . "/" ?>" class="dashboard-logo"><img src=" <?php echo base_url() . "/images/logo2.png"; ?>"></a>
                        </div>

                    </div>
                    <!-- Left Side Content / End -->
                </div>
            </div>
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->


        <!-- Dashboard -->
        <div id="dashboard">

            <!-- Navigation
	================================================== -->

            <!-- Responsive Navigation Trigger -->
            <a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Menu</a>

            <div class="dashboard-nav">
                <div class="dashboard-nav-inner">

                    <ul data-submenu-title="">
                        <li class="active"><a href="<?php echo base_url() . "/pro/dashboard" ?>"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
                        <li><a><i class="sl sl-icon-envelope-open"></i> Messages<span class="nav-tag messages"><?php echo $nbNewMessages ?></span></a>
                            <ul>
                                <li><a href="<?php echo base_url() . "/pro/messages/new" ?>">Nouveaux<span class="nav-tag green"><?php echo $nbNewMessages ?></span></a></li>
                                <li><a href="<?php echo base_url() . "/pro/messages/treat" ?>">À traiter <span class="nav-tag yellow"><?php echo $nbToTreatMessages ?></span></a></li>
                                <li><a href="<?php echo base_url() . "/pro/messages/archived?filter=archived" ?>">Archivés <span class="nav-tag blue"><?php echo $nbArchivedMessages ?></span></a></li>
                                <li><a href="<?php echo base_url() . "/pro/messages/all" ?>">Tous <span class="nav-tag" ;><?php echo $nbAllMessages ?></span></a></li>
                                <!-- style="background-color: purple"  -->
                            </ul>
                        </li>
                    </ul>

                    <ul data-submenu-title="Compte">
                        <li><a href="<?php echo base_url() . "/pro/profile" ?>"><i class="sl sl-icon-user"></i> Mon profile</a></li>
                        <li><a href="<?php echo base_url() . "/logout" ?>"><i class="sl sl-icon-power"></i> Déconnexion</a></li>
                    </ul>

                </div>
            </div>
            <!-- Navigation / End -->


            <!-- Content
	================================================== -->
            <div class="dashboard-content">

                <!-- Titlebar -->
                <div id="titlebar">
                    <div class="row">
                        <div class="col-md-12">
                            <h2><?php echo $nameCompagny ?></h2>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="row">

                    <!-- Item -->
                    <div class="col-lg-3 col-md-6">


                        <a href="<?php echo base_url() . "/pro/messages/new" ?>">
                            <div class="dashboard-stat color-1">
                                <div class="dashboard-stat-content">
                                    <h4><?php echo $nbNewMessages ?></h4> <span>Nouveaux Messages</span>
                                </div>
                                <div class="dashboard-stat-icon"><i class="im im-icon-Mail-Read"></i></div>
                            </div>
                        </a>
                    </div>

                    <!-- Item -->
                    <div class="col-lg-3 col-md-6">
                        <a href="<?php echo base_url() . "/pro/messages/all" ?>">
                            <div class="dashboard-stat color-2">
                                <div class="dashboard-stat-content">
                                    <h4><?php echo $nbAllMessages ?></h4> <span>Tous les Messages reçus</span>
                                </div>
                                <div class="dashboard-stat-icon"><i class="im im-icon-Line-Chart"></i></div>
                            </div>
                    </div>


                    <!-- Item -->
                    <div class="col-lg-3 col-md-6">
                        <a href="<?php echo base_url() . "/pro/messages/all?filter=satisfied" ?>">
                            <div class="dashboard-stat color-3">
                                <div class="dashboard-stat-content">
                                    <h4><?php echo $nbSatisfiedMessages ?></h4> <span>Clients satisfaits</span>
                                </div>
                                <div class="dashboard-stat-icon"><i class="im im-icon-Love-User"></i></div>
                            </div>
                        </a>
                    </div>

                    <!-- Item -->
                    <div class="col-lg-3 col-md-6">
                        <a href="<?php echo base_url() . "/pro/messages/all?filter=unsatisfied" ?>">
                            <div class="dashboard-stat color-4">
                                <div class="dashboard-stat-content">
                                    <h4><?php echo $nbUnsatisfiedMessages ?></h4> <span>Clients insatifaits</span>
                                </div>
                                <div class="dashboard-stat-icon"><i class="im im-icon-Remove-User"></i></div>
                            </div>
                        </a>
                    </div>
                </div>


            </div>
            <!-- Content / End -->


        </div>
        <!-- Dashboard / End -->


    </div>
    <div class="footer" id="header" class="padding-bottom-15" style="margin-top: -40px;margin-right: -100px;font-size: 13px">


        <!-- Left Side Content -->
        <div class="container">

            <!-- Logo -->

            <span>©Copyright 2022 Developped by DBCorp</span>



            <div class="header-widget" style="border-top: inherit;width: auto;float: right;padding: 0;">
                <span>Tous droits réservés/All rights reserved</span>
            </div>


        </div>
    </div>
    <!-- Wrapper / End -->


    <!-- Scripts
================================================== -->
    <script type="text/javascript" src=" <?php echo base_url() . "/scripts/jquery-3.6.0.min.js"; ?>"></script>
    <script type="text/javascript" src=" <?php echo base_url() . "/scripts/jquery-migrate-3.3.2.min.js"; ?>"></script>
    <script type="text/javascript" src=" <?php echo base_url() . "/scripts/mmenu.min.js"; ?>"></script>
    <script type="text/javascript" src=" <?php echo base_url() . "/scripts/chosen.min.js"; ?>"></script>
    <script type="text/javascript" src=" <?php echo base_url() . "/scripts/slick.min.js"; ?>"></script>
    <script type="text/javascript" src=" <?php echo base_url() . "/scripts/rangeslider.min.js"; ?>"></script>
    <script type="text/javascript" src=" <?php echo base_url() . "/scripts/magnific-popup.min.js"; ?>"></script>
    <script type="text/javascript" src=" <?php echo base_url() . "/scripts/waypoints.min.js"; ?>"></script>
    <script type="text/javascript" src=" <?php echo base_url() . "/scripts/counterup.min.js"; ?>"></script>
    <script type="text/javascript" src=" <?php echo base_url() . "/scripts/jquery-ui.min.js"; ?>"></script>
    <script type="text/javascript" src=" <?php echo base_url() . "/scripts/tooltips.min.js"; ?>"></script>
    <script type="text/javascript" src=" <?php echo base_url() . "/scripts/custom.js"; ?>"></script>


</body>

</html>