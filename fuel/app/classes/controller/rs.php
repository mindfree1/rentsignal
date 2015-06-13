<?php

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 * 
 * @package  app
 * @extends  Controller
 */
class Controller_Rs extends Controller
{

	/**
	 * The basic welcome message
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		return Response::forge(View::forge('rs/index'));
		$this->template->content = View::forge('rs/index', $data);
	}

	/**
	 * A typical "Hello, Bob!" type example.  This uses a ViewModel to
	 * show how to use them.
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_hello()
	{
		return Response::forge(ViewModel::forge('rs/hello'));
	}

	/**
	 * The 404 action for the application.
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(ViewModel::forge('rs/404'), 404);
	}
}
