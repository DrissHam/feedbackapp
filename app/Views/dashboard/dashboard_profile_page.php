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
                        <li><a href="<?php echo base_url() . "/pro/dashboard" ?>"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
                        <li><a><i class="sl sl-icon-envelope-open"></i> Messages<span class="nav-tag messages"><?php echo $nbNewMessages ?></span></a>
                            <ul>
                                <li><a href="<?php echo base_url() . "/pro/messages/new" ?>">Nouveaux<span class="nav-tag green"><?php echo $nbNewMessages ?></span></a></li>
                                <li><a href="<?php echo base_url() . "/pro/messages/treat" ?>">À traiter <span class="nav-tag yellow"><?php echo $nbToTreatMessages ?></span></a></li>
                                <li><a href="<?php echo base_url() . "/pro/messages/archived?filter=archived" ?>">Archivés <span class="nav-tag blue"><?php echo $nbArchivedMessages ?></span></a></li>
                                <li><a href="<?php echo base_url() . "/pro/messages/all" ?>">Tous <span class="nav-tag" ;><?php echo $nbAllMessages ?></span></a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul data-submenu-title="Compte">
                        <li class="active"><a href="<?php echo base_url() . "/pro/profile" ?>"><i class="sl sl-icon-user"></i> Mon profile</a></li>
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
                            <!-- ici le success de la connexion -->
                            <?php if (session()->getFlashdata('success2')) { ?>
                                <div class="notification success closeable">
                                    <p> <?= session()->getFlashdata('success2') ?></p>
                                    <a class="close"></a>
                                </div>
                            <?php  } ?>
                            <!-- ici le success de la mise à jour du profile -->
                            <?php if (session()->getFlashdata('success')) { ?>
                                <div class="notification success closeable">
                                    <p> <?= session()->getFlashdata('success') ?></p>
                                    <a class="close"></a>
                                </div>
                            <?php  } ?>

                            <?php if (session()->getFlashdata('errors')) { ?>
                                <div class="notification error closeable">
                                    <p> <?= session()->getFlashdata('errors') ?></p>
                                    <a class="close"></a>
                                </div>
                            <?php  } ?>
                            <?php if (session()->getFlashdata('errors2')) { ?>
                                <div class="notification error closeable">
                                    <p> <?= session()->getFlashdata('errors2') ?></p>
                                    <a class="close"></a>
                                </div>
                            <?php  } ?>


                            <h2>Mon profil</h2>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <!-- Profile -->
                    <div class="col-lg-6 col-md-12">
                        <div class="dashboard-list-box margin-top-0">
                            <h4 class="gray">Détails du profil</h4>
                            <div class="dashboard-list-box-static">

                                <form action="<?php echo base_url() . '/pro/profile/updateAvatar'?>" method="post" class="" enctype="multipart/form-data">
                                    <!-- Avatar -->
                                    <div class="edit-profile-photo">
                                        <img src="<?php echo base_url() . '/pages/images/avatar_img' . $idCompagny ?>" alt="avatar" name="avatar">
                                        <br>
                                        <div class="change-photo-btn">
                                            </div>
                                            <div class="photoUpload change-photo-btn">
                                                <span><i class="fa fa-upload"></i> Télécharger un logo</span>
                                                <input type="file" class="upload" name="avatar" />
                                            </div>
                                    </div>
                                    <button class="button margin-top-15">Sauvegarder</button>
                                </form>



                                <form action="<?php echo base_url() . '/pro/profile/update'?>" method="post" class="">
                                    <!-- Details -->
                                    <div class="my-profile">

                                        <label><i class="im im-icon-Haunted-House"></i> Nom de l'établissement</label>
                                        <input name="compagny_name" value="<?php echo $nameCompagny ?>" type="text">

                                        <label><i class="im im-icon-Address-Book"></i>Adresse</label>
                                        <input name="address" value="<?php echo $addressCompagny ?>" type="text">

                                        <label><i class="im im-icon-Address-Book"></i>Code postal</label>
                                        <input name="postal_code" value="<?php echo $postalCodeCompagny ?>" type="number">

                                        <label><i class="im im-icon-The-WhiteHouse"></i>Ville</label>
                                        <input name="city" value="<?php echo $cityCompagny ?>" type="text">

                                        <label><i class="im im-icon-Mail-2"></i>Email</label>
                                        <input name="email" value="<?php echo $emailCompagny ?>" type="email">

                                        <label><i class="sl sl-icon-ghost"></i> SnapChat</label>
                                        <input name="snapchat" value="<?php echo $snapchatCompagny ?>" placeholder="https://www.snapchat.com/" type="text">

                                        <label><i class="fa fa-instagram"></i> Instagram</label>
                                        <input name="instagram" value="<?php echo $instagramCompagny ?>" placeholder="https://www.instagram.com/" type="text">

                                        <label><i class="im im-icon-Facebook"></i> Facebook</label>
                                        <input name="facebook" value="<?php echo $facebookCompagny ?>" placeholder="https://www.facebook.com/" type="text">

                                        <label><i class="im im-icon-Twitter"></i> Twitter</label>
                                        <input name="twitter" value="<?php echo $twitterCompagny ?>" placeholder="https://www.twitter.com/" type="text">

                                        <label><i class="fa fa-external-link-square"></i> Site web</label>
                                        <input name="web" value="<?php echo $webSiteCompagny ?>" placeholder="https://www.google.com/" type="text">
                                    </div>

                                    <button class="button margin-top-15">Sauvegarder</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Change Password -->
                    <div class="col-lg-6 col-md-12">
                        <?php if (session()->getFlashdata('passwordError')) { ?>
                            <div class="notification error closeable">
                                <p> <?= session()->getFlashdata('passwordError') ?></p>
                                <a class="close"></a>
                            </div>
                        <?php  } ?>
                        <div class="dashboard-list-box margin-top-0">
                            <h4 class="gray">Mettre à jour le Mot de passe</h4>
                            <div class="dashboard-list-box-static">
                                <form action="<?php echo base_url() . '/pro/profile/updatePassword'?>" method="post" class="">

                                    <!-- Change Password -->
                                    <div class="my-profile">
                                        <label class="margin-top-0">Mot de passe actuel</label>
                                        <input type="password" name="currentPassword">

                                        <label>Nouveau mot de passe</label>
                                        <input type="password" name="newPassword">

                                        <label>Confirmer le nouveau mot de passe</label>
                                        <input type="password" name="newPasswordConfirm">

                                        <button class="button margin-top-15">Sauvegarder</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- Copyrights -->
                    <div class="col-md-12">
                        <div class="copyrights"></div>
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