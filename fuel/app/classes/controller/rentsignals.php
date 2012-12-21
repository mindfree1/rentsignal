<?php
class Controller_Rentsignals extends Controller_Template 
{

	public function action_index()
	{
		$data['rentsignals'] = Model_Rentsignals::find('all');
		$this->template->title = "Rentsignals";
		$this->template->content = View::forge('rentsignals/index', $data);

	}

	public function action_view($id = null)
	{
		$data['rentsignal'] = Model_Rentsignals::find($id);

		$this->template->title = "Rentsignal";
		$this->template->content = View::forge('rentsignals/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Rentsignals::validate('create');
			
			if ($val->run())
			{
				$rentsignal = Model_Rentsignals::forge(array(
					'location' => Input::post('location'),
					'description' => Input::post('description'),
					//'lat' => Input::post('lat'),
					//'long' => Input::post('long'),
					'rent' => Input::post('rent'),
					'avail_from' => Input::post('avail_from'),
					'rooms' => Input::post('rooms'),
					'bathrooms' => Input::post('bathrooms'),
				));

				if ($rentsignal and $rentsignal->save())
				{
					Session::set_flash('success', 'Added rentsignal #'.$rentsignal->id.'.');

					Response::redirect('rentsignals');
				}

				else
				{
					Session::set_flash('error', 'Could not save rentsignal.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Rentsignals";
		$this->template->content = View::forge('rentsignals/create');
		

	}

	public function action_edit($id = null)
	{
		$rentsignal = Model_Rentsignals::find($id);
		$val = Model_Rentsignals::validate('edit');

		if ($val->run())
		{
			$rentsignal->location = Input::post('location');
			$rentsignal->description = Input::post('description');
			//$rentsignal->lat = Input::post('lat');
			//$rentsignal->long = Input::post('long');
			$rentsignal->rent = Input::post('rent');
			$rentsignal->avail_from = Input::post('avail_from');
			$rentsignal->rooms = Input::post('rooms');
			$rentsignal->bathrooms = Input::post('bathrooms');

			if ($rentsignal->save())
			{
				Session::set_flash('success', 'Updated rentsignal #' . $id);

				Response::redirect('rentsignals');
			}

			else
			{
				Session::set_flash('error', 'Could not update rentsignal #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$rentsignal->location = $val->validated('location');
				$rentsignal->description = $val->validated('description');
				//$rentsignal->lat = $val->validated('lat');
				//$rentsignal->long = $val->validated('long');
				$rentsignal->rent = $val->validated('rent');
				$rentsignal->avail_from = $val->validated('avail_from');
				$rentsignal->rooms = $val->validated('rooms');
				$rentsignal->bathrooms = $val->validated('bathrooms');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('rentsignal', $rentsignal, false);
		}

		$this->template->title = "Rentsignals";
		$this->template->content = View::forge('rentsignals/edit');

	}

	public function action_delete($id = null)
	{
		if ($rentsignal = Model_Rentsignals::find($id))
		{
			$rentsignal->delete();

			Session::set_flash('success', 'Deleted rentsignal #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete rentsignal #'.$id);
		}

		Response::redirect('rentsignals');

	}


}