<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Title', 'title'); ?>

			<div class="input">
				<?php echo Form::input('title', Input::post('title', isset($rentsignal) ? $rentsignal->title : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Description', 'description'); ?>

			<div class="input">
				<?php echo Form::input('description', Input::post('description', isset($rentsignal) ? $rentsignal->description : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Lat', 'lat'); ?>

			<div class="input">
				<?php echo Form::input('lat', Input::post('lat', isset($rentsignal) ? $rentsignal->lat : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Long', 'long'); ?>

			<div class="input">
				<?php echo Form::input('long', Input::post('long', isset($rentsignal) ? $rentsignal->long : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Rent', 'rent'); ?>

			<div class="input">
				<?php echo Form::input('rent', Input::post('rent', isset($rentsignal) ? $rentsignal->rent : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Avail from', 'avail_from'); ?>

			<div class="input">
				<?php echo Form::input('avail_from', Input::post('avail_from', isset($rentsignal) ? $rentsignal->avail_from : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>