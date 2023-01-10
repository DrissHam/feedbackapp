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
    <div id="wrapper" class="padding-bottom-30">

        <!-- Header Container
================================================== -->
        <header id="header-container">

            <!-- Header -->
            <div id="header" class="padding-bottom-15">
                <div class="container">

                    <!-- Left Side Content -->
                    <div class="container">

                        <!-- Logo -->
                        <div id="logo" style="width: auto">
                            <a href="<?php echo base_url() . "/" ?>"><img src="<?php echo base_url() . "/images/logo.png"; ?>"></a>
                        </div>


                        <div class="header-widget" style="border-top: inherit;width: auto;float: right;padding: 0;">
                            <a href="#sign-in-dialog" class="button border with-icon popup-with-zoom-anim">Connexion <i class="sl sl-icon-login"></i></a>
                        </div>


                    </div>
                    <!-- Left Side Content / End -->


                    <!-- Right Side Content / End -->


                    <!-- Right Side Content / End -->

                    <!-- Sign In Popup -->
                    <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">

                        <div class="small-dialog-header">
                            <h3>Connectez-vous</h3>
                        </div>

                        <!--Tabs -->
                        <div class="sign-in-form style-1">

                            <ul class="tabs-nav">
                                <li class=""><a href="#tab1">Connexion</a></li>
                                <li><a href="#tab2">S'enregistrer</a></li>
                                <li><a href="#tab3">Administrateur</a></li>
                            </ul>

                            <div class="tabs-container alt">

                                <!-- Login -->
                                <div class="tab-content" id="tab1" style="display: none;">
                                    <form action="<?php echo base_url() . "/compagny/login" ?>" method="post" class="login">

                                        <p class="form-row form-row-wide">
                                            <label for="username">Email:
                                                <i class="im im-icon-Mail"></i>
                                                <input type="email" class="input-text" name="email" id="email" value="" />
                                            </label>
                                        </p>

                                        <p class="form-row form-row-wide">
                                            <label for="password">Mot de passe:
                                                <i class="im im-icon-Lock-2"></i>
                                                <input class="input-text" type="password" name="password" id="password" />
                                            </label>
                                            <span class="lost_password">
                                                <a href="#">Mot de passe oublié?</a>
                                            </span>
                                        </p>

                                        <div class="form-row">
                                            <input type="submit" class="button border margin-top-5" name="login" value="Login" />
                                            <div class="checkboxes margin-top-10">
                                                <input id="remember-me" type="checkbox" name="check">
                                                <label for="remember-me">Rester connecter</label>
                                            </div>
                                        </div>

                                    </form>
                                </div>


                                <!-- Register -->
                                <div class="tab-content" id="tab2" style="display: none;">
                                    <?= service('validation')->listErrors() ?>




                                    <form action="<?php echo base_url() . "/compagny/submit"; ?>" method="post" class="register">

                                        <p class="form-row form-row-wide">
                                            <label for="username2">Nom de l'établissement:
                                                <i class="im im-icon-Male"></i>
                                                <input type="text" class="input-text" name="compagny_name" id="username2" value="" />
                                            </label>
                                        </p>

                                        <p class="form-row form-row-wide">
                                            <label for="username2">Adresse de l'établissement:
                                                <i class="im im-icon-Male"></i>
                                                <input type="text" class="input-text" name="address" id="username2" value="" />
                                            </label>
                                        </p>

                                        <p class="form-row form-row-wide">
                                            <label for="username2">Code postale de l'établissement:
                                                <i class="im im-icon-Male"></i>
                                                <input type="num" class="input-text" name="postal_code" id="username2" value="" />
                                            </label>
                                        </p>

                                        <p class="form-row form-row-wide">
                                            <label for="username2">Ville de l'établissement:
                                                <i class="im im-icon-Male"></i>
                                                <input type="text" class="input-text" name="city" id="username2" value="" />
                                            </label>
                                        </p>

                                        <p class="form-row form-row-wide">
                                            <label for="email2">Email:
                                                <i class="im im-icon-Mail"></i>
                                                <input type="text" class="input-text" name="email" id="email2" value="" />
                                            </label>
                                        </p>

                                        <p class="form-row form-row-wide">
                                            <label for="password1">Mot de passe:
                                                <i class="im im-icon-Lock-2"></i>
                                                <input class="input-text" type="password" name="password" id="password1" />
                                            </label>
                                        </p>

                                        <p class="form-row form-row-wide">
                                            <label for="password2">Confirmer le mot de passe:
                                                <i class="im im-icon-Lock-2"></i>
                                                <input class="input-text" type="password" name="passconf" id="password2" />
                                            </label>
                                        </p>

                                        <input type="submit" class="button border fw margin-top-10" name="register" value="S'enregistrer" />

                                    </form>
                                </div>
                                
                                
                                <!-- Login Admin -->
                                <div class="tab-content" id="tab3" style="display: none;">
                                    <form action="<?php echo base_url() . "/admin/login" ?>" method="post" class="login">

                                        <p class="form-row form-row-wide">
                                            <label for="username">Email:
                                                <i class="im im-icon-Mail"></i>
                                                <input type="email" class="input-text" name="email" id="email" value="" />
                                            </label>
                                        </p>

                                        <p class="form-row form-row-wide">
                                            <label for="password">Mot de passe:
                                                <i class="im im-icon-Lock-2"></i>
                                                <input class="input-text" type="password" name="password" id="password" />
                                            </label>
                                            <span class="lost_password">
                                                <a href="#">Mot de passe oublié?</a>
                                            </span>
                                        </p>

                                        <div class="form-row">
                                            <input type="submit" class="button border margin-top-5" name="login" value="Login" />
                                            <div class="checkboxes margin-top-10">
                                                <input id="remember-me" type="checkbox" name="check">
                                                <label for="remember-me">Rester connecter</label>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                          
                        </div>
                    </div>
                    <!-- Sign In Popup / End -->

                </div>
            </div>
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <?php if (session()->getFlashdata('errors2')) { ?>
            <div class="notification error closeable">
                <p> <?= session()->getFlashdata('errors2') ?></p>
                <a class="close"></a>
            </div>
        <?php  } ?>
        
        <?php if (session()->getFlashdata('errorMdpOrMail')) { ?>
            <div class="notification error closeable">
                <p> <?= session()->getFlashdata('errorMdpOrMail') ?></p>
                <a class="close"></a>
            </div>
        <?php  } ?>
        <!-- Info Section -->
        <div class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <h2 class="headline centered margin-top-40 margin-bottom-20">
                        Améliorer votre service et conservez vos clients
                        <span class="margin-top-25">Encouragez vos clients à dire ce qui ne vas pas afin d'améliorer votre reputation et accroitre votre clientéle.</span>
                        <!-- <?php if (session()->getFlashdata('success')) { ?>
                            <div class="notification success closeable">
                                <p> <?= session()->getFlashdata('success') ?></p>
                                <a class="close"></a>
                            </div>
                        <?php  } ?> -->

                        <?php if (session()->getFlashdata('errors')) { ?>
                            <div class="notification error closeable">
                                <p> <?= session()->getFlashdata('errors') ?></p>
                                <a class="close"></a>
                            </div>
                        <?php  } ?>
                        <a href="#sign-in-dialog" class="button medium margin-top-20 popup-with-zoom-anim">Commencer c'est Gratuit</a>
                    </h2>
                </div>
            </div>

            <div class="row icons-container">
                <!-- Stage -->
                <div class="col-md-4">
                    <div class="icon-box-2 with-line margin-top-0">
                        <i class="im im-icon-Angry"></i>
                        <h3>Reçevez les remarques</h3>
                        <p>Vos clients peuvent dire ce qu'ils pensent car ils sont protégé par l'anonymat.</p>
                    </div>
                </div>

                <!-- Stage -->
                <div class="col-md-4">
                    <div class="icon-box-2 with-line margin-top-0">
                        <i class="im im-icon-Administrator"></i>
                        <h3>Traitez les remarques</h3>
                        <p> Entreprennez les changements afin de satisfaire vos clients. Tennez les informé de la prise en compte de leur remarque.</p>
                    </div>
                </div>

                <!-- Stage -->
                <div class="col-md-4">
                    <div class="icon-box-2 margin-top-0">
                        <i class="im im-icon-Bar-Chart"></i>
                        <h3>Fidélisez vos clients</h3>
                        <p>Le client se sent écouté, il est fidélisé. Votre chiffre d'affaire augmente</p>
                    </div>
                </div>
            </div>

        </div>
        <!-- Info Section / End -->
        <!-- Back To Top Button -->
        <div id="backtotop"><a href="#"></a></div>


    </div>
    <div class="footer" id="header" class="padding-bottom-15" style="margin-top: 200px;font-size: 13px">


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


    <!-- Google Autocomplete -->
    <script>
        function initAutocomplete() {
            var input = document.getElementById('autocomplete-input');
            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    return;
                }
            });

            if ($('.main-search-input-item')[0]) {
                setTimeout(function() {
                    $(".pac-container").prependTo("#autocomplete-container");
                }, 300);
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g&libraries=places&callback=initAutocomplete"></script>


    <!-- Style Switcher
================================================== -->
    <script src=" <?php echo base_url() . "/scripts/switcher.js"; ?>"></script>

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