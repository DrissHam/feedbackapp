<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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
               <li>1</li>
               <li>2</li>
                    </ul>
                </li>
            </ul>

            <ul data-submenu-title="Compte">
                <li><a href="<?php echo base_url() . "/pro/profile" ?>"><i class="sl sl-icon-user"></i> Mon profile</a></li>
                <li><a href="<?php echo base_url() . "/" ?>"><i class="sl sl-icon-power"></i> Déconnexion</a></li>
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
                    <h2>Nouveaux Messages</h2>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Listings -->
            <div class="col-lg-12 col-md-12">
                <div class="dashboard-list-box margin-top-0">

                    <!-- Booking Requests Filters  -->
                    <div class="booking-requests-filter">

                        <!-- Sort by -->
                        <div class="sort-by">
                            <div class="sort-by-select">
                                <select data-placeholder="Default order" class="chosen-select-no-single" id="my_selection">

                                    <?php
                                    if (isset($_GET["filter"]) && $_GET["filter"] === "satisfied") {
                                        echo " <option value='all' href='" . base_url() . '/pro/messages/new' . "'>Tout</option>
                                        <option value='satisfied' href='" . base_url() . '/pro/messages/new?filter=satisfied' . "' selected >Satifaits</option>
                                        <option value='unsatisfied' href='" . base_url() . '/pro/messages/new?filter=unsatisfied' . "'>Insatifaits</option>";
                                    } elseif (isset($_GET["filter"]) && $_GET["filter"] === "unsatisfied") {
                                        echo " <option value='all' href='" . base_url() . '/pro/messages/new' . "'>Tout</option>
                                        <option value='satisfied' href='" . base_url() . '/pro/messages/new?filter=satisfied' . "'>Satifaits</option>
                                        <option value='unsatisfied' href='" . base_url() . '/pro/messages/new?filter=unsatisfied' . "' selected >Insatifaits</option>";
                                    } else {
                                        echo " <option value='all' href='" . base_url() . '/pro/messages/new' . "' selected >Tout</option>
                                        <option value='satisfied' href='" . base_url() . '/pro/messages/new?filter=satisfied' . "'>Satifaits</option>
                                        <option value='unsatisfied' href='" . base_url() . '/pro/messages/new?filter=unsatisfied' . "'>Insatifaits</option>";
                                    }
                                    ?>

                                </select>

                            </div>
                        </div>
                    </div>

                    <!-- Reply to review popup -->
                    <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                        <div class="small-dialog-header">
                            <h3>Envoyer un message</h3>
                        </div>
                        <div class="message-reply margin-top-0">
                            <textarea cols="40" rows="3" placeholder="Votre message"></textarea>
                            <button class="button">Envoyer</button>
                        </div>
                    </div>

    <h1>PAGE DE TEST</h1>
    <h4>Nombre de messages : <?php echo count($messages); ?></h4>
    <ul>
        <?php foreach ($messages as $message) : ?>
            <li <?php if ($message["satisfaction"]) {
                    echo " class='approved-booking' ";
                } else {
                    echo " class= 'pending-booking' ";
                } ?>>
                <div class="list-box-listing bookings">
                    <div class="list-box-listing-img"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&s=120" alt=""></div>
                    <div class="list-box-listing-content">
                        <div class="inner">


                            <h3><?= esc($message["compagny_name"]) ?> <span <?php if ($message["satisfaction"]) {
                                                                                echo " class='booking-status' ";
                                                                            } else {
                                                                                echo " class= 'booking-status unpaid' ";
                                                                            } ?>>
                                    <?php if ($message["satisfaction"]) {
                                        echo "Satisfait";
                                    } else {
                                        echo "Insatisfait";
                                    } ?></span></h3>

                            <div class="inner-booking-list">
                                <h5>Date:</h5>
                                <ul class="booking-list">
                                    <li class=""><?= esc($message["created_at"]) ?></li>
                                </ul>
                            </div>

                            <div class="inner-booking-list">
                                <h5>Reviendriez vous?</h5>
                                <ul class="booking-list">
                                    <li class="highlighted"><?php if ($message["comeback"]) {
                                                                echo "oui";
                                                            } else {
                                                                echo "non";
                                                            } ?></li>
                                </ul>
                            </div>

                            <div class="inner-booking-list">
                                <h5>Message</h5>
                                <ul class="booking-list">
                                    <li>
                                        <?= esc($message["remark"]) ?>
                                    </li>

                                </ul>
                            </div>
                            <div class="plat">





                            </div>
                            <a href="#" class="rate-review approve" onmouseover="javascript:visibilite('id_div_1'); return false;" onmouseout="javascript:visibilite('id_div_1'); return false;"><i class="sl sl-icon-check"></i>Prendre en compte</a>
                            <div id="id_div_1" style="display:none;">Mettre en place une action pour prendre en compte la remarque du client</div>
                            <a href="<?php echo base_url() . '/test?filter2=to-treat'; ?>" class="rate-review reject"><i class="sl sl-icon-clock"></i> Traiter plus tard</a>
                            <a href="<?php echo base_url() . '/test?filter2=archived'; ?>" class="rate-review popup-with-zoom-anim"><i class="sl sl-icon-envelope-open"></i>Envoyer un Message</a>
                            
                            <a href="<?php
                                        if (isset($_GET["filter2"]) && $_GET["filter2"] === "archived") {
                                            echo " 
                                                <option value='archived' href='" . base_url() . '/test?filter2=archived' . "' selected >Archiver</option>
                                                <option value='to-treat' href='" . base_url() . '/test?filter2=to-treat' . "'>Traiter</option>";
                                        }
                                        ?>" class="rate-review approve" value="<?php $updateStatusArchived ?>"><i class="fa fa-archive"></i> Archiver</a>
                            
                            
                            
                            
                            <button onclick="<?php echo base_url() . '/test?filter2=archived'; ?>" class="rate-review approve" value="<?php echo base_url() . '/test?filter2=archived'; ?>" style="border-radius= 50px; font-size= 13px;"><i class="fa fa-archive"></i> Archiver </button>

                            <!-- clickMe() -->
                        </div>
                    </div>
                </div>









                
                <?php endforeach ?>
                
                                <input type="submit" name="archived" value=" <?php
                                                                                if (isset($_GET["filter2"]) && $_GET["filter2"] === "archived") {
                                                                                    echo " 
                                                                    <option value='satisfied' href='" . base_url() . '/pro/messages/new?filter=archived' . "' selected >Archiver</option>
                                                                    <option value='unsatisfied' href='" . base_url() . '/pro/messages/new?filter=to-treat' . "'>Traiter</option>";
                                                                                }
                                                                                ?>
                                <label for='archived'>ARCHIVED</label>
                    
                                <input type="submit" name="to-treat" value="to-treat">
                                <label for="to-treat">TO-TREAT</label>

            <?php


            function test()
            {
                echo 'Update status is OK!' . '<br>';
            }
            if (isset($_GET['status'])) {
                test();
            }
            ?>
            <a href=''>Execute PHP Function</a>


</body>

</html>