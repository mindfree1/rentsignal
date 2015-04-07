<p style="position:absolute;margin-left:0px;"><b></b></p>
<ul id="pagination" style="position:absolute;margin-left:0px;">
	<p></p>
</ul>
<div style="padding-left: 15px;padding-top:40px;right:10px;width: 410px; float: left;height:300px;">
<?php

	for($x=1; $x <= 1; $x++)
	{
		echo '<img id="img_'. $x .'" class="overlay_images" width="400px" height="300px" src="'. $images[$x-1]. '"' . '/>';
		echo '<div id="propertydetails"><div class="overlaystarrating" style="float: right;">
				<ul class="setoverlaystar" id="star_ratings">
					<li><a href="#" rel="star-1"></a></li>
					<li><a href="#" rel="star-2"></a></li>
					<li><a href="#" rel="star-3"></a></li>
					<li><a href="#" rel="star-4"></a></li>
					<li><a href="#" rel="star-5"></a></li>
					<li><a href="#" rel="star-6"></a></li>
					<li><a href="#" rel="star-7"></a></li>
					<li><a href="#" rel="star-8"></a></li>
					<li><a href="#" rel="star-9"></a></li>
					<li><a href="#" rel="star-10"></a></li>
				</ul>
			   </div></div>';
			   echo "<script>var ul_parent = $('.setoverlaystar').closest('ul');
			   			ul_parent.addClass('stars star-" . $favstars . "')" ."</script>";
	}
echo "</div>";
echo '<div style="width: 400px;height: 130px;float: left;position: relative;top: 40px;">';

	for($i=2; $i <= $image_amount; $i++)
	{
		if($i == 2)
		{
			echo '<img id="img_'. $i .'" class="overlay_images2" width="120px" height="120px" src="'. $images[$i-1]. '"' . '/>';
		}
		else if($i == 3)
		{
			echo '<img id="img_'. $i .'" class="overlay_images3" width="120px" height="120px" src="'. $images[$i-1]. '"' . '/>';
		}
		else if($i == 4)
		{
			echo '<img id="img_'. $i .'" class="overlay_images4" width="120px" height="120px" src="'. $images[$i-1]. '"' . '/>';
		}
		else if($i > 4)
		{
			echo '<img id="img_'. $i .'" class="overlay_imagesextra" width="120px" height="120px" src="'. $images[$i-1]. '"' . '/>';
		}
	}
	echo '</div>';
	echo '<div style="width:350px;height: 330px;float: right;padding-right: 20px;top: 40px;position: relative;">';
	echo '<div id="property_description">'. $description  .'</div>';
echo '</div>';
?>
