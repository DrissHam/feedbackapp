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
        <header id="header-container">

            <!-- Header -->
            <div id="header">
                <div class="container">

                    <!-- Left Side Content -->


                    <!-- Logo -->
                    <div id="logo" style="width: auto">
                        <a href="<?php echo base_url() . "/" ?>"><img src="<?php echo base_url() . "/images/logo.png"; ?>" data-sticky-logo="<?php echo base_url() . "/images/logo.png"; ?>" alt=""></a>
                    </div>


                    <!-- Left Side Content / End -->


                    <!-- Right Side Content / End -->

                    <div class="header-widget" style="border-top: inherit;width: auto;float: right;padding: 0;">
                        <a href="<?php echo base_url() . "/pro" ?>" class="button border with-icon">Accès pro <i class="sl sl-icon-login"></i></a>
                    </div>

                    <!-- Right Side Content / End -->

                </div>
            </div>
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->


        <!-- Gradient-->
        <div class="single-listing-page-titlebar"></div>


        <!-- Content
================================================== -->
        <div class="container margin-bottom-25">
            <div class="row sticky-wrapper">
                <div class="col-lg-8 col-md-8 padding-right-30">

                    <!-- Titlebar -->
                    <div id="titlebar" style="padding: 20px 0;" class="listing-titlebar">
                        <div class="listing-titlebar-title">
                            <h2><?php echo $compagnys['compagny_name'] ?><span class="listing-tag">FastFood</span></h2>
                            <span>
                                <a href="#listing-location" class="listing-address">
                                    <i class="fa fa-map-marker"></i>
                                    <?php echo $compagnys['address'] . ' ', $compagnys['postal_code'] . ' ', $compagnys['city'] ?>

                                </a>
                            </span>
                        </div>
                    </div>
        

                    <!-- Add Review Box -->
                    <div id="add-review" style="margin-top: 0px;padding-top: 0px;" class="">
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

                        <!-- Add Review -->
                        <h3 class="listing-desc-headline margin-bottom-10 margin-top-10">Dites nous tout</h3>
                        <p class="comment-notes">Et contribuez à l'amélioration de la qualité de l'établissement.</p>


                        <!-- Review Comment -->

                        <?= service('validation')->listErrors() ?>

                        <!-- <= form_open('form') . "classe='ad-comment'  id='add-comment' ";  ?> -->
                        <form action="<?php echo base_url() . "/message/submit/" . $compagnys['id']; ?>" method="post" class="">


                            <fieldset>

                                <div class="preferred-contact-radios" style="text-align: left;">
                                    <h3>Etes vous satisfait du service?</h3>
                                    <div class="radio">
                                        <input id="radio-1" name="satisfaction" type="radio" checked="" value="1">
                                        <label for="radio-1"><span class="radio-label"></span> OUI</label>
                                    </div>

                                    <div class="radio">
                                        <input id="radio-2" name="satisfaction" type="radio" value="0">
                                        <label for="radio-2"><span class="radio-label"></span> NON</label>
                                    </div>
                                </div>
                                <br>
                                <br>

                                <div class="preferred-contact-radios" style="text-align: left;">
                                    <h3>Reviendriez vous?</h3>
                                    <div class="radio">
                                        <input id="radio-3" name="comeback" type="radio" checked="" value="1">
                                        <label for="radio-3"><span class="radio-label"></span> OUI</label>
                                    </div>


                                    <div class="radio">
                                        <input id="radio-4" name="comeback" type="radio" value="0">
                                        <label for="radio-4"><span class="radio-label"></span> NON</label>
                                    </div>
                                </div>

                                <br>

                                <div class="margin-top-20">
                                    <h3>Dites nous ce qui ne vas pas :</h3>
                                    <textarea cols="40" rows="3" name="remark"></textarea>
                                </div>
                                <p class="comment-notes">Laissez nous vos coordonnées pour vous tenir au courant de la prise en compte de votre retour.</p>
                                <p class="comment-notes">Elles resterons annonymes.</p>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div>
                                            <input name="name" type="text" id="name" placeholder="Votre nom (pas obligatoire)">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div>
                                            <input name="email" type="email" id="email" placeholder="Votre email (pas obligatoire)" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" class="error">
                                        </div>
                                    </div>
                                </div>

                            </fieldset>


                            <input type="submit" name="submit"></input>
                            <div class="clearfix"></div>

                        </form>

                    </div>
                    <!-- Add Review Box / End -->

                </div>


            </div>
        </div>


        <!-- Back To Top Button -->
        <div id="backtotop"><a href="#"></a></div>


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

    <!-- Maps -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script type="text/javascript" src=" <?php echo base_url() . "/scripts/infobox.min.js"; ?>"></script>
    <script type="text/javascript" src=" <?php echo base_url() . "/scripts/markerclusterer.js"; ?>"></script>
    <script type="text/javascript" src=" <?php echo base_url() . "/scripts/maps.js"; ?>"></script>

    <!-- Booking Widget - Quantity Buttons -->
    <script src="<?php echo base_url() . "scripts/quantityButtons.js"; ?>"></script>

    <!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->
    <script src="<?php echo base_url() . "/scripts/moment.min.js"; ?>"></script>
    <script src="<?php echo base_url() . "/scripts/daterangepicker.js"; ?>"></script>
    <script>
        // Calendar Init
        $(function() {
            $('#date-picker').daterangepicker({
                "opens": "left",
                // singleDatePicker: true,

                // Disabling Date Ranges
                isInvalidDate: function(date) {
                    // Disabling Date Range
                    var disabled_start = moment('09/02/2018', 'MM/DD/YYYY');
                    var disabled_end = moment('09/06/2018', 'MM/DD/YYYY');
                    return date.isAfter(disabled_start) && date.isBefore(disabled_end);

                    // Disabling Single Day
                    // if (date.format('MM/DD/YYYY') == '08/08/2018') {
                    //     return true;
                    // }
                }
            });
        });

        // Calendar animation
        $('#date-picker').on('showCalendar.daterangepicker', function(ev, picker) {
            $('.daterangepicker').addClass('calendar-animated');
        });
        $('#date-picker').on('show.daterangepicker', function(ev, picker) {
            $('.daterangepicker').addClass('calendar-visible');
            $('.daterangepicker').removeClass('calendar-hidden');
        });
        $('#date-picker').on('hide.daterangepicker', function(ev, picker) {
            $('.daterangepicker').removeClass('calendar-visible');
            $('.daterangepicker').addClass('calendar-hidden');
        });
    </script>


    <!-- Style Switcher
================================================== -->
    <script src="<?php echo base_url() . "/scripts/switcher.js"; ?>"></script>

    <div id="style-switcher">
        <h2>Color Switcher <a href="#"><i class="sl sl-icon-settings"></i></a></h2>

        <div>
            <ul class="colors" id="color1">
                <li><a href="#" class="main" title="Main"></a></li>
                <li><a href="#" class="blue" title="Blue"></a></li>
                <li><a href="#" class="green" title="Green"></a></li>
                <li><a href="#" class="orange" title="Orange"></a></li>
                <li><a href="#" class="navy" title="Navy"></a></li>
                <li><a href="#" class="yellow" title="Yellow"></a></li>
                <li><a href="#" class="peach" title="Peach"></a></li>
                <li><a href="#" class="beige" title="Beige"></a></li>
                <li><a href="#" class="purple" title="Purple"></a></li>
                <li><a href="#" class="celadon" title="Celadon"></a></li>
                <li><a href="#" class="red" title="Red"></a></li>
                <li><a href="#" class="brown" title="Brown"></a></li>
                <li><a href="#" class="cherry" title="Cherry"></a></li>
                <li><a href="#" class="cyan" title="Cyan"></a></li>
                <li><a href="#" class="gray" title="Gray"></a></li>
                <li><a href="#" class="olive" title="Olive"></a></li>
            </ul>
        </div>

    </div>
    <!-- Style Switcher / End -->


</body>

</html>