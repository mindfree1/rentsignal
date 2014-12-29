<?php //session_start();
	define('PATH_TO_WEBROOT', '../shoppingcart/php');
	include (PATH_TO_WEBROOT.'/cartitems.php');
	include (PATH_TO_WEBROOT.'/dbconnect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="js/core.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="main">
		<div class="column" style="margin-top:28px;">
			<img src="images/logo.jpg" alt="" />
		</div>
		<div class="right sign" style="margin-top:28px;">
			<?php 
				if(isset($_SESSION["loggedinstatus"]))
				{
					date_default_timezone_set('Australia/Sydney');
					$date = date('d/m/Y');

					echo '<div>Welcome: </div>' .$_SESSION['firstname'] . ' ' .$_SESSION['lastname'] .'</br>';
					echo 'Date: ' .$date .'</br>';
					echo 'Time: ' . '<div id="thetime"></div>';
					echo '<div style="position: absolute;margin-top: 30px;top: 0px;right: 295px;background-color:#0000CC;width:200px;height:60px;">';
					echo '<span style="color:#ffffff;">Items:'. $cartdata['items'] .'</span></br>';
					echo '<span style="color:#ffffff;">Total Price:'. '$' .$cartdata['price'] . '</span>';
					echo '<form action="php/userprofile.php" method="POST"><input type="submit" value="My Profile" class="userprofile" /></form>';
					echo '<form action="php/showcart.php" method="POST"><input type="submit" value="Checkout" class="checkout" /></form>';
					echo '<form action="php/logout.php" method="POST"><input type="submit" value="Logout" class="sign_out" /></form>';
					echo '</div>';
				}
				else
				{
					echo '<span style="vertical-align:middle;top: 45px;margin-left: -35px;position: absolute;">user:</span><form action="php/checklogin.php" method="POST"><input type="text" name="user" value="" class="inp1" />&nbsp;&nbsp;&nbsp;&nbsp; <span style="vertical-align:middle;">password:</span> <input type="password" name="password" value="" class="inp1" /> <input type="submit" value="" class="sign_in" /></form>';
					echo '<a href="signup.html"/><img src="" class="sign_up"/></a>';

					echo '<div style="position: absolute;margin-top: 30px;top: 0px;right: 295px;background-color:#0000CC;width:200px;height:60px;">';
					echo '<span style="color:#ffffff;">Please login in order to add items to your cart.</span></br>';
					echo '</div>';	
				}
			?>
		</div>
			<div class="clear"></div>
				<img src="images/17.jpg" alt="" class="line_top" /><div id="content"></div>
			<div class="column"><img src="images/browse.jpg" alt="" /></div>
			<div id="shop_chek" class="column">
			<ul>
			<li><a href="#">shopping cart</a></li></ul>
			<ul><li><a href="#">checkout</a></li>
			</ul>
			</div>
			<div id="top_1">
			I want to find: <input type="text" value="" class="inp2" /> <input type="submit" value="" class="go" />currencies: <select class="sel">
			<option>US Dollar</option><option>AUS Dollar</option></select></div>
		<div class="clear"></div>
		<div id="menu1">
			<ul>
			<li><a href="#">Atomorum, an malis</a></li>
			
			<li><a href="#">Scaevola cum, ius</a></li>
			
			<li><a href="#">Te error minimum senserit</a></li>
			
			<li><a href="#">Pri regione qualisque</a></li>
			
			<li><a href="#">Sint quot accusam</a></li>
			
			<li><a href="#">Qui ei, ut facete interpretaris</a></li>
			
			<li><a href="#">No copiosae vivendum</a></li>
			
			<li><a href="#">Incorrupte duo</a></li>
			</ul>
		</div>
		<div class="column" id="menu">
			<a href="#"><img src="images/but1.jpg" alt="" align="top" /></a>
			<a href="#"><img src="images/but2.jpg" alt="" align="top" /></a>
			<a href="#"><img src="images/but3.jpg" alt="" align="top" /></a>
			<a href="#"><img src="images/but4.jpg" alt="" align="top" /></a>
			<a href="#"><img src="images/but5.jpg" alt="" align="top" /></a>			
		</div>
		<div id="header">
		<p>Atomorum, an malis scaevola cum, ius te error minimum senserit.<br/><br/> Pri regione qualisque id.</p>
		<a href="#"><img src="images/more.jpg" alt="" class="more" /></a>
		</div>
		<div class="clear"></div>
		<div class="column" id="con_l">
		  <div style="margin-left:10px; margin-right:50px;">
			<img src="images/news_events.jpg" alt="" /><br /><br />
			<strong>12.06.2014</strong><br />
			Atomorum, an malis scaevola cum, ius te error minimum senserit. <a href="#"><img src="images/pim2.jpg" alt="" /></a><br /><br />
			<strong>12.06.2014</strong><br />
			Pri regione qualisque id. Sint quot accusam qui ei, ut facete interpretaris quo. <a href="#"><img src="images/pim2.jpg" alt="" /></a><br /><br />
			<strong>12.06.2014</strong><br />
			No copiosae vivendum incorrupte duo. <a href="#"><img src="images/pim2.jpg" alt="" /></a><br />
			<img src="images/subscribe_news.jpg" alt="" class="s_n" />
			<form id="email" action="" method="post"><span style="vertical-align:middle;">email</span> <input type="text" value=" " class="inp1" /> <input type="submit" value="" class="enter" /><br /><br />
			<img src="images/spacer.gif" style="width:25px; height:1px;" alt="" align="top" /><input type="checkbox" /> <span>unsubscribe my e-mail</span>
			</form></div>
		</div>
		<div id="con_c">
			<img src="images/featured_prod.jpg" alt="" align="top" class="f_p" />
			<form action="php/addcart.php" method="POST">
			<div class="column p_l">
				<img src="images/pic1.jpg" alt="" />
				<div class="dcc"><a href="#"><img src="images/deteils.jpg" alt="" align="left" /></a>
				<img src="images/d_c.jpg" alt="" align="left" />
				<input type="submit" value="" class="addCart"/>
				<input type="hidden" value="1" name="prodid"/>
				<input type="hidden" value="camcorder" name="productname"/>
				<input type="hidden" value="Sony Camcorder, really nice product with great features" name="productdescription"/>
				<input type="hidden" value="550" name="price"/>
				<p style="padding-top:4px;">Quantity
				<select name="quantity" class="sel" style="margin-left:26px;">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select></p>
				<p>Shipping Type
				<select name="shippingtype" class="sel">
					<option value="Express">Express</option>
					<option value="Business">Business</option>
					<option value="Normal">Normal</option>
				</select></p>
				<p>Payment Type
				<select name="paymenttype" class="sel">
					<option value="Mastercard">Mastercard</option>
					<option value="Visa">Visa</option>
					<option value="Paypal">Paypal</option>
					<option value="Direct Debit">Direct Debit</option>
				</select></p>
			</div>
			</form>
			<form action="php/addcart.php" method="POST">
				<img src="images/pic3.jpg" alt="" class="pic" />
				<div class="dcc"><a href="#"><img src="images/deteils.jpg" alt="" align="left" /></a>
				<img src="images/d_c.jpg" alt="" align="left" />
				<input type="submit" value="" class="addCart"/>
				<input type="hidden" value="2" name="prodid"/>
				<input type="hidden" value="samsung camera" name="productname"/>
				<input type="hidden" value="Samsung Camera, takes the best freakin picture EVER" name="productdescription"/>
				<input type="hidden" value="300" name="price"/>
				<p style="padding-top:4px;">Quantity
				<select name="quantity" class="sel" style="margin-left:26px;">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select></p>
				<span>Shipping Type</span>
				<select name="shippingtype" class="sel">
					<option value="Express">Express</option>
					<option value="Business">Business</option>
					<option value="Normal">Normal</option>
				</select>
				<span>Payment Type</span>
				<select name="paymenttype" class="sel">
					<option value="Mastercard">Mastercard</option>
					<option value="Visa">Visa</option>
					<option value="Paypal">Paypal</option>
					<option value="Direct Debit">Direct Debit</option>
				</select>
				</div>
			</div>
			</form>
			<form action="php/addcart.php" method="POST">
			<div class="right p_r">
				<img src="images/pic2.jpg" alt="" />
				<div class="dcc"><a href="#"><img src="images/deteils.jpg" alt="" align="left" /></a>
				<img src="images/d_c.jpg" alt="" align="left" />
				<input type="submit" value="" class="addCart"/>
				<input type="hidden" value="3" name="prodid"/>
				<input type="hidden" value="samsung tv" name="productname"/>
				<input type="hidden" value="Samsung TV, watch all the greatest movies in HD" name="productdescription"/>
				<input type="hidden" value="1200" name="price"/>
				<p style="padding-top:4px;">Quantity
				<select name="quantity" class="sel" style="margin-left:26px;">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select></p>
				<p>Shipping Type
				<select name="shippingtype" class="sel">
					<option value="Express">Express</option>
					<option value="Business">Business</option>
					<option value="Normal">Normal</option>
				</select></p>
				<p>Payment Type
				<select name="paymenttype" class="sel">
					<option value="Mastercard">Mastercard</option>
					<option value="Visa">Visa</option>
					<option value="Paypal">Paypal</option>
					<option value="Direct Debit">Direct Debit</option>
				</select></p>
				</div>
			</form>
			<form action="php/addcart.php" method="POST">
				<img src="images/pic4.jpg" alt="" class="pic" />
				<div class="dcc"><a href="#"><img src="images/deteils.jpg" alt="" align="left" /></a>
				<img src="images/d_c.jpg" alt="" align="left" />
				<input type="submit" value="" class="addCart"/>
				<input type="hidden" value="4" name="prodid"/>
				<input type="hidden" value="HP Laptop" name="productname"/>
				<input type="hidden" value="HP Laptop, play games, watch movies, surf the internet and more" name="productdescription"/>
				<input type="hidden" value="1400" name="price"/>
				<p style="padding-top:4px;">Quantity
				<select name="quantity" class="sel" style="margin-left:26px;">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select></p>
				<p>Shipping Type
				<select name="shippingtype" class="sel">
					<option value="Express">Express</option>
					<option value="Business">Business</option>
					<option value="Normal">Normal</option>
				</select></p>
				<p>Payment Type
				<select name="paymenttype" class="sel">
					<option value="Mastercard">Mastercard</option>
					<option value="Visa">Visa</option>
					<option value="Paypal">Paypal</option>
					<option value="Direct Debit">Direct Debit</option>
				</select></p>
			</div>
			</form>
			</div>
		</div>
		<div class="right" id="con_r">
			<img src="images/top_popelar.jpg" alt="" class="t_p" />
			<ul>
				<li>1. Atomorum, an malis</li></ul><div class="line m2"></div>
				<ul><li>2. Scaevola cum, ius</li></ul><div class="line m2"></div>
				<ul><li>3. Te error minimum</li></ul><div class="line m2"></div>
				<ul><li>4. Pri regione qualisque</li></ul><div class="line m2"></div>
				<ul><li>5. Sint quot accusam</li></ul><div class="line m2"></div>
				<ul><li>6. Qui ei, ut facete intepre</li></ul><div class="line m2"></div>
				<ul><li>7. No copiosae vivendum</li></ul><div class="line m2"></div>
				<ul><li>8. Incorrupte duo</li>
			</ul>
			<a href="#"><img src="images/banner.jpg" alt="" class="banner" /></a>
		</div>
	<div class="clear"></div>
	<img src="images/line_bottom.jpg" alt="" class="l_b"  />
		<div id="b_menu">
			<p class="men"><a href="../index.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#">About Store</a></p>
			<div class="men1"></div>
		</div>
	</div>
</body></html>