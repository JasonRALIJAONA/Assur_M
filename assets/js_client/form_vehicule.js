(function($) {

	"use strict";

  // Form
	var vehicule_form = function() {
		if ($('#contactForm').length > 0 ) {
			$( "#contactForm" ).validate( {
				rules: {
					type_vehicule:"required",
					marque: "required",
					num_plaque: {
						required: true,
						minlength: 7,
						maxlength: 7
					},
					puissance:{
						required: true,
						number:true
					}
				},
				messages: {
					type_vehicule: "Choisissez un type de vehicule",
					marque: "Choisissez un marque",
					num_plaque: {
						required: "Completer les numero de plaque",
						minlength: "Dois être au moins 7 caractères",
						maxlength: " Ne Dois pas dépasser 7 caractères"
					},
					puissance:{
						required: "Entrez une puissance",
						number:"La puissance doit être un nombre"
					}
				}
			}
		)}
	}
	vehicule_form();
})(jQuery);