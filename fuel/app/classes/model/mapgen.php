<?php

namespace Model;
use \DB;
use \View;
use \Response;
Use \Model\Showlistings;
//namespace DB;

Class Mapgen extends \Model
{
	public static function search_results($data)
	{	
		$rentmin = $data["rentmin"];
		$rentmax = $data["rentmax"];
		$rooms = $data['rooms'];
		$brooms = $data['bathrooms'];
	
		//echo 'location is' .$location;
		
		if($rooms == 'Any' || $brooms = 'Any')
		{	
			$query_results = DB::query('SELECT * FROM `rentsignals` WHERE rent BETWEEN '.$rentmin.' AND '. $rentmax,  DB::SELECT)->execute();
		}
		else
		{	
			$query_results = DB::query('SELECT * FROM `rentsignals` WHERE rent BETWEEN '.$rentmin.' AND '. $rentmax .
			' AND rooms LIKE' . $rooms . ' AND bathrooms LIKE ' . $brooms, DB::SELECT)->execute();
		}
		
		$numrows = count($query_results);

		foreach($query_results as $item)
		{
			$newdata["rentals"] = $item;
			//$imagedata[] = $item['location'];
			$response[] = $newdata;
		}
		//$img_results = ShowListings::get_results($imagedata);
		echo json_encode($response);
	}
}
?>