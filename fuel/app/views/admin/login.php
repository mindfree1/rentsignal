
<?php echo Form::open(array()); ?>

	<?php if (isset($_GET['destination'])): ?>
		<?php echo Form::hidden('destination',$_GET['destination']); ?>
	<?php endif; ?>

	<?php if (isset($login_error)): ?>
		<div class="error"><?php echo $login_error; ?></div>
	<?php endif; ?>
	<div class="row">
		<label for="email">Email or Username:</label>
		<div class="input" id="username"><?php echo Form::input('email', Input::post('email', 'email'), array('class' => 'defaultText')); ?></div>
		
		<?php if ($val->errors('email')): ?>
			<div class="error"><?php echo $val->errors('email')->get_message('You must provide a username or email'); ?></div>
		<?php endif; ?>
	</div>

	<div class="row">
		<label for="password">Password:</label>
		<div class="input" id="password"><?php echo Form::password('password', '', array('class' => 'defaultText')); ?></div>
		
		<?php if ($val->errors('password')): ?>
			<div class="error"><?php echo $val->errors('password')->get_message(':label cannot be blank'); ?></div>
		<?php endif; ?>
	</div>

	<div class="actions">
		<?php echo Form::submit(array('value'=>'Login', 'name'=>'submit')); ?>
	</div>
	<script language="javascript">
	<!--
		$(document).ready(function()
		{
    		$(".defaultText").focus(function(srcc)
    		{
        		if ($(this).val() == $(this)[0].name)
        		{
            		$(this).removeClass("defaultTextActive");
            		//if($(this)[0].title != 'Sign in')
            		//{
            			if($(this)[0].name == 'password')
            			{
            				$(this).val("");
            				$(this)[0].type = 'Password';
            			}
            			else
            			{
            				$(this).val("");
            			}
            		//}
        		}
    		});
    
    		$(".defaultText").blur(function()
    		{
        		if ($(this).val() == "")
        		{
            		$(this).addClass("defaultTextActive");
            		$(this).val($(this)[0].name);
        		}
    		});
    
    		$(".defaultText").blur();        
		});
	//-->
	</script>
<?php echo Form::close(); ?>