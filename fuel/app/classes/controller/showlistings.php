<?php
	
	Use \Model\Showlistings;
	Use \Model\Mapgen;

use \DB;
use \View;
use \Response;
use \Arr;

	class Controller_ShowListings extends Controller
	{
		
		public function action_getListings()
		{
			//to return which page of images should load
			if(isset($_GET['locations']))
			{
				$data['loc1'] = $_GET['locations'];
				$results = Showlistings::get_results($data);
			}
		}
		
		public function action_search()
		{

			if ($_SERVER['REQUEST_METHOD'] == 'POST') 
			{
				
				$data['rentmin'] = $_POST['rentmin'];
				$data['rentmax'] = $_POST['rentmax'];
				$data['rooms'] = $_POST['rooms'];
				$data['bathrooms'] = $_POST['bathrooms'];
				$data['ratings'] = $_POST['ratings'];

				$results = Mapgen::search_results($data);
			}
		}

		public function action_searchimages($locations)
		{
			$img_results = Mapgen::search_images($locations);
		}

		public function action_favpopular()
		{
			$results = Showlistings::search_favpopular();
		}

		public function action_returnimages()
		{
			if(isset($_GET["locations"]))
			{
				$data['loc1'] = $_GET["locations"];
				Showlistings::get_results($data);
			}
		}
	}
?>