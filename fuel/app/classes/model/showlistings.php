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

		$locations= $data;
		$locations = explode("," , $locations);
		$start = 0;

		$per_page = 8;
		//$totalresult = DB::query('SELECT * FROM `images` INNER JOIN rentsignals ON rentsignals.location = images.location WHERE rentsignals.location IN ' .$locations , DB::SELECT)->execute();
		$totalresult = DB::select()->from('images')->where('location', 'IN', $locations)->execute();
		//$totalresult = DB::select()->from('images')->join('rentsignals', 'INNER')->on('images.propimg_id', '=', 'rentsignals.id')->where('images.location', 'LIKE', $location)->execute();
		$numrows = count($totalresult);
		$pages = ceil($numrows/$per_page);

		if(isset($_GET['pages']))
		{
			$pagescalc = $_GET['pages'];
			if($pagescalc > 1)
			{
				$start = $pagescalc * $per_page / 2;
			}
		}
		else if($start = '0')
		{
			$start = $pages;
		}

		/*else
		{
		//$start = ($pages - 1);	 
		}*/
	
		//$pages = ceil($numrows/$per_page);
		//$max = 'limit ' .$start.','.$per_page; 
 		//$result = DB::query('SELECT * FROM `images`'.  " LIMIT 8 OFFSET 4", DB::SELECT)->execute();
		
		//$location = $data;
		//$location = implode("|" , $locations);

		//$start = 11;
 		//$result = DB::query('SELECT * FROM `images` WHERE location REGEXP ' . "'" .$location ."'" . " $max", DB::SELECT)->execute();
 		//echo $start;
 		$result = DB::select()->from('images')->where('location', 'IN', $locations)->offset($start)->limit($per_page)->execute();
 		//print_r($result);
 		//$result = DB::select()->from('images')->where('images.location', 'LIKE', $location)->execute();
		$img_amount = count($result);

		foreach($result as $item)
		{
			$url[] = $item['url'];
			$locations[] = $item['location'];
		}

		$imgdata = array();
		$imgdata["page_nums"] = $pages;
		$imgdata["numrows"] = $numrows;
		$imgdata["img_url"] = $url;
		$imgdata["page_limit"] = $per_page;
		$imgdata["locations"] = $data;
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

	public static function search_favpopular()
	{
		//too much doubling up of the same code as in the above function, need to clean this up 28/07/14
		$favpop_query = DB::query('SELECT * FROM `images` WHERE favstars BETWEEN ' .' 5 '. ' AND '. ' 10 ', DB::SELECT)->execute();
		$img_amount = count($favpop_query);
		$per_page = 8;

		$pages = ceil($img_amount/$per_page);

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

		foreach($favpop_query as $item)
		{
			$url[] = $item['url'];
		}

		$imgdata = array();
		$imgdata["img_url"] = $url;
		$imgdata["page_nums"] = $pages;
		$imgdata["$img_amount"] = $img_amount;

		//create the view
		$imgview = View::forge('listings/favourites');

		//assign variables for the view to use based on the data
		$imgview->set('img_url', $imgdata["img_url"], false);
		$imgview->set('page_nums', $imgdata["page_nums"], false);
		$imgview->set('img_amount', $imgdata["$img_amount"], false);

		echo $imgview;
		//echo $returnfavs;
	}

	//ideally I'd want to grab the same image data but populate the view with either favourites or searched results - figure out how to clean this up - atm it's messy
	/*public function return_imagedata()
	{
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

		return $imgview;
	}*/
}
?>