<h2>Listing Signals</h2>
<br>
<?php if ($signals): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Tags</th>
			<th>Short description</th>
			<th>Lng description</th>
			<th>Location</th>
			<th>Lat</th>
			<th>Lng</th>
			<th>Rent</th>
			<th>Avail from</th>
			<th>Rooms</th>
			<th>Bathrooms</th>
			<th>User id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($signals as $signal): ?>		<tr>

			<td><?php echo $signal->title; ?></td>
			<td><?php echo $signal->tags; ?></td>
			<td><?php echo $signal->short_description; ?></td>
			<td><?php echo $signal->lng_description; ?></td>
			<td><?php echo $signal->location; ?></td>
			<td><?php echo $signal->lat; ?></td>
			<td><?php echo $signal->lng; ?></td>
			<td><?php echo $signal->rent; ?></td>
			<td><?php echo $signal->avail_from; ?></td>
			<td><?php echo $signal->rooms; ?></td>
			<td><?php echo $signal->bathrooms; ?></td>
			<td><?php echo $signal->user_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/signals/view/'.$signal->id, 'View'); ?> |
				<?php echo Html::anchor('admin/signals/edit/'.$signal->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/signals/delete/'.$signal->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Signals.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/signals/create', 'Add new Signal', array('class' => 'btn success')); ?>

</p>
