<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Rentsignal Local</title>
<?php echo Asset::css(array('layout.css','map-styles.css','jquery-ui-1.8.21.custom.css')); ?>
<?php echo Asset::js(array('jquery-1.7.2.js','markerclusterer.js','jquery-ui-1.8.21.js','infobubble.js','mapgen.js', 'angular.js', 'core_func.js', 'jquery.mCustomScrollbar.js')); ?>

</head>
<body>


	<div id="listContent">
	<div id="searchContent">
		<ul class="slider-content">
			<div id="controls">
			<form action="" name="control-form">
			<fieldset style="">
				<p><label for="amount">Price range:</label>
				<input type="text" id="amount"/></p>
					<div id='map-slider'>
						<script type="text/javascript">
						$("#map-slider").slider({ 
							range: true,
							min:	0, 
							max:	1000,
							values: [300,700],
							slide: function(event, ui) {
							$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
								}
						});
		
						$("#amount").val("$" + $("#map-slider").slider("values", 0) + " - $" + $("#map-slider").slider("values", 1));
						</script>
					</div>
					<div id="rooms">
						<label for="rooms">Rooms:</label>
						<select id="rooms">
							<option value="Any">Any</option>
							<option value="1">1+</option>
							<option value="2">2+</option>
							<option value="3">3+</option>
						</select>
					</div>
					<div id="bathrooms">
						<label for="bathrooms">Bathrooms:</label>
						<select id="bathrooms">
							<option value="Any">Any</option>
							<option value="1">1+</option>
							<option value="2">2+</option>
							<option value="3">3+</option>
						</select>
						<div class="starrating">
								<ul class="stars" id="star_ratings">
									<li><a href="#" rel="star-1"></a></li>
									<li><a href="#" rel="star-2"></a></li>
									<li><a href="#" rel="star-3"></a></li>
									<li><a href="#" rel="star-4"></a></li>
									<li><a href="#" rel="star-5"></a></li>
									<li><a href="#" rel="star-6"></a></li>
									<li><a href="#" rel="star-7"></a></li>
									<li><a href="#" rel="star-8"></a></li>
									<li><a href="#" rel="star-9"></a></li>
									<li><a href="#" rel="star-10"></a></li>
								</ul>	
						</div>
					</div>
					<div id="search_listings">
						<input type="submit" value="search" class="btnsubmit" id="submit-btn"/>
						<script type="text/javascript">
						$(".btnsubmit").click(function() {

						var starMapped = get_starMappings($('.stars').attr('class'));
						var bathrooms = $('#bathrooms option:selected').val();
						var bedrooms = $('#rooms option:selected').val();
						$('#slider').css('width', '50px');
						
						var validData = [starMapped,bathrooms,bedrooms];
						validateSearch(validData);
						var searchlistings = "rentmin=" + $("#map-slider").slider("values", 0) + "&rentmax=" + $("#map-slider").slider("values", 1) + "&rooms=" + bedrooms + "&bathrooms=" + bathrooms + "&ratings=" + starMapped;

						$.ajax({
							type: "POST",
							url: "http://rentsignal.com/showlistings/search",
							data: searchlistings,
							dataType: "json",
							success: function(data) {
								var len = data.length;
								createMarkers(len,data);
								loadImages(data);
								closeSearchPane();
							},
							error: function()
							{
								console.log('error handling');

							}
						});
						return false;
						});

						function closeSearchPane()
						{
							$("#listingsPane").animate({"marginLeft": "0px", "height" : "100px", "width" : "50px"},
							{			
									duration: 500,
									step: function() {
										google.maps.event.trigger(map, 'resize');
										$('#listContent').css('display','none');
										$("#controls").css('display','none');
									}
							});
						}
						</script>
					</div>
			</fieldset>
			</form>
			</div>
		</ul>
	</div>
	</div>
	<div class="container">
		<div class="hero-unit"></div>
		<ul class="nav-bar">
		<li class="dropdown-toggle" id="btnlogin">
			<?php echo Html::anchor('login', 'Login');?></br>
			<?php echo Html::anchor('signup', 'Signup');?>
		</li>
		<li class="dropdown-toggle" id="btndashboard">
					<?php echo Html::anchor('admin', 'Dashboard');?>
				<ul class="dropdown-menu-dashboard">
					<li>
						<?php echo Html::anchor('', 'Home Button 2');?>
					</li>
				</ul>
			</li>
			<li class="dropdown-toggle" id="btnmessages">
				<?php echo Html::anchor('', 'Messages');?>
				<ul class="dropdown-menu2">
					<li>
						<?php echo Html::anchor('admin', 'Latest Messages');?>
					</li>
				</ul>
			</li>
			<li class="rslogoli">
				<div class="rslogo"><img src="../assets/img/rslogo.jpg" height="50px" width="150px" /></div>
			</li>
			<li class="dropdown-toggle" id="btnblogsclassi">
				<?php echo Html::anchor('admin', 'Blogs / Classifieds');?>
				<ul class="dropdown-menu3">
					<li>
						<?php echo Html::anchor('admin', 'Latets Blog Entry');?>
					</li>
				</ul>
			</li>
			<li class="dropdown-toggle" id="btnsubmitlisting">
				<?php echo Html::anchor('admin', 'Submit Listing');?>
				<ul class="dropdown-menu4">
					<li>
						<?php echo Html::anchor('admin', 'Sub Button 4');?>
					</li>
				</ul>
			</li>
			<li class="dropdown-toggle" id="btncontactus">
				<?php echo Html::anchor('contact', 'Contact Us');?>
			</li>
		</ul>
			<!--current user logged in name should go here-->
			<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBKdZ3ZnSzIRg2bdZye0ndl56zkWWPVCJw&sensor=false&libraries=places"></script>
			<div id="rentsignal_map" style="width:100%;height:1024px;float:right;z-index:1;overflow:hidden;"></div>
		<footer>
			<!--<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>-->
		</footer>
	</div>
	<div id="image_titlebar">Favourites</div>
	<div id="content" class="content"></div>
	<div id="overlaycontent" class="overlaycontent"></div>
	<div id="hideimages">Hide Images</div>

	<script language="javascript" type="text/javascript"> 
	function loadImages(data)
	{
		var locationimgs = [];
		var locations;
			for(var i=0;i<data.length;i++)
			{
				locationimgs[i] = data[i].rentals.location;
			}
			$("div.content").load("http://rentsignal.com/showlistings/returnimages/?locations=" + locationimgs);
	}

	function loadFavourites()
	{
		$("div.content").load("http://rentsignal.com/showlistings/favpopular");
	}

	//could propabably move all this script to the core_func.js file
	
	$(document).ready(function() {
		load_map();
		loadFavourites();

		$("#openrentals").live("click",function() {
			$("#searchContent").css('display', 'inline');
			$("#searchContent").css('visibility', 'visible');
		});

		$("#hideimages").live("hover", function() {
			$(this).css('cursor', 'pointer');
		});

		$("#hideimages").live("click", function() {
			var showimages = $('#hideimages').text();

			if(showimages == 'Hide Images')
			{
				$('#hideimages').text('Show Images');
				$('#hideimages').css('z-index', '10000');
				$('#image_titlebar').toggle();
				$('#content').toggle();

			}

			if(showimages == 'Show Images')
			{
				$('#hideimages').text('Hide Images');
				$('#image_titlebar').toggle();
				$('#content').toggle();
			}
		});

		$("#searchContent > ul:gt(0)").hide();
	});
</script>
</body>
</html>