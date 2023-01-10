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
						<li class="active"><a><i class="sl sl-icon-envelope-open"></i> Messages<span class="nav-tag messages"><?php echo $nbNewMessages ?></span></a>
							<ul>
								<li><a href="<?php echo base_url() . "/pro/messages/new" ?>">Nouveaux<span class="nav-tag green"> <?php echo $nbNewMessages ?></span></a></li>
								<li><a href="<?php echo base_url() . "/pro/messages/treat" ?>">À traiter <span class="nav-tag yellow"><?php echo $nbToTreatMessages ?></span></a></li>
								<li class="active"><a href="<?php echo base_url() . "/pro/messages/archived" ?>">Archivés <span class="nav-tag blue"><?php echo $nbArchivedMessages ?></span></a></li>
								<li><a href="<?php echo base_url() . "/pro/messages/all" ?>">Tous <span class="nav-tag" ;><?php echo $nbAllMessages ?></span></a></li>

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
							<h2>Messages Archivés</h2>
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
												echo " <option value='all' href='" . base_url() . '/pro/messages/archived' . "'>Tout</option>
													<option value='satisfied' href='" . base_url() . '/pro/messages/archived?filter=satisfied' . "' selected >Satifaits</option>
													<option value='unsatisfied' href='" . base_url() . '/pro/messages/archived?filter=unsatisfied' . "'>Insatifaits</option>";
											} elseif (isset($_GET["filter"]) && $_GET["filter"] === "unsatisfied") {
												echo " <option value='all' href='" . base_url() . '/pro/messages/archived' . "'>Tout</option>
													<option value='satisfied' href='" . base_url() . '/pro/messages/archived?filter=satisfied' . "'>Satifaits</option>
													<option value='unsatisfied' href='" . base_url() . '/pro/messages/archived?filter=unsatisfied' . "' selected >Insatifaits</option>";
											} else {
												echo " <option value='all' href='" . base_url() . '/pro/messages/archived' . "' selected >Tout</option>
													<option value='satisfied' href='" . base_url() . '/pro/messages/archived?filter=satisfied' . "'>Satifaits</option>
													<option value='unsatisfied' href='" . base_url() . '/pro/messages/archived?filter=unsatisfied' . "'>Insatifaits</option>";
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

													<a href="#" class="rate-review approve" onmouseover="javascript:visibilite('id_div_1'); return false;" onmouseout="javascript:visibilite('id_div_1'); return false;"><i class="sl sl-icon-check"></i>Prendre en compte</a>
													<div id="id_div_1" style="display:none;">Mettre en place une action pour prendre en compte la remarque du client</div>
													<a href="<?php if (isset($_GET["filter"]) && $_GET["filter"] === "satisfied") {
																	echo base_url() . '/pro/messages/archived/update/' . $message["id"] . '?status=to-treat&filter=satisfied ';
																} elseif (isset($_GET["filter"]) && $_GET["filter"] === "unsatisfied") {
																	echo base_url() . '/pro/messages/archived/update/' . $message["id"] . '?status=to-treat&filter=unsatisfied ';
																} else {
																	echo base_url() . '/pro/messages/archived/update/' . $message["id"] . '?status=to-treat ';
																}
																?>" class="rate-review reject"><i class="sl sl-icon-clock"></i> Traiter plus tard</a>

													<a href="#small-dialog" class="rate-review popup-with-zoom-anim"><i class="sl sl-icon-envelope-open"></i>Envoyer un Message</a>

													<a href="<?php if (isset($_GET["filter"]) && $_GET["filter"] === "satisfied") {
																	echo base_url() . '/pro/messages/archived/update/' . $message["id"] . '?status=archived&filter=satisfied ';
																} elseif (isset($_GET["filter"]) && $_GET["filter"] === "unsatisfied") {
																	echo base_url() . '/pro/messages/archived/update/' . $message["id"] . '?status=archived&filter=unsatisfied ';
																} else {
																	echo base_url() . '/pro/messages/archived/update/' . $message["id"] . '?status=archived';
																}
																?>" class="rate-review approve" value="archived"><i class="fa fa-archive"></i> Archiver</a>
												</div>
											</div>
										</div>
									<?php endforeach ?>
									<div class="buttons-to-right">

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


</body>

</html>