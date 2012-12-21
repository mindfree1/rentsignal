<?php

namespace Model;
use \DB;
use \View;
use \Response;

//namespace DB;

Class ShowListings extends \Model
{
	public static function get_results()
	{
	
		$per_page = 8;
		$data['page_limit'] = $per_page;
		
		if($_GET)
		{
			$page= $_GET['page'];
		}
		else
		{
			$page = 1;
		}
	
		$start = ($page-1)*$per_page;
		
		/*$rentrange = array("rentmin" => $rentmin,
					  "rentmax" => $rentmax,
					 );
		echo $rentrange["rentmin"];*/
		
		//$query_controls = DB::query('SELECT * FROM `rentsignals` WHERE rent LIKE $rentrange["rentmin","rentmax"]')->execute();
		
		$totalresult = DB::query('SELECT * FROM `images` order by id',DB::SELECT)->execute();
		$numrows = count($totalresult);
		
		$max = 'limit ' .$start.','.$per_page; 
		
 		$result = DB::query('SELECT * FROM `images` order by id ' .$max, DB::SELECT)->execute();
		$pages = ceil($numrows/$per_page);
		$data['image_amount'] = count($result);
		
		if($pages < 1)
		{
			$pages = 1;
		}
		
		$data['page_nums'] = $pages;
		$data['numrows'] = $numrows;
		
		foreach($result as $item)
		{
			$url[] = $item['url'];
		}
		
		$data['img_url'] = $url;
		
		//return Response::forge(View::forge('listings/listings', $data));
		return Response::forge(View::forge('listings/listings', $data));
	}
}
?>