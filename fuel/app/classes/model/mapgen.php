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
		$ratings = $data['ratings'];

		if($rooms == 'Any' || $brooms = 'Any')
		{	
			$query_results = DB::query('SELECT * FROM `rentsignals` WHERE rent BETWEEN '.$rentmin.' AND '. $rentmax,  DB::SELECT)->execute();
		}
		else
		{
			$rent_array = array($rentmin,$rentmax);
			$query_results =   DB::select()->from('rentsignals')->where_open()->where('rent', 'BETWEEN', $rent_array)->and_where('bathrooms', 'LIKE', $brooms)->and_where('rooms', 'LIKE', $rooms)->where_close()->execute();
		}
		
		//$query_results = DB::query('SELECT * FROM `rentsignals` WHERE rent BETWEEN '.$rentmin.' AND '.$rentmax, DB::SELECT)->execute();

		$numrows = count($query_results);

		foreach($query_results as $item)
		{
			$newdata["rentals"] = $item;
			$response[] = $newdata;
		}
		echo json_encode($response);
	}
}
?>