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
                            <a href="index.html"><img src="<?php echo base_url() . "/images/logo.png"; ?>"></a>
                            <a href="<?php echo base_url() . "/" ?>" class="dashboard-logo"><img
                                    src=" <?php echo base_url() . "/images/logo2.png"; ?>"></a>
                        </div>

                    </div>
                    <!-- Left Side Content / End -->
                    <div class="header-widget" style="border-top: inherit;width: auto;float: right;padding: 0;">
                        <a href="<?php echo base_url() . "/logout" ?>" class="button border with-icon">Déconnexion <i
                                class="sl sl-icon-logout"></i></a>
                    </div>
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
            <a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

            <div class="dashboard-nav">
                <div class="dashboard-nav-inner">

                    <ul data-submenu-title="Main">
                        <li class="active"><a href="dashboard.html"><i class="sl sl-icon-settings"></i> Dashboard</a>
                        </li>
                        <li><a href="dashboard-messages.html"><i class="sl sl-icon-envelope-open"></i> Compagnies <span
                                    class="nav-tag messages">2</span></a></li>
                    </ul>

                    <ul data-submenu-title="Listings">
                        <li><a><i class="sl sl-icon-layers"></i> My Listings</a>
                            <ul>
                                <li><a href="dashboard-my-listings.html">Active <span class="nav-tag green">6</span></a>
                                </li>
                                <li><a href="dashboard-my-listings.html">Pending <span
                                            class="nav-tag yellow">1</span></a></li>
                                <li><a href="dashboard-my-listings.html">Expired <span class="nav-tag red">2</span></a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="dashboard-reviews.html"><i class="sl sl-icon-star"></i> Reviews</a></li>
                        <li><a href="dashboard-bookmarks.html"><i class="sl sl-icon-heart"></i> Bookmarks</a></li>
                        <li><a href="dashboard-add-listing.html"><i class="sl sl-icon-plus"></i> Add Listing</a></li>
                    </ul>

                    <ul data-submenu-title="Account">
                        <li><a href="dashboard-my-profile.html"><i class="sl sl-icon-user"></i> My Profile</a></li>
                        <li><a href="index.html"><i class="sl sl-icon-power"></i> Déconnexion</a></li>
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
                            <h2>Dashboard Administrateur</h2>
                            <!-- Breadcrumbs -->
                            <nav id="breadcrumbs">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li>Dashboard</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Notice -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="notification success closeable margin-bottom-30">
                            <p>Bienvenue dans votre <strong>Dashboard</strong> administrateur</p>
                            <a class="close" href="#"></a>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="row">

                    <!-- Item -->
                    <div class="col-lg-3 col-md-6">
                        <div class="dashboard-stat color-2">
                            <div class="dashboard-stat-content">
                                <h4>726</h4> <span>Total Compagnies</span>
                            </div>
                            <div class="dashboard-stat-icon"><i class="im im-icon-Line-Chart"></i></div>
                        </div>
                    </div>


                    <!-- Item -->
                    <div class="col-lg-3 col-md-6">
                        <div class="dashboard-stat color-3">
                            <div class="dashboard-stat-content">
                                <h4>95</h4> <span>Total Messages</span>
                            </div>
                            <div class="dashboard-stat-icon"><i class="im im-icon-Add-UserStar"></i></div>
                        </div>
                    </div>

                    <!-- Item -->
                    <div class="col-lg-3 col-md-6">
                        <div class="dashboard-stat color-1">
                            <div class="dashboard-stat-content">
                                <h4>6</h4> <span>Total Client Satisfait</span>
                            </div>
                            <div class="dashboard-stat-icon"><i class="im im-icon-Thumbs-UpSmiley"></i></div>
                        </div>
                    </div>

                    <!-- Item -->
                    <div class="col-lg-3 col-md-6">
                        <div class="dashboard-stat color-4">
                            <div class="dashboard-stat-content">
                                <h4>126</h4> <span>Total clients insatisfait</span>
                            </div>
                            <div class="dashboard-stat-icon"><i class="im im-icon-Depression"></i></div>
                        </div>
                    </div>
                </div>


                <div class="row">

                    <!-- Recent Activity -->
                    <div class="col-lg-6 col-md-12">
                        <div class="dashboard-list-box with-icons margin-top-20">
                            <h4>Recent Activities</h4>
                            <ul>
                                <li>
                                    <i class="list-box-icon sl sl-icon-layers"></i> Your listing <strong><a
                                            href="#">Hotel Govendor</a></strong> has been approved!
                                    <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                                </li>

                                <li>
                                    <i class="list-box-icon sl sl-icon-star"></i> Kathy Brown left a review <div
                                        class="numerical-rating" data-rating="5.0"></div> on <strong><a href="#">Burger
                                            House</a></strong>
                                    <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                                </li>

                                <li>
                                    <i class="list-box-icon sl sl-icon-heart"></i> Someone bookmarked your <strong><a
                                            href="#">Burger House</a></strong> listing!
                                    <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                                </li>

                                <li>
                                    <i class="list-box-icon sl sl-icon-star"></i> Kathy Brown left a review <div
                                        class="numerical-rating" data-rating="3.0"></div> on <strong><a
                                            href="#">Airport</a></strong>
                                    <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                                </li>

                                <li>
                                    <i class="list-box-icon sl sl-icon-heart"></i> Someone bookmarked your <strong><a
                                            href="#">Burger House</a></strong> listing!
                                    <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                                </li>

                                <li>
                                    <i class="list-box-icon sl sl-icon-star"></i> John Doe left a review <div
                                        class="numerical-rating" data-rating="4.0"></div> on <strong><a href="#">Burger
                                            House</a></strong>
                                    <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                                </li>

                                <li>
                                    <i class="list-box-icon sl sl-icon-star"></i> Jack Perry left a review <div
                                        class="numerical-rating" data-rating="2.5"></div> on <strong><a href="#">Tom's
                                            Restaurant</a></strong>
                                    <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Invoices -->
                    <div class="col-lg-6 col-md-12">
                        <div class="dashboard-list-box invoices with-icons margin-top-20">
                            <h4>Invoices</h4>
                            <ul>

                                <li><i class="list-box-icon sl sl-icon-doc"></i>
                                    <strong>Professional Plan</strong>
                                    <ul>
                                        <li class="unpaid">Unpaid</li>
                                        <li>Order: #00124</li>
                                        <li>Date: 20/07/2019</li>
                                    </ul>
                                    <div class="buttons-to-right">
                                        <a href="dashboard-invoice.html" class="button gray">View Invoice</a>
                                    </div>
                                </li>

                                <li><i class="list-box-icon sl sl-icon-doc"></i>
                                    <strong>Extended Plan</strong>
                                    <ul>
                                        <li class="paid">Paid</li>
                                        <li>Order: #00108</li>
                                        <li>Date: 14/07/2019</li>
                                    </ul>
                                    <div class="buttons-to-right">
                                        <a href="dashboard-invoice.html" class="button gray">View Invoice</a>
                                    </div>
                                </li>

                                <li><i class="list-box-icon sl sl-icon-doc"></i>
                                    <strong>Extended Plan</strong>
                                    <ul>
                                        <li class="paid">Paid</li>
                                        <li>Order: #00097</li>
                                        <li>Date: 10/07/2019</li>
                                    </ul>
                                    <div class="buttons-to-right">
                                        <a href="dashboard-invoice.html" class="button gray">View Invoice</a>
                                    </div>
                                </li>

                                <li><i class="list-box-icon sl sl-icon-doc"></i>
                                    <strong>Basic Plan</strong>
                                    <ul>
                                        <li class="paid">Paid</li>
                                        <li>Order: #00091</li>
                                        <li>Date: 30/06/2019</li>
                                    </ul>
                                    <div class="buttons-to-right">
                                        <a href="dashboard-invoice.html" class="button gray">View Invoice</a>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>


                    <!-- Copyrights -->
                    <div class="col-md-12">
                        <div class="copyrights">© 2021 Listeo. All Rights Reserved.</div>
                    </div>
                </div>

            </div>
            <!-- Content / End -->


        </div>
        <!-- Dashboard / End -->


    </div>
    <!-- Wrapper / End -->


    <!-- Scripts
================================================== -->
    <script type="text/javascript" src="scripts/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="scripts/jquery-migrate-3.3.2.min.js"></script>
    <script type="text/javascript" src="scripts/mmenu.min.js"></script>
    <script type="text/javascript" src="scripts/chosen.min.js"></script>
    <script type="text/javascript" src="scripts/slick.min.js"></script>
    <script type="text/javascript" src="scripts/rangeslider.min.js"></script>
    <script type="text/javascript" src="scripts/magnific-popup.min.js"></script>
    <script type="text/javascript" src="scripts/waypoints.min.js"></script>
    <script type="text/javascript" src="scripts/counterup.min.js"></script>
    <script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
    <script type="text/javascript" src="scripts/tooltips.min.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>


</body>

</html>