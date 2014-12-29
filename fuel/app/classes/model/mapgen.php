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
		$locations[] = $data;
		//$query_images = DB::select()->from('images')->where($query_imagecount > 1)->and_where('location', 'IN', $locations)->group_by('propimg_id')->execute();

		$query_images = DB::select()->from('images')->where('location', 'IN', $locations)->join('rentsignals', 'LEFT OUTER')->on('rentsignals.id', '=', 'images.propimg_id')->group_by('rentsignals.id')->execute();
		print_r($query_images);

		//->execute();
		//->select('propimg_id')->(DB::expr('HAVING count(propimg_id > 1'))->from('images')->GROUP_BY('propimg_id')
		//$query_images->execute();
/*$query = DB::select()->from('users');

// Join a table
$query->join('profiles');
$query->on('users.id', '=', 'profiles.user_id');

SELECT  series.id,                                   
series.series_name,                                         
series.publisher_id,                                       
series.description, 
series.image, 
COUNT (product.id) as nRows 
FROM series 
LEFT OUTER JOIN product
ON series.id = product.series_id                    
WHERE series.genre = 'Fantasy and Magic'
GROUP BY series.id,                                   
series.series_name,                                         
series.publisher_id,                                       
series.description, 
series.image*/
		/*SELECT firstname, lastname, list.address FROM list
		INNER JOIN (SELECT address FROM list
		GROUP BY address HAVING count(id) > 1) dup ON list.address = dup.address*/

		foreach($query_images as $items)
		{
			$imageurls[] = $items['url'];
		}

		$image_count = count($query_images);

		$imgdata = array();
		$imgdata["images"] = $imageurls;
		$imgdata["image_amount"] = $image_count;

		//create the view
		$imgview = View::forge('propertydetails/propertyoverlay');

		//assign variables for the view to use based on the data
		$imgview->set('images', $imgdata["images"], false);
		$imgview->set('image_amount', $imgdata["image_amount"], false);
		
		echo $imgview;
	}
}
?>