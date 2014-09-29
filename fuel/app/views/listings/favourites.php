<!-- THIS VIEW SHOULD BE CLEVER ENOUGH TO EITHER POPULATE FAVOURITES OR SEARCHED RESULTS - also users will need to be able to switch between their favourites
	others favourites as well as a certain range of favourites -->
<ul id="pagination" style="position:absolute;margin-left:-200px;">
	<?php
		for($i=1; $i<=$page_nums; $i++)
		{
			echo '<li id="'.$i.'">'.$i.'</li></a>';
		}
	?>
</ul>
<script>
	$("#pagination li").click(function(){
	$("#pagination li").css({'border' : 'solid #dddddd 1px', 'color'  : '#0063DC'});

	$(this)
		.css({'color' : '#FF0084'})
		.css({'border' : 'none'});
		var pageNum = this.id;
		if(pageNum == 0 || pageNum == null || pageNum == '')
		{
			pageNum = 1;
		}

		//loads the right page based off click/tap on pagination number
		$("#content").load('http://rentsignal.com/showlistings/favpopular?pages=' + pageNum);
	});
</script>
<?php

	//loop through for pagination
	for($i=1; $i <= $img_amount; $i++)
	{
		echo '<img class="fav_imgs" id="img_' .$i. '"'. 'width="120px" height="120px" src="'. $img_url[$i-1]. '"</img>';
	}
?>