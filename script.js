// By Florian VALOIS

jQuery(document).ready(function ($) {

//	function getFormData($form, no_empty) {
//		var formData = $('.formAjax').serializeArray();
//		var formData_array = {};
//		$.each(formData, function (i, item) {
//			formData_array[item['name']] = item['value'];
//		});
//		if (no_empty) {
//			$.each(formData_array, function (key, value) {
//				if ($.trim(value) === "" || $.trim(value) === "0") delete formData_array[key];
//			});
//		}
//		return formData_array;
//	}
	// Save changes
	$('.formAjax').on('submit', function (e) {		
		e.preventDefault();

//		var json = $.param(getFormData($(this), true));
		var json = $(this).serializeArray();
//		var json = $('#save-test').serialize();
		
		$.each( json, function( i, field ) {
      $( "#yolo" ).append( field.value + " " );
    });
		
		var postData = {
			action: 'wpk_saveData',
			data: json
		}
		console.log(json);
		$.ajax({
			type: "POST",
			data: postData,
			dataType: "json",
			url: wpk_ajax.ajaxurl,
			success: function () {
			}
		});
	});

});
