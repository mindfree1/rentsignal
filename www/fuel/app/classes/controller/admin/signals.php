<?php
class Controller_Admin_Signals extends Controller_Admin 
{

	public function action_index()
	{
		$data['signals'] = Model_Signal::find('all');
		$this->template->title = "Signals";
		$this->template->content = View::forge('admin\signals/index', $data);

	}

	public function action_view($id = null)
	{
		$data['signal'] = Model_Signal::find($id);

		$this->template->title = "Signal";
		$this->template->content = View::forge('admin\signals/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Signal::validate('create');
			
			if ($val->run())
			{
				$signal = Model_Signal::forge(array(
					'title' => Input::post('title'),
					'tags' => Input::post('tags'),
					'short_description' => Input::post('short_description'),
					'lng_description' => Input::post('lng_description'),
					'location' => Input::post('location'),
					'lat' => Input::post('lat'),
					'lng' => Input::post('lng'),
					'rent' => Input::post('rent'),
					'avail_from' => Input::post('avail_from'),
					'rooms' => Input::post('rooms'),
					'bathrooms' => Input::post('bathrooms'),
					'user_id' => Input::post('user_id'),
				));

				if ($signal and $signal->save())
				{
					Session::set_flash('success', 'Added signal #'.$signal->id.'.');

					Response::redirect('admin/signals');
				}

				else
				{
					Session::set_flash('error', 'Could not save signal.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Signals";
		$this->template->content = View::forge('admin\signals/create');

	}

	public function action_edit($id = null)
	{
		$signal = Model_Signal::find($id);
		$val = Model_Signal::validate('edit');

		if ($val->run())
		{
			$signal->title = Input::post('title');
			$signal->tags = Input::post('tags');
			$signal->short_description = Input::post('short_description');
			$signal->lng_description = Input::post('lng_description');
			$signal->location = Input::post('location');
			$signal->lat = Input::post('lat');
			$signal->lng = Input::post('lng');
			$signal->rent = Input::post('rent');
			$signal->avail_from = Input::post('avail_from');
			$signal->rooms = Input::post('rooms');
			$signal->bathrooms = Input::post('bathrooms');
			$signal->user_id = Input::post('user_id');

			if ($signal->save())
			{
				Session::set_flash('success', 'Updated signal #' . $id);

				Response::redirect('admin/signals');
			}

			else
			{
				Session::set_flash('error', 'Could not update signal #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$signal->title = $val->validated('title');
				$signal->tags = $val->validated('tags');
				$signal->short_description = $val->validated('short_description');
				$signal->lng_description = $val->validated('lng_description');
				$signal->location = $val->validated('location');
				$signal->lat = $val->validated('lat');
				$signal->lng = $val->validated('lng');
				$signal->rent = $val->validated('rent');
				$signal->avail_from = $val->validated('avail_from');
				$signal->rooms = $val->validated('rooms');
				$signal->bathrooms = $val->validated('bathrooms');
				$signal->user_id = $val->validated('user_id');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('signal', $signal, false);
		}

		$this->template->title = "Signals";
		$this->template->content = View::forge('admin\signals/edit');

	}

	public function action_delete($id = null)
	{
		if ($signal = Model_Signal::find($id))
		{
			$signal->delete();

			Session::set_flash('success', 'Deleted signal #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete signal #'.$id);
		}

		Response::redirect('admin/signals');

	}


}