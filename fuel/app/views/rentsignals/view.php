<h2>Viewing #<?php echo $rentsignal->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $rentsignal->title; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $rentsignal->description; ?></p>

<p>
	<strong>Rent:</strong>
	<?php echo $rentsignal->rent; ?></p>
<p>
	<strong>Avail from:</strong>
	<?php echo $rentsignal->avail_from; ?></p>
	
	<strong>Rooms:</strong>
	<?php echo $rentsignal->rooms; ?></p>
	
	<strong>Bathrooms:</strong>
	<?php echo $rentsignal->bathrooms; ?></p>

<?php echo Html::anchor('rentsignals/edit/'.$rentsignal->id, 'Edit'); ?> |
<?php echo Html::anchor('rentsignals', 'Back'); ?>