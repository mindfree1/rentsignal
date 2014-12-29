<?php
	use \View\propertydetails\propertyoverlay;
	use \Model\Mapgen;

	class Controller_PropertyDetails extends Controller
	{
		public function action_index()
		{
			//$locations[] = 'glebe';
			//$data['rentalimages'] = Mapgen::search_results($locations);

			if ($_SERVER['REQUEST_METHOD'] == 'GET') 
			{
				
				$data['location'] = $_GET['location'];
			}
			$propertyresults = Mapgen::search_images($data);
			//$propertyview = View::forge('propertydetails/propertyoverlay');

			//$propertyview->property = View::forge('propertydetails/propertyoverlay', array('title' => 'Sydney Test property view returned'));
			//return $propertyview;

			//return View::forge('propertydetails/propertyoverlay')->render();
			//propertyoverlay::get_results($data);
			//$results = Showlistings::get_results($data);
		}
	}
?>