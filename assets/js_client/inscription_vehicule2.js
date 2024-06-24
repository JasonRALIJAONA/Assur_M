document.addEventListener("DOMContentLoaded", function () {


    const radios = document.getElementsByName('assureur');
    const radios_carburants = document.getElementsByName('type_moteur');
    const carburant = document.getElementById('carburant_box');
    var box_usage = document.getElementById('box_usage');
    var box_options = document.getElementById('box_options');
    const annee_fabrication = document.getElementById('annee_fabrication_box');
    const option_annee_fabrication = document.getElementById('annee_fabrication');
    var id_assurance;

    var liste_usage;
    var liste_options;


    // ASSUREUR ON_CHANGE
    for (let radio of radios) {
        radio.addEventListener('change', function () {
            if (this.checked) {
                id_assurance = this.value;
                display_annee_fabrication();
                get_options();
                get_Usage();

            }
        });
    }

    // ANNEE FABRICATION ON_CHANGE
    option_annee_fabrication.addEventListener('change', function () {
        // Faire apparaitre le carburant_box
        carburant.style.display = 'block';

    });

    // CARBURANT ON_CHANGE
    for (let radio of radios_carburants) {
        radio.addEventListener('change', function () {
            // SUBMIT BOUTON ACTIVER
            document.getElementById('bouton_box').style.display = 'block';
        });
    }




    // FAIRE APPARAITRE LE CHAMP ANNEE DE FABRICATION:


    function display_annee_fabrication() {
        var liste_annee = {};
        $.ajax({
            url: baseUrl + 'get_annee_fabrication',
            method: 'GET',
            data: {
                id_assureur: id_assurance
            },
            dataType: 'json',
            success: function (data) {
                liste_annee = data.liste_annee;
                update_option(liste_annee);
            },
            error: function (xhr, status, error) {
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

        for (let option of liste_annee) {
            let optionElement = document.createElement('option');
            optionElement.value = option.id;
            optionElement.textContent = option.debut + ' - ' + option.fin;
            annee_option.appendChild(optionElement);
        };

        annee_fabrication.style.display = 'block';
    }

    function display_carburant() {
        var liste_carburant = {};
        $.ajax({
            url: baseUrl + 'get_carburants',
            method: 'GET',
            data: {
                id_assureur: id_assurance
            },
            dataType: 'json',
            success: function (data) {
                liste_carburant = data.liste_carburant;
            },
            error: function (xhr, status, error) {
                console.error('Erreur lors de la récupération des carburants:', status, error);
            }
        });
    }

    // MAKA USAGE REHETRA
    function get_Usage() {
        $.ajax({
            url: baseUrl + 'donnee_controller/get_usages',
            method: 'GET',
            data: {
                id_assureur: id_assurance
            },
            dataType: 'json',
            success: function (data) {
                liste_usage = data.liste_usage;
                display_usage();

            },
            error: function (xhr, status, error) {
                console.error('Erreur lors de la récupération des carburants:', status, error);
            }
        });

    }

    function display_usage() {


        box_usage.style.display = 'block';
        box_usage.innerHTML = '';

        var dive = document.createElement('div');
        dive.className = 'col-md-12';

        dive.style.color = 'white';
        dive.textContent = 'Usage:';

        box_usage.appendChild(dive);

        for (let row of liste_usage) {
            var div = document.createElement('div');
            div.className = 'form-check col-md-5';

            var input = document.createElement('input');
            input.className = 'form-check-input';
            input.type = 'radio';
            input.name = 'mode_usage';
            input.id = 'mode_usage_' + row['id'];
            input.value = row['id'];
            input.togglePopover
            input.setAttribute('data-bs-toggle', 'popover');
            input.setAttribute('data-bs-custom-class', 'custom-popover');
            input.setAttribute('data-bs-trigger', 'hover');
            input.setAttribute('title', `<h3>${row['nom']}</h3>`);

            var popover = new bootstrap.Popover(input, {
                html: true
            });

            var label = document.createElement('label');
            label.className = 'form-check-label';
            label.setAttribute('for', 'mode_usage1');
            label.textContent = row['nom'];

            div.appendChild(input);
            div.appendChild(label);

            box_usage.appendChild(div);

        };
    }

    function get_options() {
        $.ajax({
            url: baseUrl + 'donnee_controller/get_options',
            method: 'GET',
            data: {
                id_assureur: id_assurance
            },
            dataType: 'json',
            success: function (data) {
                liste_options = data.liste_options;
                display_options();
            },
            error: function (xhr, status, error) {
                console.error('Erreur lors de la récupération des carburants:', status, error);
            }
        });
    }
    
    

    function display_options() {
        box_options.style.display = 'block';
        box_options.innerHTML = '';

        var dive = document.createElement('div');
        dive.className = 'col-md-12';

        dive.style.color = 'white';
        dive.textContent = 'Options';

        box_options.appendChild(dive);

        for (let row of liste_options) {
            var div = document.createElement('div');
            div.className = 'form-check col-md-5';

            var input = document.createElement('input');
            input.className = 'form-check-input';
            input.type = 'radio';
            input.name = 'option';
            input.id = 'cotisation1';
            input.value = row['id'];
            input.togglePopover
            input.setAttribute('data-bs-toggle', 'popover');
            input.setAttribute('data-bs-custom-class', 'custom-popover_cotisation');
            input.setAttribute('data-bs-trigger', 'hover');
            input.setAttribute('title', `<h3>${row['nom']}</h3>`);
            input.setAttribute("data-bs-content", `<p class="para3"><i>${row['descri']}</i></p>`);

            var popover = new bootstrap.Popover(input, {
                html: true
            });


            var label = document.createElement('label');
            label.className = 'form-check-label';
            label.setAttribute('for', 'cotisation1');
            label.textContent = row['nom'];
            
            div.appendChild(input);
            div.appendChild(label);

            box_options.appendChild(div);
        }
    }

    
    // *********************************************************************
    
});

(function ($) {
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var options={
        animation:true,
		html:true
		
	};
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl,options);
    });
    
    $(".contactForm").on("submit", async function (event) {
        event.preventDefault();

        $(".contactForm").validate().form();
        let prix;
        try {
            prix = await calculer_assurance();
        } catch (error) {
            Swal.fire({
                icon: "error",
                text: error
            });
            return;
        }
        Swal.fire({
            icon: "question",
            text: "Ce sera " + prix.toLocaleString('fr-FR') + " Ar par mois, enregistrer ?",
            showCancelButton: true,
            confirmButtonText: 'Enregistrer',
            cancelButtonText: 'Annuler'

        }).then(async (result) => {
            if (result.isConfirmed) {
                // Action à réaliser lorsque l'utilisateur clique sur "Oui"
                var is_simulation = await enregistrer(prix);
                console.log('salut les gens')
                setTimeout(() => {
                    window.location = "accueil";

                }, 1000);

                // Ajoutez ici le code pour enregistrer les données ou effectuer une action
            } else if (result.isDismissed) {
                // Action à réaliser lorsque l'utilisateur clique sur "Non"
                console.log("Utilisateur a annulé");
                // Ajoutez ici le code pour annuler l'enregistrement ou effectuer une autre action
            }
        });
    });

    async function calculer_assurance() {
        var prix;
        var exception;
        var formData = $('.contactForm').serializeArray();

        await $.ajax({
            url: baseUrl + 'form_controller/inscription_vehicule_page2',
            type: 'POST',
            dataType: 'json',
            data: $.param(formData),
            success: function (response) {
                prix = response.prix;
                exception = response.exception;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Gérer les erreurs de l'appel AJAX
                throw new Error(textStatus);
            }
        });

        if (exception) {
            throw new Error(exception);
        }

        return prix;
    }

    async function enregistrer(prix) {
        var prix;
        var formData = $('.contactForm').serializeArray();
        formData.push({ name: 'prix', value: prix });
        var is_simulation;
        await $.ajax({
            url: baseUrl + 'form_controller/inscrire_vehicule',
            type: 'POST',
            dataType: 'json',
            data: $.param(formData),

            success: function (response) {
                console.log('assureur ' + response.assureur);
                is_simulation = response.is_simulation;
                // prix = response.prix;
            }
        });
        return is_simulation;
    }

    async function verifier_vehicule() {
        
    }

})(jQuery);