<?php

namespace Model;
use \DB;
use \View;
use \Response;
use \Model\Showlistings;
use Profiler;
//namespace DB;

Class Mapgen extends \Model
{
	public static function search_results($data)
	{	
		$rentmin = $data["rentmin"];
		$rentmax = $data["rentmax"];
		$rooms = $data['rooms'];
		$brooms = $data['bathrooms'];
		$ratings = $data['ratings'];

		/*if($rooms == 'Any' || $brooms = 'Any')
		{	
			$query_results = DB::query('SELECT * FROM `rentsignals` WHERE rent BETWEEN '.$rentmin.' AND '. $rentmax,  DB::SELECT)->execute();
		}
		else
		{*/
			$rent_array = array($rentmin,$rentmax);
			$query_results = DB::select()->from('rentsignals')->where_open()->and_where('rent', 'BETWEEN', $rent_array)->and_where('bathrooms', 'LIKE', $brooms)->and_where('rooms', 'LIKE', $rooms)->where_close()->execute();

			//SELECT * FROM `images` INNER JOIN rentsignals ON images.location=rentsignals.location WHERE images.location REGEXP ' . "'" .$location . "'", DB::SELECT)->execute();
		//}
		
		foreach($query_results as $item)
		{
    		$newdata["rentals"] = $item;
    		//$image_locations[] = $item['location'];
			$response[] = $newdata;
		}

		/*$query_images = DB::select()->from('images')->where('location', 'IN', $image_locations)->execute();
		foreach($query_images as $items)
		{
			$images_search["rental_images"] = $items;
			$image_response[] = $images_search;
			//$image_locations[] = $item['location'];
		}

		$imgdata = array();
		$imgdata["images_search"] = $image_response;

		//create the view
		$imgview = View::forge('propertydetails/propertyoverlay');

		//assign variables for the view to use based on the data
		$imgview->set('rentalimages', $imgdata["images_search"], false);*/

		echo json_encode($response);
	}

	public static function search_images($data)
	{
		$location = $data['location'];
		$id = $data['id'];
		//$query_images = DB::select()->from('images')->where($query_imagecount > 1)->and_where('location', 'IN', $locations)->group_by('propimg_id')->execute();

		$query_images = DB::select()->from('images')->join('rentsignals', 'INNER')->on('images.propimg_id', '=', 'rentsignals.id')->where('images.location', '=', $location)->and_where('images.propimg_id', '=', $id)->execute();

		foreach($query_images as $items)
		{
			$imageurls[] = $items['url'];
			//$description = $items['description'];
		}

		$image_count = count($query_images);

		$imgdata = array();
		$imgdata["images"] = $imageurls;
		$imgdata["description"] = $items['description'];
		$imgdata["favstars"] = $items['favstars'];
		$imgdata["image_amount"] = $image_count;

		//create the view
		$imgview = View::forge('propertydetails/propertyoverlay');

		//assign variables for the view to use based on the data
		$imgview->set('images', $imgdata["images"], false);
		$imgview->set('description', $imgdata["description"], false);
		$imgview->set('favstars', $imgdata["favstars"], false);
		$imgview->set('image_amount', $imgdata["image_amount"], false);
		
		echo $imgview;
	}
}
?>