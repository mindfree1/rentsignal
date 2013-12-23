<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Rentsignal</title>
	<?php echo Asset::css(array('layout.css','map-styles.css','jquery-ui-1.8.21.custom.css')); ?>
	<?php echo Asset::js(array('jquery-1.7.2.js','markerclusterer.js','jquery-ui-1.8.21.js','infobubble.js','mapgen.js', 'angular.js')); ?>
	
	
<script>
$(document).ready(function() {
	load_map();
	
	$("#map-slider").slider({ 
		range: true,
		min:	0, 
		max:	1000,
		values: [300,700],
		slide: function(event, ui) {
				$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
			}
		});
		
		$("#amount").val("$" + $("#map-slider").slider("values", 0) +
				" - $" + $("#map-slider").slider("values", 1));
		
		$("#showhide_btn").live("click",function() {
			$("#controls").slideToggle("slow");
			$("#showhide_btn").text = 'Show Controls';
		});
	
	$("#content > ul:gt(0)").hide();
	
	$(".btnsubmit").click(function() {
	
		var searchlistings = "rentmin=" + $("#map-slider").slider("values", 0) + "&rentmax=" + 
		$("#map-slider").slider("values", 1) + "&rooms=" + $('#rooms option:selected').val() + "&bathrooms=" + 
		$('#bathrooms option:selected').val();
		
		$.ajax({
			type: "POST",
			url: "http://rentsignal.com/showlistings/search",
			data: searchlistings,
			dataType: "json",
			success: function(data) {
				var len = data.length;	
				createMarkers(len,data);
				loadImages(data);
			},
			error: function()
			{
				console.log('error handling');
			}
		});
		return false;
	});
	
	});
</script>
</head>
<body>
	<div id="listContent">
	<div id="content" class="content">
		<ul class="slider-content">
		</ul>
	</div>
	</div>
	<div id="header">
		<div class="row">
			<div id="logo"></div>
		</div>
	</div>
	<div class="container">
		<div class="hero-unit">
			<div id="nav-bar"></div>
			<div id="controls">
			<form action="" name="control-form">
			<fieldset>
				<p><label for="amount">Price range:</label>
				<input type="text" id="amount"/></p>
					<div id='map-slider'></div>
					<div id="rooms">
						<label for="rooms">Rooms:</label>
						<select id="rooms">
							<option value="Any">Any</option>
							<option value="1+">1+</option>
							<option value="2+">2+</option>
							<option value="3+">3+</option>
						</select>
					</div>
					<div id="bathrooms">
						<label for="bathrooms">Bathrooms:</label>
						<select id="bathrooms">
							<option value="Any">Any</option>
							<option value="1+">1+</option>
							<option value="2+">2+</option>
							<option value="3+">3+</option>
						</select>
					</div>
					<div id="search_listings">
						<input type="submit" value="search" class="btnsubmit" id="submit-btn"/>
					</div>
				</fieldset>
				</form>
			</div>
			<div id="showhide_btn">Show / Hide Controls</div>
			<p><script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBKdZ3ZnSzIRg2bdZye0ndl56zkWWPVCJw&sensor=false"></script></p>
			<div id="rentsignal_map" style="width:100%;height:1024px;float:right;z-index:1;overflow:hidden;"></div>
		</div>
		<div id="message" style="display:none;">
			Test text.
		</div>
		<div class="row">
			<div class="span-one-third">
			</div>
			<div class="span-one-third">
			</div>
			<div class="span-one-third">
			</div>
		</div>
		<footer>
			<!--<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>-->
		</footer>
	</div>
		<script language="javascript" type="text/javascript"> 
			function loadImages(data)
			{
				var locationimgs = [];
				var locations;

				if(data.length == 1)
				{
					locationimgs = data[0].rentals.location;
					$("div.content").load("http://rentsignal.com/showlistings/returnimages/?locations=" + locationimgs);
				}
				else
				{
					for(var i=0;i<data.length;i++)
					{
						locationimgs[i] = data[i].rentals.location;
						locations = locationimgs.join("|");
						console.log('data passed over is ' + data[i].rentals.location);
					}
					$("div.content").load("http://rentsignal.com/showlistings/returnimages/?locations=" + locations);
				}
			}
		</script>
</body>
</html>