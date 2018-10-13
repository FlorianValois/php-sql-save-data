// By Florian VALOIS

jQuery(document).ready(function ($) {

	// Save changes
	$('.formAjax').on('submit', function (e) {
		e.preventDefault();
      
        window.alert = function() {};
      
		var json = $(this).serializeArray();

		$.each(json, function (i, field) {
			$("#yolo").append(field.value + " ");
		});

		var postData = {
			action: 'wpk_saveData',
			data: json
		}
		$.ajax({
			type: "POST",
			dataType: "json",
			data: postData,
			url: wpk_ajax.ajaxurl,
			success: function (postData) {
				if (postData.update) {
					console.log('Sauvegardé !')
				}
			}
		});
	});

});
