(function ($) {

    "use strict";
    $("#contactForm").on("submit", async function (event) {
        event.preventDefault();
        $("#contactForm").validate().form();
        let result = await get_somme_payer();
        let exception;
    
        if (result.data.somme == 0) {
            exception = "Erreur lors du remplissage du formulaire";
            Swal.fire({
                icon: "error",
                title: 'Error!',
                text: `
                    ${exception}
                `,
                confirmButtonText: 'Ressayer'
            });
        } else {
            Swal.fire({
                title: "<strong><u>Demande confirmation</u></strong>",
                icon: "info",
                html: `
                    Voulez-vous accepter de payer la 
                    somme de <b>${result.data.somme.toLocaleString('fr-FR')} Ar </b>
                `,
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: `<i>Accepter</i>`,
                cancelButtonText: `<i>Annuler</i>`
            }).then(async (res) => {
                if (res.isConfirmed) {
                    var formData = $('#contactForm').serializeArray();
                    $.ajax({
                        url: baseUrl + 'vehicule_controller/confirmer_payement',
                        type: 'GET',
                        dataType: 'json',
                        data: $.param(formData),
                        beforeSend: function () {
                        },
                        success: function (response) {
                            exception = response.exception;
                            if (exception) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erreur!',
                                    text: 'Erreur lors du paiement.',
                                    footer: `<span>${exception}</span>`
                                });
                            } else {
                                window.location = baseUrl + "form_controller/accueil";
                            }
                        },
                        error: function (error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur!',
                                text: 'Erreur lors de la requête AJAX.'
                            });
                        }
                    });
                }
            }).catch((error) => {
                console.log(error);
            });
        }
    });
    
    async function get_somme_payer() {
        var formData = $('#contactForm').serialize();
        let sommeAndImmatriculation;
        console.log('Le form data ' + baseUrl);
        await $.ajax({
            url: baseUrl + 'vehicule_controller/get_argent_a_payer',
            dataType: 'json',
            type: 'GET',
            data: formData,

            beforeSend: function () {
                // console.log("Le data a envoyer "+$.param(combinedData),)
                // //$submit.css('display', 'block').text(waitText);
            },

            success: function (response) {

                console.log(response.data.somme);
                sommeAndImmatriculation = response;
            },

            error: function (error) {
                console.log('Erreur: ', error)
            }
        });
        return sommeAndImmatriculation;
    }

    // Form
    var payement_form = function () {
        if ($('#contactForm').length > 0) {

            $.validator.addMethod("phone_prefix", function (value, element) {
                return this.optional(element) || /^(032|033|038|034)\d+$/.test(value);
            });

            $("#contactForm").validate({


                rules: {
                    frequence: {
                        required: true,
                        number: true
                    },
                    operateur: {
                        required: true,
                        number: true,
                        range: [1, 4]
                    },
                    numero_tel: {
                        required: true,
                        phone_prefix: true,
                        minlength: 10,
                        maxlength: 10
                    },

                },
                messages: {
                    frequence: {
                        required: "Choisir une frequence",
                        number: "Valeur ne dois pas être modifier"
                    },
                    operateur: {
                        required: "Choisir une frequence",
                        number: "Valeur ne dois pas être modifier",
                        range: "Valeur ne dois pas être modifier"
                    },
                    numero_tel: {
                        required: "Entrez votre numéro telephone",
                        phone_prefix: "Doit être un numéro Malagasy ",
                        minlength: "Trop court",
                        maxlength: "Trop long"
                    },
                }
            }
            )
        }
    }
    payement_form();

})(jQuery);