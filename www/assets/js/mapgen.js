//Map Generator - Written by: Trent Durfee 08/06/2012
//This is the main file that creates the map and inserts it, 
//perhaps this logic should be in a controller, in a class, with a model used to create/modify the data?
	
	/*function displayPoint(marker, index){
		var markerOffset = map.fromLatLngToDivPixel(marker.getLatLng());
		alert(marker.getLatLng());
		
		$("#message").fadeIn().css({ top:markerOffset.y, left:markerOffset.x });
		map.panTo(marker.getLatLng());
	}*/
	
markerID = []; //globally remember markers on map

function setSlidingPanel(container, map, offlineMode)
{
	var control = this;
    control.isOpen = false;
	
	var createPanel = document.createElement('div');
	createPanel.id = 'listingsPane';
	createPanel.style.width = '50px';
	createPanel.style.height = '100px';
	
	container.appendChild(createPanel);
	
	var toggleBtnOne = document.createElement('div');
    toggleBtnOne.id = 'openrentals';

	var toggleBtnTwo = document.createElement('div');
	toggleBtnTwo.id = 'openfavourites';    

    createPanel.appendChild(toggleBtnOne);
    createPanel.appendChild(toggleBtnTwo);
	
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
					
	$(document).on("click", "#openrentals", function(){ 
	if (control.isOpen) {
		$("#listingsPane").animate({
			"marginLeft": "0px", "height" : "100px", "width" : "50px"},
			{			
				duration: 500,
				step: function() {
				google.maps.event.trigger(map, 'resize');
					$('#slider').css('width', '50px');
					$('#listContent').css('display','none');
					$('#openfavourites').css('visibililty', 'hidden');
					$("#controls").css('display','none');
					//$("#listingsPane").mCustomScrollbar("update");
				}
			});
			
			control.isOpen = false;
			} else {
				$("#listingsPane").animate({
					"marginLeft": "0px", "height" : "900px", "width" : "100%"}, 
				{
					duration: 500,
					step: function() {
						google.maps.event.trigger(map, 'resize');
						$('#listContent').css('display','inline');
						$('#openfavourites').css('visibililty', 'visible');
						$('#openfavourites').css('margin-top', '50px');
						$('#openfavourites').css('margin-right', '-50px');
						$('#slider').css('width', '100%');
						$("#controls").css('display','inline');
						//$("#listingsPane").mCustomScrollbar("update");
					}
				});
					control.isOpen = true;
				};	
		});
}

	var map;		
	function load_map(){
		
		var mapOptions = {
		center: new google.maps.LatLng(-33.880815,151.187791),
		zoom: 8,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		panControl: true,
		disableDefaultUI: true,
		//set to true if you want pan options
		panControl: false,
		panControlOptions: {
  			position: google.maps.ControlPosition.TOP_RIGHT
		},
		//set to true if you want zoom controls
		zoomControl: true,
			zoomControlOptions: {
  				style: google.maps.ZoomControlStyle.LARGE,
  				position: google.maps.ControlPosition.TOP_RIGHT
			}
		};

		var infoWindow = null;
		infowindow = new google.maps.InfoWindow({
        	content: "loading...",
		maxWidth: 500 });
			
		map = new google.maps.Map(document.getElementById("rentsignal_map"),mapOptions);
		var slidingPanel = document.createElement('div');

		slidingPanel.style.width = '50px';
		slidingPanel.id = 'slider';
		slidingPanel.style.zIndex  = '100';
		slidingPanel.left = '0px';
		slidingPanel.margin = '50px';
		setSlidingPanel(slidingPanel, map);
		slidingPanel.index = 1;

		map.controls[google.maps.ControlPosition.TOP_LEFT].push(slidingPanel);
		$('.gmnoprint').first().css('margin-top','150px');
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
			
			//var markerID = [];
			markers = [];

			/*for(i=0; i <len; i++)
			{
				markerID[i] = data[i].rentals.id;
				console.log('marker ID is currently: ' + markerID[i]);
			}*/

			//This is supposed to not add markers if they already exist but currently doesn't work. Not sure why yet.
			var mcOptions = {gridsize: 50, maxZoom: 15, styles: markerStyles};

			for(var i=1; i <= len; i++)
			{
				markerID[i] = markerID[i+1];
			}

			for(var i=0; i <len; i++)
			{
				if(markerID[i] == data[i].rentals.id)
				{
					markerID[i] = markerID[len+1];
					addMarkersToMap(markers, markerID[i], len, data, markerImage, markerIcon, mcOptions, markerStyles);
				}
				else
				{
					markerID[i] = i;
					addMarkersToMap(markers, markerID[i], len, data, markerImage, markerIcon, mcOptions, markerStyles);
				}
			}
	}

	function addMarkersToMap(markers, markerID, len, data, markerImage, markerIcon, mcOptions, markerStyles)
	{
		for (var i=0; i < len; i++)
		{
				var mLatLng = new google.maps.LatLng(data[i].rentals.lat,data[i].rentals.lng);
				var marker = new google.maps.Marker({"position": mLatLng, icon: markerImage, id: markerID[i], id: data[i].rentals.id ,title: data[i].rentals.location, animation: google.maps.Animation.DROP}); 

				contents = '<div id="contents" class="contents" style="width:1200px;height:1200px;left:-580px;z-index:10000;"></div>';

				/*for(var i=0;i<markersArray;i++)
				{
					var markerID = i;
				}*/

				//data[i].rental_images.url
				//loadOverlay();
				/*console.log(data[i].rentals.url);
				console.log(len);*/
				//if(!markers[i].isAdded)

				markers[i] = marker;
				attachInfo(markers, contents, i, len);
		}

		for(var i=0; i<len;i++)
		{
			if(!markerID[i])
			{
				var mclusters = new MarkerClusterer(map, markers, mcOptions);
			}
		}
		//var totalMarkers = mclusters.getTotalMarkers();

		//var markersArray = mclusters.getMarkers();
		//console.log('Markers added: ' + markers[1].isAdded);
	}

	function attachInfo(markers, contents, num, len)
	{
		var offsetTop = '400px';
		var offsetLeft = '100px';

		infoBubbleContent = new InfoBubble({
			shadowStyle: 1,
			className: 'infoCon',
			padding: 0,
			color: 'rgb(255,255,240)',
			content : contents,
			backgroundColor: 'rgb(223, 223, 223)',
			borderRadius: 4,
			arrowSize: 10,
			zIndex: 100000000,
			borderWidth: 1,
			borderColor: '#2c2c2c',
			disableAutoPan: false,
			marginLeft: offsetLeft,
			marginTop: offsetTop
		});
		//$("infoBubbleContent").addClass('infoCon');
		
		google.maps.event.addListener(markers[num], "click", function (evt) {
		
		var getLocation = $(this).attr('title');
		var rentsignal_id = $(this).attr('id');

		if(infoBubbleContent.isOpen())
		{
				//alert($(this).attr('title'));
				infoBubbleContent.close();
				$.ajax({
					type: "GET",
					url: "http://rentsignal.com/propertydetails",
					data: 'location=' + getLocation + '&id=' + rentsignal_id,
					dataType: "html",
					success: function(data) {
						contents = data;
						$("#contents").html(contents);
					},
					error: function()
					{
						console.log('view not returned');

					}
				});
				/*$(".infoCon").css('width', '930px');
				$(".infoCon").css('height', '370px');
				$(".infoCon").css('margin-left', '-120px');*/
				//$("#contents").load("http://rentsignal.com/propertydetails");
				//loadOverlay();
				infoBubbleContent.open(map, this);
			}
			else
			{
					$.ajax({
							type: "GET",
							url: "http://rentsignal.com/propertydetails",
							data: 'location=' + getLocation + '&id=' + rentsignal_id,
							dataType: "html",
							success: function(data) {
								contents = data;
								$("#contents").html(contents);
							},
							error: function()
							{
								console.log('view not returned');

							}
					});
				infoBubbleContent.open(map, this);
				/*$(".infoCon").css('width', '930px');
				$(".infoCon").css('height', '370px');
				$(".infoCon").css('margin-left', '-120px');*/
			}
		});
	}

	function getDistance(data)
	{
		//calculate distance between each point on the map and display appropriately.
		
		var R = 6371; // km circumfrence around the earth in kms
		
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
	
	function clearMarkers(markers, markerID)
	{
		if(markers != 'null' || markers != '' || markers.length != 0)
		{
			/*clear markers from map and then add new ones
			need to also check and see if markers exist, if so check for matches/duplicates and then only add new ones, would likely
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

$(document).ready(function() {
		//$("#overlaycontent").load("http://rentsignal.com/propertydetails");
	});