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
		
		console.log(postData);
		
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
	
	$('#reset').on('click', function(e){
		e.preventDefault();
		
		var postData = {
      action: 'wpk_resetData',
    }
		
		$.post({
      data: postData,
      url: wpk_ajax.ajaxurl,
      success: function (response) {
//        if (postData.reset) {
          console.log(response);
//        }
      }
    });
		
	});

});
