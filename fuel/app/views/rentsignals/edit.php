<h2>Editing Rentsignal</h2>
<br>

<?php echo render('rentsignals/_form'); ?>
<p>
	<?php echo Html::anchor('rentsignals/view/'.$rentsignal->id, 'View'); ?> |
	<?php echo Html::anchor('rentsignals', 'Back'); ?></p>
