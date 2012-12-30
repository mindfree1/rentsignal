<?php
Class Controller_About extends Controller 
{
	public function action_index()
	{
        $data = array();
		$data['name'] = "Trent Durfee";
		$data['age'] = 28;
		//echo "This is my first attempt at MVC architecture.";
		return View::forge('about', $data);
	}

	public function action_water()
	{
		echo "i'm thirsty";
	}

	public function action_supMe($name = '')
	{
		$data = array();
		$data['name'] = $name;
        $data['age'] = 28;
		return View::forge('about', $data);
	}
}
?>