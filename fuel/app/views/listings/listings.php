<p style="position:absolute;margin-left:-180px;"><b>Search Results</b></p>
<ul id="pagination" style="position:absolute;margin-left:-200px;cursor:pointer;">
	<?php
		for($i=1; $i<=$page_nums; $i++)
		{
			echo '<li id="'.$i.'">'.$i.'</li></a>';
		}
		//$locations = implode("," , $locations);
	?>
</ul>
<script>
	$("#pagination li").click(function(){
	$("#pagination li").css({'border' : 'solid #dddddd 1px', 'color'  : '#0063DC'});

	$(this)
		.css({'color' : '#FF0084'})
		.css({'border' : 'none'});
		var pageNum = this.id;
		/*if(pageNum == 0 || pageNum == null || pageNum == '')
		{
			pageNum = 1;
		}*/

		//loads the right page based off click/tap on pagination number
		$("#content").load('http://rentsignal.com/showlistings/getListings?pages=' + pageNum + '&locations=' + '<?php echo $locations ?>');
	});
</script>
<?php

	//loop through for pagination
	for($i=1; $i <= $img_amount; $i++)
	{
		echo '<img id="img_'.$i.'"'. ' class="overlay_images" width="120px" height="120px" src="'. $img_url[$i-1]. '"' . '/>';
	}
?>