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

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
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
				<div class="col-lg-10" style="display:flex;">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-md-6 d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4 py-5">
									<h3 class="mb-4">Information vehicule</h3>
									<div id="form-message-warning" class="mb-4"></div>
									<div id="form-message-success" class="mb-4">
										Your message was sent, thank you!
									</div>
									<form method="POST" id="contactForm" name="contactForm" class="contactForm formulaire" action="#">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">

													<select name="type_vehicule" id="type_vehicule" class="select-form">
														<option value="" selected disabled>Selectionner un type vehicule</option>
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
													<select id="marque" name="marque" class="select-form" required>
														<option value="" disabled selected> Selectionner une marque </option>
														<option value="Toyota">Toyota</option>
														<option value="Ford">Ford</option>
														<option value="Honda">Honda</option>
														<option value="Chevrolet">Chevrolet</option>
														<option value="Nissan">Nissan</option>
														<option value="BMW">BMW</option>
														<option value="Mercedes-Benz">Mercedes-Benz</option>
														<option value="Volkswagen">Volkswagen</option>
														<option value="Audi">Audi</option>
														<option value="Hyundai">Hyundai</option>
														<option value="Kia">Kia</option>
														<option value="Mazda">Mazda</option>
														<option value="Subaru">Subaru</option>
														<option value="Lexus">Lexus</option>
														<option value="Jaguar">Jaguar</option>
														<option value="Porsche">Porsche</option>
														<option value="Ferrari">Ferrari</option>
														<option value="Lamborghini">Lamborghini</option>
														<option value="Tesla">Tesla</option>
														<option value="Peugeot">Peugeot</option>
														<option value="Renault">Renault</option>
														<option value="Citroën">Citroën</option>
														<option value="Fiat">Fiat</option>
														<option value="Alfa Romeo">Alfa Romeo</option>
														<option value="Mitsubishi">Mitsubishi</option>
														<option value="Suzuki">Suzuki</option>

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
													<input type="number" class="form-control" name="puissance" id="puissance" placeholder="Puissance administrative:">
												</div>
											</div>


											<div class="col-md-12">
												<div class="form-group">
													<input type="number" class="form-control" name="place" id="place" placeholder="Nombre de place:">
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="SUIVANT" class="btn btn-primary">
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
											<p><span>Puissance administrative:</span> 23</p>
										</div>
									</div>
									<div style="height: 10px;">

									</div>
								</div>
							</div>
						</div>
					</div> <!--  fin wrapper -->



				</div>
			</div>
		</div>
	</section>

	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<!-- <script src="js/popper.js"></script>-->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.js"></script>
	<script>
		var baseUrl = "<?php echo base_url(); ?>";
	</script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js_client/form_vehicule.js"></script>
	<script>
		(function($) {
			console.log("working");
			$(".formulaire").on("submit", async function(event) {
				event.preventDefault();
				console.log("huhu");

				$(".formulaire").validate().form();
				let exception;
				try {
					await valider_formulaire();
				} catch (error) {
					Swal.fire({
						icon: "error",
						text: error
					});
					return;
				}
				setTimeout(() => {
					window.location = baseUrl + 'form_controller/insert_vehicule_2';

				}, 1000);
			});

			async function valider_formulaire() {
				var prix;
				var exception;
				var formData = $('.contactForm').serializeArray();

				await $.ajax({
					url: baseUrl + 'form_controller/inscription_vehicule_page1',
					type: 'POST',
					dataType: 'json',
					data: $.param(formData),
					success: function(response) {
						exception = response.exception;
					},
				});

				if (exception) {
					throw new Error(exception);
				}

				return prix;
			}
		})(jQuery);
	</script>

</body>

</html>