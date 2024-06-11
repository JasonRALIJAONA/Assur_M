<!doctype html>
<html lang="en">

<head>
	<title>Inscription vehicule</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css_client/style_inscription.css">

</head>

	<?php echo $this->session->userdata('utilisateur') ?>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">ENREGISTREMENT DU VEHICULE</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-md-6 d-flex align-items-stretch" id="bloc1">
								<div class="contact-wrap w-100 p-md-5 p-4 py-5">
									<h3 class="mb-4">Information vehicule</h3>
									<div id="form-message-warning" class="mb-4"></div>
									<div id="form-message-success" class="mb-4">
										Your message was sent, thank you!
									</div>
									<form method="POST" id="contactForm" name="contactForm" class="contactForm" action="<?php echo site_url('vehicule_controller/enregistrer_vehicule'); ?>">
										<input type="hidden" name="id_utilisateur" value="<?= $this->session->userdata('utilisateur') ?>">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">

													<select name="type_vehicule" id="type_vehicule" class="select-form">
														<option value="" disabled selected >Selectionner un type de vehicule</option>
														<?php 
															foreach ($liste_type as $row) {
																?>
																<option value="<?= $row['id'] ?>"><?= $row['nom'] ?></option>
																<?php
															}
														?>
													</select>
												</div>
											</div>
											

											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="num_plaque" id="num_plaque" placeholder="Numéro de plaque">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="marque" id="num_plaque" placeholder="Marque">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="number" class="form-control" name="nombre_place" id="num_plaque" placeholder="Nombre de place" min="4" value="4">
												</div>
											</div>


											<div class="col-md-12">
												<div class="form-group">
													<input type="number" class="form-control" name="puissance" id="puissance" placeholder="Puissance administrative:" min="0">
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="ENREGISTRER" class="btn btn-primary">
													<div class="submitting"></div>
												</div>

											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-6 d-flex align-items-stretch">
								<div class="info-wrap w-100 p-md-5 p-4 py-5 img">
									<h3>Example d'information</h3>
									<p class="mb-4">Ci-dessous sont des exemples de suggestion de remplissage du formulaire </p>
									<div class="dbox w-100 d-flex align-items-start">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-map-marker"></span>
										</div>
										<div class="text pl-3">
											<p><span>Vehicule:</span> Voiture</p>
										</div>
									</div>
									<div class="dbox w-100 d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-phone"></span>
										</div>
										<div class="text pl-3">
											<p><span>Marque:</span> BMW </p>
										</div>
									</div>
									<div class="dbox w-100 d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-paper-plane"></span>
										</div>
										<div class="text pl-3">
											<p><span>Numero de plaque:</span> 2665TBG </p>
										</div>
									</div>
									<div class="dbox w-100 d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-globe"></span>
										</div>
										<div class="text pl-3">
											<p><span>Puissance administrative:</span> 23 chevaux ve fa tsy aiko </p>
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

	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<!-- <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script> -->
	<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js_client/form_vehicule.js"></script>

</body>

</html>