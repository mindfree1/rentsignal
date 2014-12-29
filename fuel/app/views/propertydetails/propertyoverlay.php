<p style="position:absolute;margin-left:0px;"><b></b></p>
<ul id="pagination" style="position:absolute;margin-left:0px;">
	<p></p>
</ul>
<script>
	
</script>
<?php

	for($i=1; $i <= $image_amount; $i++)
	{
		echo '<img id="img_'. $i .'" width="120px" height="120px" src="'. $images[$i-1]. '"' . '/>';
	}
?>