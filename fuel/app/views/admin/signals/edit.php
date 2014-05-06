<h2>Editing Signal</h2>
<br>

<?php echo render('admin\signals/_form'); ?>
<p>
	<?php echo Html::anchor('admin/signals/view/'.$signal->id, 'View'); ?> |
	<?php echo Html::anchor('admin/signals', 'Back'); ?></p>
