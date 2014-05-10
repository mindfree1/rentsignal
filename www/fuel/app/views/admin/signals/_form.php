<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Title', 'title'); ?>

			<div class="input">
				<?php echo Form::input('title', Input::post('title', isset($signal) ? $signal->title : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Tags', 'tags'); ?>

			<div class="input">
				<?php echo Form::input('tags', Input::post('tags', isset($signal) ? $signal->tags : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Short description', 'short_description'); ?>

			<div class="input">
				<?php echo Form::textarea('short_description', Input::post('short_description', isset($signal) ? $signal->short_description : ''), array('class' => 'span10', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Lng description', 'lng_description'); ?>

			<div class="input">
				<?php echo Form::textarea('lng_description', Input::post('lng_description', isset($signal) ? $signal->lng_description : ''), array('class' => 'span10', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Location', 'location'); ?>

			<div class="input">
				<?php echo Form::input('location', Input::post('location', isset($signal) ? $signal->location : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Lat', 'lat'); ?>

			<div class="input">
				<?php echo Form::input('lat', Input::post('lat', isset($signal) ? $signal->lat : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Lng', 'lng'); ?>

			<div class="input">
				<?php echo Form::input('lng', Input::post('lng', isset($signal) ? $signal->lng : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Rent', 'rent'); ?>

			<div class="input">
				<?php echo Form::textarea('rent', Input::post('rent', isset($signal) ? $signal->rent : ''), array('class' => 'span10', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Avail from', 'avail_from'); ?>

			<div class="input">
				<?php echo Form::input('avail_from', Input::post('avail_from', isset($signal) ? $signal->avail_from : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Rooms', 'rooms'); ?>

			<div class="input">
				<?php echo Form::input('rooms', Input::post('rooms', isset($signal) ? $signal->rooms : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Bathrooms', 'bathrooms'); ?>

			<div class="input">
				<?php echo Form::input('bathrooms', Input::post('bathrooms', isset($signal) ? $signal->bathrooms : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('User id', 'user_id'); ?>

			<div class="input">
				<?php echo Form::input('user_id', Input::post('user_id', isset($signal) ? $signal->user_id : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>