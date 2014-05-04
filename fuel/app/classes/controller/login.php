<?php

class Controller_Login extends Controller_Template
{

	public function action_signup()
	{
		$this->template->title = 'Login';
		$this->template->content = View::forge('login/signup');
	}

	public function action_index()
	{
		$this->template->title = 'Login';
		$this->template->content = View::forge('login/index');
	}
}
?>