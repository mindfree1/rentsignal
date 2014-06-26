<p>Hey, here are your listings</p>
<script>
//Map Generator - Written by: Trent Durfee 08/06/2012
//This is the main file that creates the map and inserts it, 
//perhaps this logic should be in a controller, in a class, with a model used to create/modify the data?
	

/*Logic being moved across, basically this is the View, the controller passes the data via the form _POST over to the ViewModel
the ViewModel should handle the data, not manipulate it though and then pass it over to the view, which would structure it in the Map as it should. Easy. Right.
*/

	function displayPoint(marker, index){
		var markerOffset = map.fromLatLngToDivPixel(marker.getLatLng());
		//alert(marker.getLatLng());
		
		//$("#message").fadeIn().css({ top:markerOffset.y, left:markerOffset.x });
		//map.panTo(marker.getLatLng());
	}
	
function setSlidingPanel(container, map, offlineMode)
{
	var control = this;
    control.isOpen = true;
	
	var createPanel = document.createElement('div');
	createPanel.id = 'listingsPane';
	createPanel.style.width = '300px';
	createPanel.style.height = '910px';
	
	container.appendChild(createPanel);
	
	var toggleBtn = document.createElement('input');
    toggleBtn.id = 'openrentals';
	toggleBtn.type = 'button';
    toggleBtn.value = '<<';
    createPanel.appendChild(toggleBtn);
	
	$("#listContent").show().animate({display :'inline'}, 500);
	
	/* (function($){
    $(window).load(function(){
      $("#content").mCustomScrollbar();
	  //$(".mCSB_dragger_bar").css('height','50px');
	  
      $("div[rel='with-custom-scrollbar']").mCustomScrollbar({
        autoDraggerLength:false,
		set_height:"45px",
		});
		});
	})(jQuery);*/

	$("#listContent").appendTo(createPanel);
					
	$('#openrentals').live('click', function() {
	if (control.isOpen) {
		$("#listingsPane").animate({
			"marginLeft": "-255px", "height": "50px"},
			{			
				duration: 500,
				step: function() {
				google.maps.event.trigger(map, 'resize');
					$('#listContent').css('display','none');
					//$("#listingsPane").mCustomScrollbar("update");
				}
			});
			
			control.isOpen = false;
			toggleBtn.value = '>>';
			} else {
				$("#listingsPane").animate({
					"marginLeft": "0px", "height" : "990px"}, 
				{
					duration: 500,
					step: function() {
						google.maps.event.trigger(map, 'resize');
						$('#listContent').css('display','inline');
						$("#content").css('margin','50px auto');
						//$("#listingsPane").mCustomScrollbar("update");
					}
				});
					control.isOpen = true;
					toggleBtn.value = '<<';
				};	
		});
}
		
function load_map(){

	var mapOptions = {
	center: new google.maps.LatLng(-33.880815,151.187791),
	zoom: 8,
	mapTypeId: google.maps.MapTypeId.ROADMAP,
	};

		var infoWindow = null;
		infowindow = new google.maps.InfoWindow({
        content: "loading...",
		maxWidth: 500 });
		
	var map = new google.maps.Map(document.getElementById("rentsignal_map"),mapOptions);
	
	var slidingPanel = document.createElement('div');
	setSlidingPanel(slidingPanel, map);
	
	slidingPanel.index = -500;
	map.controls[google.maps.ControlPosition.TOP_LEFT].push(slidingPanel);
		
	var markerIcon = "../public/assets/img/home-marker.png";
	var markerImage = new google.maps.MarkerImage(markerIcon, new google.maps.Size(50, 50));

	//House for rent in Glebe, super modern luxury converted terrace house, has pool - rent is $550pw
	var htmlContent = '<div id="richInfo"><div style="position:absolute; float:left; width: 400px; height:200px;"><img src="../public/assets/img/sydnenham-deg.jpg"></img></div><div id="richCon" style="float:right;width:300px;height:200px;"><p>Terrace house for rent, brand new complex, $900pw has all the luxuries one could want and in a prime location</p></div>';

	var infoContent = [{title: 'Mascot', content: '<div class="infoCon">' + 'House for rent in Mascot, rent is $250, modern place with sundrenched balcony, close to shops & train' + '</div>',},{ title: 'Glebe', content: '<div class="infoCon">' + 'House for rent in Glebe, super modern luxury converted terrace house, has pool - rent is $550pw' +'</div>',},{title: 'Sydnenham',content: '<div class="infoCon">' + htmlContent,},{title: 'Woy Woy',content: '<div class="infoCon">' + 'Nice place in Woy Woy if youd like to live here itll cost yas $40 per week' + '</div>'}];

	var markerStyles = [{
        url: markerIcon,
        height: 35,
        width: 35,
        anchor: [16, 0],
        textColor: '#ffffff',
        textSize: 10
      }];
		  //create map cluster markers here
		var mcOptions = {gridsize: 50, maxZoom: 15, styles: markerStyles};

		markers = [];

		for (var i=0; i<numcoords; i++){
			var mLatLng = new google.maps.LatLng(obj[i].lat, obj[i].lng);
			var marker = new google.maps.Marker({"position": mLatLng, icon: markerImage, title: infoContent[i].title, 	html: infoContent[i].content, animation: google.maps.Animation.DROP}); 

			//setupMarkers(markers,map);
			markers[i] = marker;
		
			$(".listitems").on("click",	function(){
				map.panTo(markers[i].getPosition());
			})
	
			var offsetTop = '-300px';
			var offsetLeft = '-200px';
			
			infoBubbleContent = new InfoBubble({
				shadowStyle: 1,
				className: 'test',
				padding: 0,
				color: 'rgb(255,255,240)',
				backgroundColor: 'rgb(57,57,57)',
				borderRadius: 4,
				arrowSize: 10,
				borderWidth: 1,
				borderColor: '#2c2c2c',
				disableAutoPan: true,
				marginLeft: offsetLeft,
				marginTop: offsetTop
			});

			google.maps.event.addListener(marker, "click", function () {
				if(infoBubbleContent.isOpen())
				{
					infoBubbleContent.close();
					infoBubbleContent.setMaxWidth(800);
					infoBubbleContent.setMaxHeight('800px');
					infoBubbleContent.content = this.html;
					infoBubbleContent.open(map, this);
					$(".infoCon").css('width', '930px');
					$(".infoCon").css('height', '370px');
					$(".infoCon").css('margin-left', '-120px');
				}
				else
				{
					infoBubbleContent.content = this.html;
					infoBubbleContent.open(map, this);
					$(".infoCon").css('width', '930px');
					$(".infoCon").css('height', '370px');
					$(".infoCon").css('margin-left', '-120px');
				}
			});
			markers.push(marker);
		}
		
		var mclusters = new MarkerClusterer(map, markers, mcOptions);
	}

function displayPoint(marker, index){
	$("#message").hide();
					
	var moveEnd = google.maps.event.addListener(map, "moveend", function(){
	var markerOffset = map.fromLatLngToDivPixel(marker.getLatLng());
	$("#message")
	.fadeIn()
	.css({ top:markerOffset.y, left:markerOffset.x });
		google.maps.event.removeListener(moveEnd);
	});
	map.panTo(marker.getLatLng());
}
</script>