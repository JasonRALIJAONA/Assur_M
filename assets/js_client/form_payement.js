(function($) {

	"use strict";

  // Form
	var payement_form = function() {
		if ($('#contactForm').length > 0 ) {

            $.validator.addMethod("phone_prefix", function(value, element) {
                return this.optional(element) || /^(032|033|038|034)\d+$/.test(value);
            });

			$( "#contactForm" ).validate( {


				rules: {
					frequence:{
                        required:true,
                        number:true,
                        range: [1, 4]
                    },
                    operateur:{
                        required:true,
                        number:true,
                        range: [1, 4]
                    },
					numero_tel: {
						required: true,
                        phone_prefix : true,
						minlength: 10,
						maxlength: 10
					},
					
				},
				messages: {
					frequence:{
                        required:"Choisir une frequence",
                        number:"Valeur ne dois pas être modifier",
                        range:"Valeur ne dois pas être modifier"
                    },
                    operateur:{
                        required:"Choisir une frequence",
                        number:"Valeur ne dois pas être modifier",
                        range: "Valeur ne dois pas être modifier"
                    },
					numero_tel: {
						required: "Entrez votre numéro telephone",
                        phone_prefix : "Doit être un numéro Malagasy ",
						minlength: "Trop court",
						maxlength: "Trop long"
					},
				}
			}
		)}
	}
	payement_form();
})(jQuery);