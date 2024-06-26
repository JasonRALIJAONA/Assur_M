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
					<h2 class="heading-section">Payement Assurance</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-md-6 d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4 py-5">
									<h3 class="mb-4">Pour le vehicule : ID:<?= $vehicule['id'] ?> Immatriculation: <?php echo $vehicule['immatriculation']; ?></h3>
									<div id="form-message-warning" class="mb-4"></div>

									<form method="POST" id="contactForm" name="contactForm" class="contactForm form_perso">
										<div class="row">

											<div class="col-md-12">
												<div class="form-group">
													<select name="frequence" id="frequence" placeholder="Frequence de paiement" class="select-form">
														<option value="" selected disabled>Frequence</option>
														<option value='1'>Mensuel</option>
														<option value='3'>Trimestriel</option>
														<option value='6'>Semestriel</option>
														<option value='12'>Annuel</option>
													</select>

												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">
													<select name="operateur" id="operateur" class="select-form" disabled>
														<?php
														foreach ($operateur as $row) {
															if ($row['id'] == $utilisateur->id_operateur) {
														?>
																<option value="<?= $row['id'] ?>" selected><?= $row['nom'] ?></option>
														<?php
															}
														}
														?>
													</select>

												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">
													<input type="number" value="<?= $utilisateur->telephone ?>" disabled class="form-control" name="numero_tel" id="numero_tel" placeholder="Numéro de telephone">
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Valider" class="btn btn-primary" style="margin-top: 15px;">
													<div class="submitting"></div>
												</div>

											</div>


										</div>
										<input type="hidden" name="id_vehicule" value="<?php echo $vehicule['id']; ?>">
									</form>
								</div>
							</div>
							<div class="col-md-6 d-flex align-items-stretch img_payement">
								<div style="position:relative;">
									<img src="<?php echo base_url("assets/img/AIRTEL.png"); ?>" alt="" class="airtel_money">
									<img src="<?php echo base_url("assets/img/MVOLA.png"); ?>" alt="" class="mvola">
									<img src="<?php echo base_url("assets/img/ORANGE.png"); ?>" alt="" id="" class="orange_money">

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
	<script src="<?php echo base_url(); ?>assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
	<script>
		baseUrl = "<?php echo base_url() ?>";
	</script>
	<script src="<?php echo base_url(); ?>assets/js_client/form_payement.js"></script>

</body>

</html>