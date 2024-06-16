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

	var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
	var options={
		animation:true,
		html:true
		
	};
	$("#mode_usage1").attr('title','<h3>Mode usage 1</h3>');
	$("#mode_usage1").attr("data-bs-content",'<p class="para1"> <i> A propos de mode usage 1 </i></p>');
	
	$("#mode_usage2").attr('title','<h3>Mode usage 2</h3>');
	$("#mode_usage2").attr("data-bs-content",'<p class="para2"> <i> A propos de mode usage 2  </i></p>');

	$("#mode_usage3").attr('title','<h3>Mode usage 3</h3>');
	$("#mode_usage3").attr("data-bs-content",'<p class="para3"> <i> A propos de mode usage 3  </i></p>');

	$("#mode_usage4").attr('title','<h3>Mode usage 4</h3>');
	$("#mode_usage4").attr("data-bs-content",'<p class="para4"> <i> A propos de mode usage 4  </i></p>');

	$("#mode_usage5").attr('title','<h3>Mode usage 5</h3>');
	$("#mode_usage5").attr("data-bs-content",'<p class="para5"> <i> A propos de mode usage 5  </i></p>');

	/*-----------------------------------------------------------------*/
	$("#cotisation1").attr('title','<h3>Cotisation 1</h3>');
	$("#cotisation1").attr("data-bs-content",'<p class="para1"> <i> C\' est Madagascar </i></p>');
	
	$("#cotisation2").attr('title','<h3>Cotisation 2</h3>');
	$("#cotisation2").attr("data-bs-content",'<p class="para2"> <i> A propos de cotisation 2  </i></p>');

	$("#cotisation3").attr('title','<h3>Cotisation 3</h3>');
	$("#cotisation3").attr("data-bs-content",'<p class="para3"> <i> A propos de cotisation 3  </i></p>');

	$("#cotisation4").attr('title','<h3>Cotisation 4</h3>');
	$("#cotisation4").attr("data-bs-content",'<p class="para4"> <i> A propos de cotisation 4  </i></p>');
	

	var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
		return new bootstrap.Popover(popoverTriggerEl,options);
	})

	

})(jQuery);