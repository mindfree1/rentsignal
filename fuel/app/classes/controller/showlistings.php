<?php
	
	Use \Model\Showlistings;
	Use \Model\Mapgen;
	Use \ViewModel\mapper;

	class Controller_ShowListings extends Controller
	{
		//$rentmin, $rentmax, $numrooms, $numbathrooms
		public function action_getListings()
		{
			$results = Showlistings::get_results();

			echo $results;
			//return View::forge('listings/listings', $results);
		}
		
		public function action_search()
		{

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				
				$data['rentmin'] = $_POST['rentmin'];
				$data['rentmax'] = $_POST['rentmax'];
				$data['rooms'] = $_POST['rooms'];
				$data['bathrooms'] = $_POST['bathrooms'];
				
				$results = Mapgen::search_results($data);
				
			}
			
			//echo $rentmin;
			//$data['rentmin'] = '300';
			//$search_results = Showlistings::search();
		}
	}

?>