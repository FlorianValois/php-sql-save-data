// By Florian VALOIS
jQuery(document).ready(function ($) {
	// Save changes
	$('.formAjax').on('submit', function (e) {
		e.preventDefault();
		var str = $(this);
		if (typeof (str) == "string") {
			//      str = str.replace(/&/g, "&amp;");
			str = str.replace(/"/g, "&quot;");
			str = str.replace(/'/g, "&#039;");
			str = str.replace(/</g, "&lt;");
			str = str.replace(/>/g, "&gt;");
		}
		var json = $(str).serializeArray();
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
					console.log('Sauvegardé !');
				}
			}
		});
	});
	$('#reset').on('click', function (e) {
		e.preventDefault();
		var postData = {
			action: 'wpk_resetData',
		}
		$.post({
			data: postData,
			url: wpk_ajax.ajaxurl,
			success: function (response) {}
		});
	});
	$('#export').on('click', function (e) {
		e.preventDefault();
		var postData = {
			action: 'wpk_exportData'
		}
		$.post({
			data: postData,
			url: wpk_ajax.ajaxurl,
			success: function (response) {
				$('#exportResult').text(response);
			}
		});
	});

	$('#importBtn').on('click', function (e) {
		e.preventDefault();
		var json = JSON.parse($('#importData').val());
		var postData = {
			action: 'wpk_importData',
			data: json
		}
		$.post({
			dataType: "json",
			data: postData,
			url: wpk_ajax.ajaxurl,
			success: function (postData) {
				if (postData.import === true) {
					$('#importTest').text('Importé !');
				}
			}
		});
	});
});
