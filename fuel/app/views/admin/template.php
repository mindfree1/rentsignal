<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		body { margin: 0px; }
    .defaultText { width: 300px; left: 500px; position: absolute; margin: auto}
    .defaultTextActive { color: #a1a1a1; font-style: italic; }
    #email{top:180px;}
    #username{top:230px;}
    #password{top:280px;}
    #signup{padding-left: 200px;}
    #signupnow{margin-top: 94px;margin-left: 80px;font-style: italic;color: #a1a1a1;}
    #signupbtn{margin-left: 520px;top: 92px;}
    #signinbtn{top: 340px;margin-left: 100px;width: 100px;}
    #wrapper{width:100%;left:0px;top:0px;}
    #login_bg img{width: 100%;}
    .body{margin: none;}
    .fb-login-button{position: absolute;top: 342px;left: 720px;}
	</style>
	<?php echo Asset::js(array(
		'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js',
		'bootstrap.js'
	)); ?>
	<script>
		$(function(){ $('.topbar').dropdown(); });
	</script>
</head>
<body>
	<?php if ($current_user): ?>
	<div class="topbar">
	    <div class="fill">
	        <div class="container">
	            <h3><a href="#">My Site</a></h3>
	            <ul>
	                <li class="<?php echo Uri::segment(2) == '' ? 'active' : '' ?>">
						<?php echo Html::anchor('admin', 'Dashboard') ?>
					</li>
	                
					<?php foreach (glob(APPPATH.'classes/controller/admin/*.php') as $controller): ?>
						
						<?php
						$section_segment = basename($controller, '.php');
						$section_title = Inflector::humanize($section_segment);
						?>
						
	                <li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
						<?php echo Html::anchor('admin/'.$section_segment, $section_title) ?>
					</li>
					<?php endforeach; ?>
	          </ul>

	          <ul class="nav secondary-nav">
	            <li class="menu">
	                <a href="#" class="menu"><?php echo $current_user->username ?></a>
	                <ul class="menu-dropdown">
	                    <li><?php echo Html::anchor('admin/logout', 'Logout') ?></li>
	                </ul>
	            </li>
	          </ul>
	        </div>
	    </div>
	</div>

	<?php endif; ?>
	
	<div class="container">
		<div class="row">
			<div class="span16">
				<?php if (Session::get_flash('success')): ?>
					<div class="alert-message success">
						<p>
							<?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
						</p>
					</div>
				<?php endif; ?>
				<?php if (Session::get_flash('error')): ?>
					<div class="alert-message error">
						<p>
							<?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
						</p>
					</div>
			<?php endif; ?>
			</div>
			<div class="span16">
<?php echo $content; ?>
			</div>
		</div>
	</div>
</body>
</html>
