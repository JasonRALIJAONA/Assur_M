document.addEventListener("DOMContentLoaded", function () {


    const radios = document.getElementsByName('assureur');
    const radios_carburants = document.getElementsByName('type_moteur');
    const carburant = document.getElementsByName('carburant_box');
    var box_usage = document.getElementById('box_usage');
    const annee_fabrication = document.getElementById('annee_fabrication_box');
    const option_annee_fabrication = document.getElementById('annee_fabrication');
    var id_assurance;


// ASSUREUR ON_CHANGE
    for (let radio of radios) {
        radio.addEventListener('change', function () {
            if (this.checked) {
                id_assurance = this.value;
                display_annee_fabrication(this.value);
                get_and_display_Usage();
            }
        });
    }

// CARBURANT ON_CHANGE
    for (let radio of radios_carburants) {
        radio.addEventListener('change', function () {
            // get_and_display_Usage();

        });
    }

// ANNEE FABRICATION ON_CHANGE
    


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
        console.log(liste_annee);

        for (let option of liste_annee) {
            let optionElement = document.createElement('option');
            optionElement.value = option.id;
            optionElement.textContent = option.debut + ' - ' + option.fin;
            annee_option.appendChild(optionElement);
        };

        annee_fabrication.style.display = 'block';
    }

    

    option_annee_fabrication.addEventListener('change', function () {
        // Faire apparaitre le carburant_box
        carburant.style.display = 'block';
    });

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
    function get_and_display_Usage() {
        var liste_usage = {};
        $.ajax({
            url: baseUrl + 'donnee_controller/get_usages',
            method: 'GET',
            data: {
                id_assureur: id_assurance
            },
            dataType: 'json',
            success: function (data) {
                liste_usage = data.liste_usage;
                display_usage(liste_usage);

            },
            error: function (xhr, status, error) {
                console.error('Erreur lors de la récupération des carburants:', status, error);
            }
        });

    }

    function display_usage(liste_usage) {

        
        for (let row of liste_usage) {
            console.log(row);
            var div = document.createElement('div');
            div.className = 'form-check col-md-5';

            var input = document.createElement('input');
            input.className = 'form-check-input';
            input.type = 'radio';
            input.name = 'mode_usage';
            input.id = 'mode_usage1';
            input.value = row['id'];
            input.setAttribute('data-bs-toggle', 'popover');
            input.setAttribute('data-bs-custom-class', 'custom-popover');
            input.setAttribute('data-bs-trigger', 'hover focus');

            var label = document.createElement('label');
            label.className = 'form-check-label';
            label.setAttribute('for', 'mode_usage1');
            label.textContent = row['nom'];

            div.appendChild(input);
            div.appendChild(label);

            box_usage.appendChild(div);

        };
    }





});