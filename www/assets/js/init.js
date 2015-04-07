
function nextImage(pageNum)
{
	//$(".slider-content").animate({"margin-left":"-1200px"});
	$("#content").fadeOut("slow");
	$.ajax({
		type: "POST",
		url: "http://rentsignal.com/showlistings/getListings?page=" .$pageNum,
		accepts: "html",
		context: $('#content'),
		success: function(data) {
			$('#content').replaceWith(function() {
				return $(data).hide().fadeIn();
			});
		}
	});
	return false;
}

function prevImage(pageNum)
{
	$("#content").fadeOut("slow");
	$.ajax({
		type: "POST",
		url: "http://rentsignal.com/showlistings/getListings?page=" .$pageNum,
		accepts: "html",
		context: $('#content'),
		success: function(data) {
			$('#content').replaceWith(function() {
				return $(data).hide().fadeIn();
			});
		}
	});
	return false;
}

	var num = 50; //number of pixels before modifying styles

	$(window).bind('scroll', function () {
    	if ($(window).scrollTop() > num) {
        	$('#nav-bar').addClass('menufixed');
    	} else {
        	$('#nav-bar').removeClass('menufixed');
    	}
	});