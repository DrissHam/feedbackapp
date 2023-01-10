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
                            <a href="<?php echo base_url() . "/" ?>" class="dashboard-logo"><img src=" <?php echo base_url() . "/images/logo2.png"; ?>"></a>
                        </div>

                    </div>
                    <!-- Left Side Content / End -->
                    <div class="header-widget" style="border-top: inherit;width: auto;float: right;padding: 0;">
						<a href="<?php echo base_url() . "/logout" ?>" class="button border with-icon">Déconnexion <i class="sl sl-icon-logout"></i></a>
					</div>
                </div>
            </div>
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->


        <!-- Dashboard -->
        <div id="dashboard">

      
        
<h1>Bienvenue Administrateur</h1>


            <!-- Content
        ================================================== -->
            
        <div class="col-md-6">

<h4 class="headline margin-top-70 margin-bottom-30">Table</h4>
<div class="header-widget" style="border-top: inherit;width: auto;float: right;padding: 0;">
                            <a href="<?php echo base_url() . "/admin/all_compagnys" ?>" class="button border with-icon">Revenir aux partenaires <i class="sl sl-icon-logout"></i></a>
                        </div>
<table class="basic-table">
    <!-- le success de la supprésion de compte -->
<?php if (session()->getFlashdata('success')) { ?>
                                <div class="notification success closeable">
                                    <p> <?= session()->getFlashdata('success') ?></p>
                                    <a class="close"></a>
                                </div>
                            <?php  } ?>
    <tbody><tr>
        <th>Retour client du partenaire</th>
        <th>Satisfaction</th>
        <th>Id du partenaire</th>
        <th>Nom du partenaire</th>
    </tr>
 <?php  foreach($messages as $message) : ?> 
    <tr>
        <td data-label="Column 1"><?= esc($message['remark']) ?></td>
        <td data-label="Column 2"><?php if ($message["satisfaction"] == 1) {
              echo "satisfait";
          } else {
              echo "insatisfait";
          } ?></td>
        <td data-label="Column 3"><?= esc($message['id_compagny']) ?></td>
        <td data-label="Column 3"><?= esc($compagnys['compagny_name']) ?></td>


    </tr>
    <?php endforeach ?>
    
   
</tbody></table>
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

    <!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->
    <script src=" <?php echo base_url() . "/scripts/moment.min.js"; ?>"></script>
    <script src=" <?php echo base_url() . "/scripts/daterangepicker.js"; ?>"></script>

    <!-- <script>
        <?php

        use
            App\Models\MessageModel;

        ?>

        function clickMe() {
            var result = "?php $messageModel->updateStatus(); ?>"
            document.write(result);
        }
    </script> -->

    <script type="text/javascript">
        function visibilite(thingId) {
            var targetElement;
            targetElement = document.getElementById(thingId);
            if (targetElement.style.display == "none") {
                targetElement.style.display = "";
            } else {
                targetElement.style.display = "none";
            }
        }
    </script>




    <script>
        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#booking-date-range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
            cb(start, end);
            $('#booking-date-range').daterangepicker({
                "opens": "left",
                "autoUpdateInput": false,
                "alwaysShowCalendars": true,
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            cb(start, end);



            document.getElementById('my_selection').onchange = function() {
                window.location.href = this.children[this.selectedIndex].getAttribute('href');
            }





        });

        // Calendar animation and visual settings
        $('#booking-date-range').on('show.daterangepicker', function(ev, picker) {
            $('.daterangepicker').addClass('calendar-visible calendar-animated bordered-style');
            $('.daterangepicker').removeClass('calendar-hidden');
        });
        $('#booking-date-range').on('hide.daterangepicker', function(ev, picker) {
            $('.daterangepicker').removeClass('calendar-visible');
            $('.daterangepicker').addClass('calendar-hidden');
        });
    </script>



