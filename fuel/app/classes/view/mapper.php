<?php

//namespace Model;
use \DB;
use \View;
use \Response;
//use ViewModel;

//namespace DB;

Class View_mapper extends ViewModel
{
	public function view()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data['rentmin'] = $_POST['rentmin'];
			$data['rentmax'] = $_POST['rentmax'];
			$data['rooms'] = $_POST['rooms'];
			$data['bathrooms'] = $_POST['bathrooms'];
			
			$rentmin = $data["rentmin"];
			$rentmax = $data["rentmax"];
		}
		
		$this->lat = "-33.880815";
		$this->lng = "151.187791";
		//$this->rentmin = $rentmin;
		//$this->rentmax = $rentmax;
	}
}

/*Class Mapgen extends \Model
{
	public static function search_results($data)
	{	
		$rentmin = $data["rentmin"];
		$rentmax = $data["rentmax"];
		
		$query_results = DB::query('SELECT * FROM `rentsignals` WHERE rent BETWEEN '."'$".$rentmin."' " .'AND '."'$". $rentmax."'", DB::SELECT)->execute();
		$numrows = count($query_results);
		
		var_dump($query_results);
		/*$data['page_nums'] = $pages;
		$data['numrows'] = $numrows;
		
		foreach($result as $item)
		{
			$url[] = $item['url'];
		}
	
		return Response::forge(View::forge('mapgen/create', $query_results));
	}
}*/
?>