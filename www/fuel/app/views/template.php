<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!--<title><?php echo $title; ?></title>-->
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
	</style>
</head>
<body>
	<div id="login_bg"><?php echo Asset::img(array('glebe-night-bg.jpg')); ?></div>
	<div class="container">
		<div class="row">
			<div class="span16">
				<?php echo $content; ?>
			</div>
		</div>
	</div>
</body>
</html>
