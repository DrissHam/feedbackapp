
<!DOCTYPE html>

<head>

	<!-- Basic Page Needs
    ================================================== -->
	<title>Listeo</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
    ================================================== -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/main-color.css" id="colors">

</head>

<body class="transparent-header" style="height: 100vh;">

	<!-- Wrapper -->
	<div id="wrapper" style="height: 100%">

		<!-- Header Container
    ================================================== -->
		<header id="header-container">

			<!-- Header -->
			<div id="header">
				<div class="container">

					<!-- Left Side Content -->


					<!-- Logo -->
					<div id="logo" style="width: auto">
						<a href="<?php echo base_url() . "/" ?>"><img src="<?php echo base_url() . "/images/logo2.png"; ?>" data-sticky-logo="<?php echo base_url() . "/images/logo2.png"; ?>" alt=""></a>
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


		<!-- Banner
    ================================================== -->
		<div class="main-search-container centered" style="height: 100%" data-background-image="images/main-search-background-01.jpg">
			<div class="main-search-inner">
			<?php if (session()->getFlashdata('errors')) { ?>
                            <div class="notification error closeable">
                                <p> <?= session()->getFlashdata('errors') ?></p>
                                <a class="close"></a>
                            </div>
                        <?php  } ?>

				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2>
								Recherchez un établissement
							</h2>
							<h4>et laissez vos impressions de manière anonyme</h4>
							<form action="<?php echo base_url() . '/search' ?>" method="post">
								<div class="main-search-input">

									<div class="main-search-input-item">
										<input type="text" name="searchName" placeholder="Entrer le nom de l'établissement" value="" />
									</div>
									
									<button class="button" type="submit">Rechercher</button>
									<!-- 'listings-half-screen-map-list.html' -->
								</div>
							</form>
						</div>
					</div>

				</div>

			</div>
		</div>


	</div>
	<div class="footer" id="header" class="padding-bottom-15" style="margin-top: -80px;font-size: 13px">


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


	<!-- Leaflet // Docs: https://leafletjs.com/ -->
	<script src=" <?php echo base_url() . "/scripts/leaflet.min.js"; ?>"></script>

	<!-- Leaflet Maps Scripts -->
	<script src=" <?php echo base_url() . "/scripts/leaflet-markercluster.min.js"; ?>"></script>
	<script src=" <?php echo base_url() . "/scripts/leaflet-gesture-handling.min.js"; ?>"></script>
	<script src=" <?php echo base_url() . "/scripts/leaflet-listeo.js"; ?>"></script>

	<!-- Leaflet Geocoder + Search Autocomplete // Docs: https://github.com/perliedman/leaflet-control-geocoder -->
	<script src=" <?php echo base_url() . "/scripts/leaflet-autocomplete.js"; ?>"></script>
	<script src=" <?php echo base_url() . "/scripts/leaflet-control-geocoder.js"; ?>"></script>


	<!-- Typed Script -->
	<script type="text/javascript" src=" <?php echo base_url() . "scripts/typed.js"; ?>"></script>
	<script>
		var typed = new Typed('.typed-words', {
			strings: [""],
			typeSpeed: 80,
			backSpeed: 80,
			backDelay: 4000,
			startDelay: 1000,
			loop: true,
			showCursor: true
		});
	</script>


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