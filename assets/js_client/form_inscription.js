(function ($) {

	"use strict";

	// Soumission du formulaire -> code de confirmation
	$(".form_multimedia").on("submit", async function (event) {
		// Empêcher la soumission normale du formulaire pour traiter la validation
		event.preventDefault();

		// Valider les deux formulaires
		$(".form_multimedia").validate().form();
		$(".form_perso").validate().form();

		// Valider le formulaire 1
		if ($('.form_multimedia').valid()) {
			let exception = await check_inscription();
			console.log("exceptionnn : ", exception);
			if (exception) {
				Swal.fire({
					icon: "error",
					title: 'Error!',
					text: `
						${exception}
                    `,
					icon: 'error',
					confirmButtonText: 'Ressayer'

				})
			}
			else {
				let code = await get_code_validation();
				console.log(code);
				await check_code_validation(code); // Manapotra an'ilay code validation 	
			}

		}
	});

	// Ajax
	async function check_inscription() {
		// Récupérer les données des deux formulaires
		var formData1 = $('.form_multimedia').serializeArray();
		var formData2 = $('.form_perso').serializeArray();

		// Combiner les données
		var combinedData = formData1.concat(formData2);
		let exception = "";
		await $.ajax({
			url: 'check_inscription',
			type: 'POST',
			dataType: 'json',
			data: $.param(combinedData),

			beforeSend: function () {
				// console.log("Le data a envoyer "+$.param(combinedData),)
				// //$submit.css('display', 'block').text(waitText);
			},

			success: function (response) {
				console.log("exceptionnFonc : ", response.exception);
				exception = response.exception;

			},

			error: function (error) {

				console.log('Erreur: ', error)
			}
		});
		return exception;
	}

	async function get_code_validation() {
		var formData1 = $('.form_multimedia').serializeArray();
		var formData2 = $('.form_perso').serializeArray();
		var combined = formData1.concat(formData2);
		let code = "";
		await $.ajax({
			url: 'getCodeValidation',
			type: 'GET',
			dataType: 'json',
			data: $.param(combined),

			success: function (response) {
				if (response.status === 'success') {
					code = response.code;
				} else {
					
					console.error('Erreur: ' + response.status + response.message);
					Swal.fire("Erreur", response.message, "error");
				}
			},

			error: function (jqXHR, textStatus, errorThrown) {
				console.error('Erreur dans get_code_validation(): ' + jqXHR.responseText);
				let errorMsg;
				try {
					const response = JSON.parse(jqXHR.responseText);
					errorMsg = response.message || 'Une erreur inattendue est survenue.';
				} catch (e) {
					errorMsg = 'Une erreur inattendue est survenue.';
				}
				Swal.fire("Erreur", errorMsg, "error");
			}
		});
		return code;
	}

	// SweetAlert


	async function check_code_validation(validation) {
		console.log(validation);
		const { value: code } = await Swal.fire({
			title: "Validation",
			input: "text",
			inputLabel: "À: " + $("#email").val(),
			inputPlaceholder: "Saisissez le code de validation",
			confirmButtonColor: "#28a745", // Définir la couleur du bouton OK en vert
			inputValidator: (value) => {
				return new Promise((resolve) => {
					if (value == validation) {
						inscire_utilisateur();
						resolve();
					}
					else {
						resolve('Le code est incorrecte!!');
					}
				});

			}
		});
		if (code == validation) {
			Swal.fire("Bienvenue : " + $("#nom").val() + "	" + $("#prenoms").val());
			setTimeout(() => {
				window.location = "accueil";

			}, 1000);
		}
	}

	// Form

	var inscription_multimedia = function () {
		if ($('.form_multimedia').length > 0) {
			$.validator.addMethod("phone_prefix", function (value, element) {
				return this.optional(element) || /^(032|033|038|034)\d+$/.test(value);
			});

			$(".form_multimedia").validate({
				rules: {

					num_tel: {
						required: true,
						number: true,
						minlength: 10,
						maxlength: 10,
						phone_prefix: true,
					},
					mdp: {
						required: true,
						minlength: 5
					},
					email: {
						required: true,
						email: true
					},
					confirm_mdp: {
						required: true,
						equalTo: "#mdp"
					}
				},
				messages: {

					num_tel: {
						required: "Saisissez votre numéro de téléphone",
						number: "Ceci doit contenir que des nombres",
						minlength: "Numéro trop court",
						maxlength: "Numéro trop long",
						phone_prefix: "Doit être un numéro Malagasy "
					},
					mdp: {
						required: "Creez un mot de passe",
						minlength: "Trop court"
					},
					confirm_mdp: {
						required: "Ressaisisez le mot de passe",
						equalTo: "Mot de passe incorrecte"
					},
					email: {
						required: "Entrez un email",
						email: "Entrez un email valide"
					},
				}
			}
			)
		}
	}

	var inscription_perso = function () {
		if ($('.form_perso').length > 0) {
			$(".form_perso").validate({
				rules: {
					nom: "required",
					prenoms: "required",
					adresse: "required",
					date: {
						required: true,
						date: true
					}

				},
				messages: {
					nom: "Veuillez saisir le nom",
					prenoms: "Votre prenoms s'il vous plaît",
					adresse: "Où habitez vous",
					date: {
						required: "Quand êtes vous né",
						date: "Selectionner un vrai date"
					}

				}
			}
			)
		}

	}

	async function inscire_utilisateur() {
		console.log('enregistrement des donnees');
		var formData1 = $('.form_multimedia').serializeArray();
		var formData2 = $('.form_perso').serializeArray();
		var combined = formData1.concat(formData2);
		await $.ajax({
			url: 'enregistrer_utilisateur',
			type: 'POST',
			dataType: 'json',
			data: $.param(combined),

			success: function (response) {
				// code = response.code;
				console.log(response.nety);
				console.log(response.error);
			},

			error: function (jqXHR, textStatus, errorThrown) {
				console.log('Erreur dans get_code_validation(): ' + errorThrown);
			}
		});
	}

	inscription_perso();
	inscription_multimedia();

})(jQuery);