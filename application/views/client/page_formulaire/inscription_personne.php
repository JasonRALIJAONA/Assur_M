<!doctype html>
<html lang="en">

<head>
	<title>Inscription personne</title>
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
					<h2 class="heading-section">INSCRIPTION</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-md-6 d-flex align-items-stretch" id="bloc1">
								<div class="contact-wrap w-100 p-md-5 p-4 py-5">
									<h3 class="mb-4">Information personnelle</h3>
									<div id="form-message-warning" class="mb-4"></div>

									<form method="POST" id="contactForm" name="contactForm" class="contactForm form_perso">
										<div class="row">

											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="nom" id="nom" placeholder="Nom">
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="prenoms" id="prenoms" placeholder="Prénoms">
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="adresse" id="adresse" placeholder="Adresse">
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">
													<input type="date" class="form-control" value="2004-05-31" name="date_naissance" id="date_naissance" placeholder="Date de naissance">
												</div>
											</div>


										</div>
									</form>
								</div>
							</div>
							<div class="col-md-6 d-flex align-items-stretch">
								<div class="info-wrap w-100 p-md-5 p-4 py-5 img">
									<h3 class="mb-4">Information multimedia</h3>
									<form method="POST" id="contactForm" name="contactForm" class="contactForm form_multimedia">
										<div class="row">

											<div class="col-md-12">
												<div class="form-group">
													<input type="number" class="form-control" name="num_tel" id="num_tel" placeholder="Numéro tel:">
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">
													<input type="email" class="form-control" name="email" id="email" placeholder="E-mail">
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">
													<input type="password" class="form-control" name="mdp" id="mdp" placeholder="Mot de passe">
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">
													<input type="password" class="form-control" name="confirm_mdp" id="confirm_mdp" placeholder="Confirmer mot de passe">
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="S'INCRIRE" class="btn btn-primary" style="margin-top: 15px;">
													<div class="submitting"></div>
												</div>

											</div>

									</form>
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
	<script src="<?php echo base_url(); ?>assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js_client/form_inscription.js"></script>

</body>

</html>