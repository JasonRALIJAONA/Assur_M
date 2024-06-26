<!doctype html>
<html lang="en">

<head>
	<?php if ($this->session->userdata('utilisateur') !== null) {
	?>
		<title>Inscription vehicule</title>

	<?php
	} else { ?>
		<title>Simulation</title>
	<?php } ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css_client/style_inscription.css">

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<?php if ($this->session->userdata('utilisateur') !== null) {
					?>
						<h2 class="heading-section">ENREGISTREMENT DU VEHICULE</h2>

					<?php
					} else { ?>
						<h2 class="heading-section" style="color: green;">FAIRE UNE SIMULATION</h2>
					<?php } ?>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-7">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-md-12 d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4 py-5">
									<h3 class="mb-4">Information assurance</h3>
									<div id="form-message-warning" class="mb-4"></div>

									<form method="POST" id="contactForm" name="contactForm" class="contactForm form_perso" action="<?php echo site_url('form_controller/inscription_vehicule_page2'); ?>">
										<div class="row">

											<!-- CHOISIR ASSURANCE -->
											<div class="col-md-12">
												<div class="form-group">
													<div class="col-md-4" style="color:white;">Choisir assureur :</div>
													<div class="row">

														<div class="form-check img_assurance col-md-4">
															<input class="form-check-input" type="radio" name="assureur" id="assureur1" value="1">
															<label class="form-check-label" for="assureur1">

																<img src="<?php echo base_url("assets/img/MAMA.png"); ?>" alt="">
															</label>
														</div>

														<div class="form-check img_assurance col-md-4">
															<input class="form-check-input" type="radio" name="assureur" id="assureur2" value="2">
															<label class="form-check-label" for="assureur2">

																<img src="<?php echo base_url("assets/img/ARO.png"); ?>" alt="">
															</label>
														</div>

														<div class="form-check img_assurance col-md-4">
															<input class="form-check-input" type="radio" name="assureur" id="assureur3" value="3">
															<label class="form-check-label" for="assureur3">

																<img src="<?php echo base_url("assets/img/HAVANA.png"); ?>" alt="">
															</label>
														</div>
													</div>


												</div>
											</div>

											<!-- OPTIONS -->
											<div class="col-md-12">
												<div class="form-group row" style="display: none;" id="box_options">
													<!-- <div class="form-check col-md-5">
														<input class="form-check-input" type="radio" name="cotisation" id="cotisation1" data-bs-toggle="popover" data-bs-custom-class='custom-popover_cotisation' data-bs-trigger="hover focus">
														<label class="form-check-label" for="cotisation1">
															Cotisation 1
														</label>
													</div> -->



												</div>
											</div>

											<hr style="color:white">
											<!-- MODE D'USAGE -->
											<div class="col-md-12">
												<div class="form-group row" style="display: none;" id="box_usage">


												</div>
											</div>

											<hr style="color:white">



											<!-- ANNEE DE FABRICATION -->
											<div class="col-md-12" id="annee_fabrication_box" style="display: none;">
												<div class="form-group">
													<select name="annee_fabrication" id="annee_fabrication" class="select-form">
													</select>
												</div>
											</div>

											<!-- CARBURANT -->
											<div class="col-md-12" id="carburant_box" style="display: none;">
												<div class="form-group row">
													<div class="col-md-3">Moteur :</div>
													<div class="form-check col-md-3 carburant_box_2">
														<input class="form-check-input" type="radio" name="type_moteur" id="type_moteur1" value="1">
														<label class="form-check-label" for="type_moteur1">
															Essence
														</label>
													</div>
													<div class="form-check col-md-3 carburant_box_2">
														<input class="form-check-input" type="radio" name="type_moteur" id="type_moteur2" value="2">
														<label class="form-check-label" for="type_moteur2">
															Diesel
														</label>
													</div>
													<div class="form-check col-md-3 carburant_box_2">
														<input class="form-check-input" type="radio" name="type_moteur" id="type_moteur2" value="3">
														<label class="form-check-label" for="type_moteur2">
															GPL
														</label>
													</div>
												</div>
											</div>

											<div class="col-md-12" id="bouton_box" style="display: none;">
												<div class="form-group">
													<input type="submit" value="SIMULER" class="btn btn-primary">
													<div class="submitting"></div>
												</div>


											</div>
									</form>
								</div>
							</div>

							<div style="height: 10px;">

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>
	</section>

	<!-- <script src="js/popper.js"></script>-->
	<script>
		var baseUrl = "<?php echo base_url(); ?>";
	</script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
	<!-- <script src="<?php echo base_url(); ?>assets/js_client/form_vehicule.js"></script> -->
	<script src="<?php echo base_url(); ?>assets/js_client/inscription_vehicule2.js"></script>



</body>

</html>