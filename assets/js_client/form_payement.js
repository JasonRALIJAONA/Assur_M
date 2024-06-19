(function($) {

	"use strict";
    $("#contactForm").on("submit", async function(event) {
        event.preventDefault();
        $("#contactForm").validate().form();
        let result = await get_somme_payer();
        
        if (result.somme==0) {
            exception = "Erreur lors du remplissage du formulaire";
            Swal.fire({
                icon:"error",
                title: 'Error!',
                text: `
                    ${exception}
                `,
                icon: 'error',
                confirmButtonText: 'Ressayer'
            
            })            
        }
        else{
            Swal.fire({
                title: "<strong><u>Demande confirmation</u></strong>",
                icon: "info",
                html: `
                    Voulez vous accepter de payer la 
                  somme de <b>${result.somme} Ar </b>
                `,
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: `
                  <i>Accepter</i> 
                `,
    
                cancelButtonText: `
                  <i> Annuler </i>
                `
              }).then((result) => {
                // Ici, result est un objet qui contient des informations sur la réponse de l'utilisateur.
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'confirmer_payement',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            immatriculation:result.immatriculation,
                            somme:result.somme
                        },
                        
                        beforeSend: function() { 
                            
                        },
                        
                        success: function(response) {
                            window.location = "http://localhost:8000/S4/Assur_M/form_controller/acceuil";
                        },
            
                        error: function(error) {
                            
                        }
                    });
                    
                }
            }).catch(() => {
                console.log('L\'utilisateur a cliqué sur le bouton d\'annulation.');
                // Ajoutez ici le code à exécuter si l'utilisateur annule.
            });     
        }
    });
    async function get_somme_payer() {
        var formData = $('#contactForm').serialize();
        let sommeAndImmatriculation;
        console.log('Le form data ',formData);
        await $.ajax({
			url: 'argent_a_payer',
			type: 'GET',
			data: formData,
            
			beforeSend: function() { 
				// console.log("Le data a envoyer "+$.param(combinedData),)
				// //$submit.css('display', 'block').text(waitText);
			},
            
			success: function(response) {
				
				console.log(response);
                sommeAndImmatriculation = response;  
            },

			error: function(error) {
				console.log('Erreur: ',error)
			}
		});
        return sommeAndImmatriculation;
    }

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