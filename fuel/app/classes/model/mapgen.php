<?php

namespace Model;
use \DB;
use \View;
use \Response;

//namespace DB;

Class Mapgen extends \Model
{
	public static function search_results($data)
	{	
		$rentmin = $data["rentmin"];
		$rentmax = $data["rentmax"];
		$rooms = $data['rooms'];
		$brooms = $data['bathrooms'];

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
			$response[] = $newdata;
		}
		echo json_encode($response);
	
		//return $query_results;
	}
	
/*	foreach ($rows as $row)
{
	$data["uid"] = $row["DeviceID"];
		$data["deviceInfo"]["Longitude"] = $row["Longitude"];
		$data["deviceInfo"]["Latitude"] = $row["Latitude"];
		$data["deviceInfo"]["Type"] = $row["Type"];
		$data["deviceInfo"]["latlontime"] = $row["latlontime"];

		$response[] = $data;
	}

	echo json_encode($response);
	*/
}
?>