(function($) {

	"use strict";

	// Soumission du formulaire -> code de confirmation
	$(".form_multimedia").on("submit", async function(event) {
		// Empêcher la soumission normale du formulaire pour traiter la validation
		event.preventDefault();

		// Valider les deux formulaires
		$(".form_multimedia").validate().form();
		$(".form_perso").validate().form();

		// Valider le formulaire 1
		if ($('.form_multimedia').valid()) {
			
			await code_validation(); // Manapotra an'ilay code validation 
		}
	});
	
	

	// SweetAlert
	
	async function code_validation(params) {
		const { value: code } = await Swal.fire({
			title: "Validation",
			input: "text",
			inputLabel: "À: "+$("#email").val(),
			inputPlaceholder: "Saisissez le code de validation",
			confirmButtonColor: "#28a745", // Définir la couleur du bouton OK en vert
		  });
		  if (code) {
			Swal.fire(`Entered email: ${code}`);
		}	
	}
	
  // Form

	var inscription_multimedia = function () {
		if ($('.form_multimedia').length > 0 ) {
			$(".form_multimedia").validate( {
				rules: {
					
					num_tel:{
						required: true,
						number:true,
						minlength: 10,
						maxlength:10						
					},
					mdp:{
						required:true,
						minlength: 5
					},
					email:{
						required:true,
						email: true
					},
					confirm_mdp:{
						required:true,
						equalTo: "#mdp"
					}
				},
				messages: {
					
					num_tel:{
						required: "Saisissez votre numéro de téléphone",
						number:"Ceci doit contenir que des nombres",
						minlength: "Numéro trop court",
						maxlength:"Numéro trop long"
					},
					mdp:{
						required:"Creez un mot de passe",
						minlength: "Trop court"
					},
					confirm_mdp:{
						required:"Ressaisisez le mot de passe",
						equalTo: "Mot de passe incorrecte"
					},
					email:{
						required:"Entrez un email",
						email: "Entrez un email valide"
					},
				}
			}
		)}
	}

	var inscription_perso = function() {
		if ($('.form_perso').length > 0 ) {
			$(".form_perso" ).validate( {
				rules: {
					nom:"required",
					prenoms: "required",
					adresse: "required", 
					date:{
						required: true,
						date:true
					}
					
				},
				messages: {
					nom:"Veuillez saisir le nom",
					prenoms: "Votre prenoms s'il vous plaît",
					adresse: "Où habitez vous", 
					date:{
						required: "Quand êtes vous né",
						date:"Selectionner un vrai date"
					}
					
				}
			}
		)}
		
	}
	inscription_perso();
	inscription_multimedia();
	
})(jQuery);