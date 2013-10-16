<?php
	
	Use \Model\Showlistings;
	Use \Model\Mapgen;

	class Controller_ShowListings extends Controller
	{
		
		public function action_getListings()
		{
			//to return which page of images should load
			//$data['pages'] = $_GET['pages'];
			$data['loc1'] = $_GET['locations'];
			$results = Showlistings::get_results($data);
			//echo $results;
			//return View::forge('listings/listings', $results);
		}
		
		public function action_search()
		{

			if ($_SERVER['REQUEST_METHOD'] == 'POST') 
			{
				
				$data['rentmin'] = $_POST['rentmin'];
				$data['rentmax'] = $_POST['rentmax'];
				$data['rooms'] = $_POST['rooms'];
				$data['bathrooms'] = $_POST['bathrooms'];
				
				$results = Mapgen::search_results($data);

				/*$view = View::forge('listings/listings');
				$this->template->content = $view;
				$this->template->title = 'Images';*/
				//$img_results = ShowListings::get_results($imagedata);
				//echo $results;
			}
		}

		public function action_returnimages()
		{
			$data['loc1'] = $_GET['locations'];
			Showlistings::get_results($data);
		}
	}
?>