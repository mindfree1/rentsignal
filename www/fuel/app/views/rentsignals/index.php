<h2>Listing Rentsignals</h2>
<br>
<?php $rentsignals = Model_Rentsignals::find('all'); ?>
<?php if($rentsignals): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Location</th>
			<th>Description</th>
			<th>Rent</th>
			<th>Avail from</th>
			<th>Rooms</th>
			<th>Bathrooms</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

<?php foreach ($rentsignals as $rentsignal): ?>		<tr>

			<td><?php echo $rentsignal->location; ?></td>
			<td><?php echo $rentsignal->description; ?></td>
			<!--<td><?php //echo $rentsignal->lat; ?></td>-->
			<!--<td><?php //echo $rentsignal->long; ?></td>-->
			<td><?php echo $rentsignal->rent; ?></td>
			<td><?php echo $rentsignal->avail_from; ?></td>
			<td><?php echo $rentsignal->rooms; ?></td>
			<td><?php echo $rentsignal->bathrooms; ?></td>
			<td>
				<?php echo Html::anchor('rentsignals/view/'.$rentsignal->id, 'View'); ?> |
				<?php echo Html::anchor('rentsignals/edit/'.$rentsignal->id, 'Edit'); ?> |
				<?php echo Html::anchor('rentsignals/delete/'.$rentsignal->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Rentsignals.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('rentsignals/create', 'Add new Rentsignal', array('class' => 'btn success')); ?>
	<?php echo Html::anchor('welcome/index', 'Back', array('class' => 'btn success')); ?>

</p>
