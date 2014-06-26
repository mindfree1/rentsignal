<h2>Viewing #<?php echo $signal->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $signal->title; ?></p>
<p>
	<strong>Tags:</strong>
	<?php echo $signal->tags; ?></p>
<p>
	<strong>Short description:</strong>
	<?php echo $signal->short_description; ?></p>
<p>
	<strong>Lng description:</strong>
	<?php echo $signal->lng_description; ?></p>
<p>
	<strong>Location:</strong>
	<?php echo $signal->location; ?></p>
<p>
	<strong>Lat:</strong>
	<?php echo $signal->lat; ?></p>
<p>
	<strong>Lng:</strong>
	<?php echo $signal->lng; ?></p>
<p>
	<strong>Rent:</strong>
	<?php echo $signal->rent; ?></p>
<p>
	<strong>Avail from:</strong>
	<?php echo $signal->avail_from; ?></p>
<p>
	<strong>Rooms:</strong>
	<?php echo $signal->rooms; ?></p>
<p>
	<strong>Bathrooms:</strong>
	<?php echo $signal->bathrooms; ?></p>
<p>
	<strong>User id:</strong>
	<?php echo $signal->user_id; ?></p>

<?php echo Html::anchor('admin/signals/edit/'.$signal->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/signals', 'Back'); ?>