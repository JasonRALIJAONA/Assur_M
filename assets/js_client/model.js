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

} )(jQuery);