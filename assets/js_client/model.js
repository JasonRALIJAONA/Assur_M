(function($) {

    $('#nav-toggle').on('click', function() {
        
        if ($(this).is(':checked')) {
            $("#content-model").css("transition","0.25s");
            $("#content-model").css("transform","translateX(-169px)");
            console.log("checked");
        } else {
            $("#content-model").css("transition","0.25s");
            $("#content-model").css("transform","translate(0px)");
            console.log("Non checked");
        }
    });

    /* Pour le scroll */
    // Obtenez le bouton
    let btn_scroll = document.getElementById('btn_on_scroll');

    // Affichez le bouton lorsque l'utilisateur fait défiler la page d'au moins 20px
    window.onscroll = function() {
    scrollFunction();
    };

    function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        btn_scroll.style.display = "block";
    } else {
        btn_scroll.style.display = "none";
    }
    }

    // Ramenez la page au début lorsque le bouton est cliqué
    btn_scroll.addEventListener("click", function() {
    document.body.scrollTop = 0; // Pour les anciens navigateurs
    document.documentElement.scrollTop = 0; // Pour les nouveaux navigateurs
    });

} )(jQuery);