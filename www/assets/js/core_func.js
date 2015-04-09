var starRating = {

	ul_classes: 'stars',
	rate_classes: 'rate-1 rate-2 rate-3 rate-4 rate-5',
	showHover: function(obj, event){
		var rel_class = $(obj).attr('rel');
		var ul_parent = $(obj).closest('ul');

		if(event.type == "mouseover"){
			this.ul_classes = ul_parent.attr('class');
			ul_parent.removeClass();
			ul_parent.removeClass(starRating.rate_classes);
			ul_parent.addClass('stars ' + rel_class);
		}else{
			ul_parent.attr('class', starRating.ul_classes);
		}
	},
	setRating: function(obj,event){
		var rel_class = $(obj).attr('rel');
    	if(event.type == "click"){
    		this.ul_classes = 'stars ' + rel_class;
    	}
	},
}

function hideiamges()
{
	alert('hello');
}

function validateSearch(validData)
{
		if(validData[0] == '' || null)
		{
			starMapped = '%';
		}
		else if(validData[1] == 'Any')
		{
			bathrooms = '%';
		}
		else if(validData[2] == ' Any')
		{
			bedrooms = '%';
		}
}

function get_starMappings(starClass)
{
	switch(starClass){
		case 'stars star-1':
			return 1;
			break;
		case 'stars star-2':
			return 2;
			break;
		case 'stars star-3':
			return 3;
			break;
		case 'stars star-4':
			return 4;
			break;
		case 'stars star-5':
			return 5;
			break;
		default:
			return null;
			break;
	}
}

$(document).ready(function() {
	$('.stars li a').live('mouseover mouseout', function(event) {
        starRating.showHover($(this), event);
    });

    $('.stars li a').live('click', function(event) {
		starRating.setRating($(this), event);
    });

    var num = 50; //number of pixels before modifying styles

	$(window).bind('scroll', function () {
    	if ($(window).scrollTop() > num) {
        	$('#nav-bar').addClass('menufixed');
    	} else {
        	$('#nav-bar').removeClass('menufixed');
    	}
	});
})