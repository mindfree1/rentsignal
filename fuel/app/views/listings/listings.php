<ul id="pagination">
	<?php
	for($i=1; $i<=$page_nums; $i++)
	{
		echo '<li id="'.$i.'">'.$i.'</li></a>';
	}
	?>
</ul>
<script>
	//Pagination Click
	$("#pagination li").click(function(){
	
	//CSS Styles
	$("#pagination li")
		.css({'border' : 'solid #dddddd 1px'})
		.css({'color' : '#0063DC'});

	$(this)
		.css({'color' : '#FF0084'})
		.css({'border' : 'none'});

	//Loading Data
	
	var pageNum = this.id;
	if(pageNum == 0 || pageNum == null || pageNum == '')
	{
		pageNum = 1;
	}
	
	//nextImage(pageNum);
	$("#content").load("http://rentsignal.com/showlistings/getListings?page=" + pageNum);
});
</script>
<?php

	for($i=1; $i<=$image_amount;$i++)
	{
		//echo $img_url[$i];
		echo '<img width="120px" height="120px" src="'. $img_url[$i-1]. '" style="padding-right:6px;"</img>';
	}
	
	//echo '<img width="120px" height="120px" src="' .$url. '" style="padding-right:6px;"</img>';
?>
