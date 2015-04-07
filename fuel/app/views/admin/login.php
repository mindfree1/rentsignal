
<?php echo Form::open(array()); ?>
<div id="login_bg"><?php echo Asset::img(array('glebe-night-bg.jpg')); ?></div>
	<?php if (isset($_GET['destination'])): ?>
		<?php echo Form::hidden('destination',$_GET['destination']); ?>
	<?php endif; ?>

	<?php if (isset($login_error)): ?>
		<div class="error"><?php echo $login_error; ?></div>
	<?php endif; ?>
	<div class="row">
		<div class="input" id="emailField"><?php echo Form::input('email', Input::post('email', 'Enter Email or Username'), array('class' => 'defaultText', 'id' => 'emailField')); ?></div>
		
		<?php if ($val->error('email')): ?>
			<div class="error"><?php echo $val->error('email')->get_message('You must provide a username or email'); ?></div>
		<?php endif; ?>
	</div>

	<div class="row">
		<div class="input" id="passwordField"><?php echo Form::password('password', '', array('class' => 'defaultText', 'placeholder' => 'Password')); ?></div>
		
		<?php if ($val->error('password')): ?>
			<div class="error"><?php echo $val->error('password')->get_message(':label cannot be blank'); ?></div>
		<?php endif; ?>
	</div>

	<div class="actions">
		<?php echo Form::submit(array('value'=>'Signin', 'name'=>'submit'),array('id' => 'loginbtn')); ?>
	</div>
	<script language="javascript">
	<!--
		$(document).ready(function()
		{
    		$(".defaultText").focus(function(srcc)
    		{
        		//if ($(this).val() == $(this)[0].name)
        		//{
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
        		//}
    		});
    
    		$(".defaultText").blur(function()
    		{
        		if ($(this).val() == "")
        		{
            		$(this).addClass("defaultTextActive");
            		
            			if($(this)[0].name == 'password')
            			{
            				$(this).val("");
            				$(this)[0].type = 'Password';
            			}
            			else
            			{
            				$(this).val('Enter Email or Username');
            			}
        		}
    		});
    
    		$(".defaultText").blur();        
		});
	//-->
	</script>
<?php echo Form::close(); ?>