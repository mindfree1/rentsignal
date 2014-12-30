<?php
	use \View\propertydetails\propertyoverlay;
	use \Model\Mapgen;

	class Controller_PropertyDetails extends Controller
	{
		public function action_index()
		{
			if ($_SERVER['REQUEST_METHOD'] == 'GET') 
			{
				$data['location'] = $_GET['location'];
				$data['id'] = $_GET['id'];
			}
			$propertyresults = Mapgen::search_images($data);
		}
	}
?>