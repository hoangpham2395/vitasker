$('#select_per_page').change(function() {
	var perPage = $('#select_per_page').val();
	var currentUrl = window.location.toString();

	page = new cutObjUrl('page', currentUrl);
	limit = new cutObjUrl('limit', page.objUrl);
	
	var url = makeUrl(limit.objUrl + '&limit=' + perPage);
	getData(url);
	return window.history.pushState("", "", url);
});

function makeUrl(url) {
	if (url.indexOf('?') > 0 || url.indexOf('&') <= 0) {
		return url;
	}
	return url.replace('&', '?');
}

function cutObjUrl(obj, url) {
	var result = {value: '', objUrl: url};
	obj = obj + '=';

	if (url.indexOf(obj) <= 0) {
		return result;
	}

	result.value = url.slice(url.indexOf(obj) + obj.length);
	result.objUrl = url.slice(0, url.indexOf(obj));
	return result;
}

// Pagination AJAX, don't reload page
$('body').on('click', '.pagination a', function(e) {
  // Prevent the link load page
  e.preventDefault();
  var url = $(this).attr('href');  
  getData(url);
  window.history.pushState("", "", url);
});

function getData(url) {
  $.ajax({
      url : url 
  }).done(function (data) {
      $('body').html(data);  
  }).fail(function () {
      alert('Data could not be loaded.');
  });
}
