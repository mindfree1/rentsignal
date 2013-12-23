<ul id="pagination">
	<?php
		for($i=1; $i<=$page_nums; $i++)
		{
			echo '<li id="'.$i.'">'.$i.'</li></a>';
		}
	?>
</ul>
<script>
	$("#pagination li").click(function(){
	$("#pagination li")
		.css({'border' : 'solid #dddddd 1px'})
		.css({'color' : '#0063DC'});

	$(this)
		.css({'color' : '#FF0084'})
		.css({'border' : 'none'});
		var pageNum = this.id;
		if(pageNum == 0 || pageNum == null || pageNum == '')
		{
			pageNum = 1;
		}

		//loads the right page based off click/tap on pagination number
		$("#content").load('http://rentsignal.com/showlistings/getListings?pages=' + pageNum + '&locations=' + '<?php echo $locations ?>');
	});
</script>
<?php

	//loop through for pagination
	for($i=1; $i <= $img_amount; $i++)
	{
		echo '<img id="img_' .$locations. '" width="120px" height="120px" src="'. $img_url[$i-1]. '" style="padding-right:10px;"</img>';
	}
?>