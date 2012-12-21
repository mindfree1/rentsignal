<?php

class Controller_Mapgen extends Controller_Template
{

	public function action_update()
	{
		$this->template->title = 'Mapgen &raquo; Update';
		$this->template->content = View::forge('mapgen/update');
	}

	public function action_load()
	{
		$this->template->title = 'Mapgen &raquo; Load';
		$this->template->content = View::forge('mapgen/load');
	}

}
