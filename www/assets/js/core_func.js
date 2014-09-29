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

$(document).ready(function() {
	$('.stars li a').live('mouseover mouseout', function(event) {
        starRating.showHover($(this), event);
    });

    $('.stars li a').live('click', function(event) {
		starRating.setRating($(this), event);
    });
})