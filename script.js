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
	function htmlspecialchars(str) {
		if (typeof (str) == "string") {
			str = str.replace(/&/g, "&amp;"); /* must do &amp; first */
			str = str.replace(/"/g, "&quot;");
			str = str.replace(/'/g, "&#039;");
			str = str.replace(/</g, "&lt;");
			str = str.replace(/>/g, "&gt;");
		}
		return str;
	}

	// Save changes
	$('.formAjax').on('submit', function (e) {
		e.preventDefault();
		var formSubmit = htmlspecialchars($('input'));
		console.log(formSubmit);
		//		var json = $.param(getFormData($(this), true));
		var json = $(this).serializeArray();
		//		var json = $('#save-test').serialize();

		$.each(json, function (i, field) {
			$("#yolo").append(field.value + " ");
		});

		var postData = {
			action: 'wpk_saveData',
			data: json
		}
		//		console.log(json);
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
