//Map Generator - Written by: Trent Durfee 08/06/2012
//This is the main file that creates the map and inserts it, 
//perhaps this logic should be in a controller, in a class, with a model used to create/modify the data?
	
	/*function displayPoint(marker, index){
		var markerOffset = map.fromLatLngToDivPixel(marker.getLatLng());
		alert(marker.getLatLng());
		
		$("#message").fadeIn().css({ top:markerOffset.y, left:markerOffset.x });
		map.panTo(marker.getLatLng());
	}*/
	
function setSlidingPanel(container, map, offlineMode)
{
	var control = this;
    control.isOpen = false;
	
	var createPanel = document.createElement('div');
	createPanel.id = 'listingsPane';
	createPanel.style.width = '50px';
	createPanel.style.height = '50px';
	
	container.appendChild(createPanel);
	
	var toggleBtn = document.createElement('div');
    toggleBtn.id = 'openrentals';
	//toggleBtn.type = 'button';
    //toggleBtn.value = '>>';
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
			"marginLeft": "-255px", "height" : "50px", "width" : "300px"},
			{			
				duration: 500,
				step: function() {
				google.maps.event.trigger(map, 'resize');
					$('#listContent').css('display','none');
					toggleBtn.value = '>>';
					$("#controls").css('display','none');
					//$("#listingsPane").mCustomScrollbar("update");
				}
			});
			
			control.isOpen = false;
			toggleBtn.innerHTML = '<img src="../assets/img/search-icon.jpg" />';
			} else {
				$("#listingsPane").animate({
					"marginLeft": "0px", "height" : "900px", "width" : "100%"}, 
				{
					duration: 500,
					step: function() {
						google.maps.event.trigger(map, 'resize');
						$('#listContent').css('display','inline');
						//$("#content").css('margin','50px auto');
						$("#controls").css('display','inline');
						//$("#listingsPane").mCustomScrollbar("update");
					}
				});
					control.isOpen = true;
					toggleBtn.innerHTML = '<img src="../assets/img/search-icon.jpg" />';
				};	
		});
}

	var map;		
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
			
		map = new google.maps.Map(document.getElementById("rentsignal_map"),mapOptions);
		
		var slidingPanel = document.createElement('div');

		slidingPanel.style.width = '100%';
		slidingPanel.id = 'slider';
		slidingPanel.style.zIndex  = '100';
		setSlidingPanel(slidingPanel, map);
		
		slidingPanel.index = -700;
		slidingPanel.margin = '50px';

		map.controls[google.maps.ControlPosition.TOP_RIGHT].push(slidingPanel);
		$('.gmnoprint').first().css('margin-top','50px');
	}
	
	function createMarkers(len,data)
	{	
			var markerIcon = "../assets/img/home-marker.png";
			var markerImage = new google.maps.MarkerImage(markerIcon, new google.maps.Size(50, 50));

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

			for (var i=0; i < len; i++){
				var mLatLng = new google.maps.LatLng(data[i].rentals.lat,data[i].rentals.lng);
				var marker = new google.maps.Marker({"position": mLatLng, icon: markerImage, title: data[i].rentals.location, animation: google.maps.Animation.DROP}); 
				
				contents = data[i].rentals.description;

				markers[i] = marker;
				attachInfo(markers, contents, i, len);
			}

			var mclusters = new MarkerClusterer(map, markers, mcOptions);
			var totalMarkers = mclusters.getTotalMarkers();

			if(totalMarkers > 1)
			{
				while(markers[0]){
  				 markers.pop().setMap(null);
  				}
			
				mclusters = new MarkerClusterer(map, markers, mcOptions);
				//getDistance(data);
				markers.push(marker);
			}
			else
			{
				mclusters = new MarkerClusterer(map, markers, mcOptions);
				//getDistance(data);
				markers.push(marker);
			}
		
			//mclusters.clearMarkers(map);
		};

	function attachInfo(markers, contents, num, len)
	{
		var offsetTop = '300px';
		var offsetLeft = '200px';

		infoBubbleContent = new InfoBubble({
			shadowStyle: 1,
			className: 'infoCon',
			padding: 0,
			color: 'rgb(255,255,240)',
			content : contents,
			backgroundColor: 'rgb(223, 223, 223)',
			borderRadius: 4,
			height:  300,
			width: '300px',
			arrowSize: 10,
			borderWidth: 1,
			borderColor: '#2c2c2c',
			disableAutoPan: false,
			marginLeft: offsetLeft,
			marginTop: offsetTop
		});
		$("infoBubbleContent").addClass('infoCon');
		//console.log('marker length is: ' + len);
			google.maps.event.addListener(markers[num], "click", function () {
				//console.log('bubble content should be: ' + contents);
				if(infoBubbleContent.isOpen())
				{
						infoBubbleContent.close();
						infoBubbleContent.setMaxWidth('800px');
						infoBubbleContent.setMaxHeight('800px');
						infoBubbleContent.content = contents;
						infoBubbleContent.open(map, this);
						$(".infoCon").css('width', '930px');
						$(".infoCon").css('height', '370px');
						$(".infoCon").css('margin-left', '-120px');
					}
					else
					{
						infoBubbleContent.content = contents;
						infoBubbleContent.open(map, this);
						$(".infoCon").css('width', '930px');
						$(".infoCon").css('height', '370px');
						$(".infoCon").css('margin-left', '-120px');
					}
			});
	}

	function getDistance(data)
	{
		//calculate distance between each point on the map and display appropriately.
		
		var R = 6371; // km
		
		for(x=0;x<data.length-1;x++)
		{
				var dLat = toRad(data[x].rentals.lat - data[x+1].rentals.lat);
				var dLon = toRad(data[x].rentals.lng - data[x+1].rentals.lng);
				var lat1 = toRad(data[x].rentals.lat);
				var lat2 = toRad(data[x+1].rentals.lat);

				var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
					Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2); 
				var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
				var d = R * c;
			
				//alert('distance between ' + data[x].rentals.location + ' and ' + data[x+1].rentals.location + ' is ' + Math.round(d) + 'km');
		}
	}

	function toRad(value)
	{
	return value * Math.PI / 180;
		/** Converts numeric degrees to radians */
		/*if (typeof(Number.prototype.toRad) === "undefined") {
		  Number.prototype.toRad = function() {
			return this * Math.PI / 180;
		  }
		}*/
	}
	
	function clearMarkers(markers)
	{
		if(markers != 'null' || markers != '' || markers.length != 0)
		{
			/*clear markers from map and then add new ones
			probably need to also check and see if markers exist, if so check for matches/duplicates and then only add new ones, would likely
			save processing time and also be cleaner
			*/
			for (var i = 0; i < markers.length; i++ ) {
    			markers[i].setMap(null);
  			}
		}
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