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

		//this should be used for pagination to load the right images on next page
		//$("#content").load("http://rentsignal.com/showlistings/getListings?pages=" + pageNum + "&locations=" + <?php echo $locations ?>);
	});
</script>
<?php
	//used later for pagination loop
	/*for($i=1; $i<= $page_limit; $i++)
	{
		echo '<img width="120px" height="120px" src="'. $img_url[$i-1]. '" style="padding-right:10px;"</img>';
	}*/
	for($i=1; $i<= $numrows; $i++)
	{
		echo '<img width="120px" height="120px" src="'. $img_url[$i-1]. '" style="padding-right:10px;"</img>';
	}
?>