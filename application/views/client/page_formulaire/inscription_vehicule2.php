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
					<h2 class="heading-section">ENREGISTREMENT DU VEHICULE</h2>
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

											<!-- ANNEE DE FABRICATION -->
											<div class="col-md-12" id="annee_fabrication_input" style="display: none;">
												<div class="form-group">

													<select name="annee_fabrication" id="annee_fabrication" class="select-form">


													</select>
												</div>
											</div>

											<!-- CARBURANT -->
											<div class="col-md-12">
												<div class="form-group row">
													<div class="col-md-4">Moteur :</div>
													<div class="form-check col-md-4">
														<input class="form-check-input" type="radio" name="type_moteur" id="type_moteur1">
														<label class="form-check-label" for="type_moteur1">
															Essence
														</label>
													</div>
													<div class="form-check col-md-4">
														<input class="form-check-input" type="radio" name="type_moteur" id="type_moteur2" checked>
														<label class="form-check-label" for="type_moteur2">
															Diesel
														</label>
													</div>
												</div>
											</div>
											<hr style="color:white">
											<!-- MODE D'USAGE -->
											<div class="col-md-12">
												<div class="form-group row">
													<div class="col-md-12" style="color:white;">Mode d'usage :</div>
													<div class="form-check col-md-5">
														<input class="form-check-input" type="radio" name="mode_usage" id="mode_usage1" data-bs-toggle="popover" data-bs-custom-class='custom-popover' data-bs-trigger="hover focus">
														<label class="form-check-label" for="mode_usage1">
															Transport
														</label>
													</div>
													<div class="form-check col-md-5">
														<input class="form-check-input" type="radio" name="mode_usage" id="mode_usage2" data-bs-toggle="popover" data-bs-custom-class='custom-popover' data-bs-trigger="hover focus">
														<label class="form-check-label" for="mode_usage2">
															Personnel
														</label>
													</div>
													<div class="form-check col-md-5">
														<input class="form-check-input" type="radio" name="mode_usage" id="mode_usage3" data-bs-toggle="popover" data-bs-custom-class='custom-popover' data-bs-trigger="hover focus">
														<label class="form-check-label" for="mode_usage3">
															mode_usage3
														</label>
													</div>
													<div class="form-check col-md-5">
														<input class="form-check-input" type="radio" name="mode_usage" id="mode_usage4" data-bs-toggle="popover" data-bs-custom-class='custom-popover' data-bs-trigger="hover focus">
														<label class="form-check-label" for="mode_usage4">
															mode_usage4
														</label>
													</div>
													<div class="form-check col-md-5">
														<input class="form-check-input" type="radio" name="mode_usage" id="mode_usage5" data-bs-toggle="popover" data-bs-custom-class='custom-popover' data-bs-trigger="hover focus">
														<label class="form-check-label" for="mode_usage5">
															mode_usage5
														</label>
													</div>
												</div>
											</div>

											<hr style="color:white">

											<div class="col-md-12">
												<div class="form-group row">
													<div class="col-md-12" style="color:white;">Options :</div>
													<div class="form-check col-md-5">
														<input class="form-check-input" type="radio" name="cotisation" id="cotisation1" data-bs-toggle="popover" data-bs-custom-class='custom-popover_cotisation' data-bs-trigger="hover focus">
														<label class="form-check-label" for="cotisation1">
															Cotisation 1
														</label>
													</div>

													<div class="form-check col-md-5">
														<input class="form-check-input" type="radio" name="cotisation" id="cotisation2" data-bs-toggle="popover" data-bs-custom-class='custom-popover_cotisation' data-bs-trigger="hover focus">
														<label class="form-check-label" for="cotisation2">
															Cotisation 2
														</label>
													</div>

													<div class="form-check col-md-5">
														<input class="form-check-input" type="radio" name="cotisation" id="cotisation3" data-bs-toggle="popover" data-bs-custom-class='custom-popover_cotisation' data-bs-trigger="hover focus">
														<label class="form-check-label" for="cotisation3">
															Cotisation 3
														</label>
													</div>

													<div class="form-check col-md-5">
														<input class="form-check-input" type="radio" name="cotisation" id="cotisation4" data-bs-toggle="popover" data-bs-custom-class='custom-popover_cotisation' data-bs-trigger="hover focus">
														<label class="form-check-label" for="cotisation4">
															Cotisation 4
														</label>
													</div>

												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="ENREGISTRER" class="btn btn-primary">
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

	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<!-- <script src="js/popper.js"></script>-->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js_client/form_vehicule.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			const radios = document.getElementsByName('assureur');
			for (let radio of radios) {
				radio.addEventListener('change', function() {
					if (this.checked) {
						display_annee_fabrication(this.value);
					}
				});
			}

			// FAIRE APPARAITRE LE CHAMP ANNEE DE FABRICATION:
			const annee_fabrication = document.getElementById('annee_fabrication_input');

			function display_annee_fabrication(id_assurance) {
				var liste_annee = {};
				baseUrl = '<?= base_url() ?>';
				$.ajax({
					url: baseUrl + 'get_annee_fabrication',
					method: 'GET',
					data: {
						id_assureur: id_assurance
					},
					dataType: 'json',
					success: function(data) {
						liste_annee = data.liste_annee;
						update_option(liste_annee);
					},
					error: function(xhr, status, error) {
						console.error('Erreur lors de la récupération des années de fabrication:', status, error);
					}
				});
				
			}

			function update_option(liste_annee) {

				
				let annee_option = document.getElementById('annee_fabrication');
				annee_option.innerHTML = '';
				
				let optionVide = document.createElement('option');
				optionVide.value = '';
				optionVide.textContent = 'Sélectionner une année de fabrication';
				annee_option.appendChild(optionVide);
				console.log(liste_annee);
				
				for (let option of liste_annee) {
						let optionElement = document.createElement('option');
					optionElement.value = option.id;
					optionElement.textContent = option.debut + ' - ' + option.fin;
					annee_option.appendChild(optionElement);
				};
				
				annee_fabrication.style.display = 'block';
			} 



		});
	</script>

</body>

</html>