<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Rentsignal</title>
	<?php echo Asset::css(array('layout.css','map-styles.css','jquery-ui-1.8.21.custom.css','jScrollPane.css','jquery.mCustomScrollbar.css')); ?>
	<?php echo Asset::js(array('jquery-1.7.2.js','markerclusterer.js','jquery-ui-1.8.21.js','infobubble.js','mapgen.js','jScrollPane.js','jquery.mCustomScrollbar.js')); ?>
	
	<?php $rentsignals = Model_Rentsignals::find('all'); ?>
	<?php
	
	$result = DB::query('SELECT * FROM `markers`', DB::SELECT)->execute();
	$numrows = count($result);

	#$on_key = $result('id');
	foreach($result as $item)
	{
		$allcoords[] = $item;
	}
	?>
<script>
	var allcoords = '<?php echo json_encode($allcoords)?>';
	var numcoords = '<?php echo $numrows ?>';

	var obj = jQuery.parseJSON(allcoords);
	
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

/*setInterval(function() { 
  $('#content > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#content');
},  3000);*/
	
	});
	//alert(document.getElementById('listContent').innerHTML);
</script>
<script>
    
</script>
</head>
<body>
	<div id="listContent">
	<div><a href="#" class="imgctrls">Previous</a><a href="#" class="imgctrls">Next</a></div>
		<?php echo View::forge('listings/listings');?>
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
				<p><label for="amount">Price range:</label>
				<input type="text" id="amount"/></p>
					<div id='map-slider'></div>
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
			<?php # echo View::forge('mapgen/index');?>
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
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>-->
			</p>
		</footer>
	</div>
	<script>
		
	</script>
</body>
</html>