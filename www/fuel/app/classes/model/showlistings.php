<?php

namespace Model;
use \DB;
use \View;
use \Response;
use \Arr;

Class ShowListings extends \Model
{
	public static function get_results($data)
	{

		$location = $data;
		$location = implode("|", $location);
		
		$per_page = 8;
		$totalresult = DB::query('SELECT * FROM `images` INNER JOIN rentsignals ON images.location=rentsignals.location WHERE images.location REGEXP ' . "'" .$location . "'", DB::SELECT)->execute();
		
		$numrows = count($totalresult);
		$pages = ceil($numrows/$per_page);

		if(isset($_GET['pages']))
		{
			$pages = $_GET['pages'];
			$start = ($pages - 1) * $per_page;	 
		}
		else
		{
			$start = ($pages - 1);	 
		}
		
		if($start == '0')
		{
			$start = $pages;
		}

		$pages = ceil($numrows/$per_page);
		$max = 'limit ' .$start.','.$per_page; 
		
 		$result = DB::query('SELECT * FROM `images` WHERE location REGEXP ' . "'" .$location ."'" . " $max", DB::SELECT)->execute();
		$img_amount = count($result);
		
		foreach($result as $item)
		{
			$url[] = $item['url'];
		}

		$imgdata = array();
		$imgdata["page_nums"] = $pages;
		$imgdata["numrows"] = $numrows;
		$imgdata["img_url"] = $url;
		$imgdata["page_limit"] = $per_page;
		$imgdata["locations"] = $data['loc1'];
		$imgdata["$img_amount"] = $img_amount;

		//create the view
		$imgview = View::forge('listings/listings');

		//assign variables for the view to use based on the data
		$imgview->set('page_nums', $imgdata["page_nums"], false);
		$imgview->set('numrows', $imgdata["numrows"], false);
		$imgview->set('img_url', $imgdata["img_url"], false);
		$imgview->set('page_limit', $imgdata["page_limit"], false);
		$imgview->set('locations', $imgdata["locations"], false);
		$imgview->set('img_amount', $imgdata["$img_amount"], false);

		//assign the view to browser output
		echo $imgview;
	}
}
?>