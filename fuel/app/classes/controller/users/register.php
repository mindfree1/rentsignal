<?php	

	class Controller_Users_Register extends Controller_Template
	{
		
		public function action_index()
		{
			//$data['register'] = Model_Register::find('all');
			//$this->template->title = "Rentsignal Register";
			//$this->template->content = View::forge('users/register/index', $data);

			return Response::forge(View::forge('users/register/index'));
			$this->template->content = View::forge('users/register/index', $data);
		}

		public function action_register()
		{
    // is registration enabled?
    /*if ( ! \Config::get('application.user.registration', false))
    {
        // inform the user registration is not possible
        //\Messages::error(__('login.registation-not-enabled'));

    	echo 'registration not possible';

        // and go back to the previous page (or the homepage)
        \Response::redirect_back();
    }*/

    // create the registration fieldset
    $form = \Fieldset::forge('registerform');

    // add a csrf token to prevent CSRF attacks
    $form->form()->add_csrf();

    // and populate the form with the model properties
    $form->add_model('Model\\Auth_User');

    // add the fullname field, it's a profile property, not a user property
    $form->add_after('fullname', __('login.form.fullname'), array(), array(), 'username')->add_rule('required');

    // add a password confirmation field
    $form->add_after('confirm', __('login.form.confirm'), array('type' => 'password'), array(), 'password')->add_rule('required');

    // make sure the password is required
    $form->field('password')->add_rule('required');

    // and new users are not allowed to select the group they're in (duh!)
    //$form->field('group_id')->add_rule('disable');

    /*$form->add(
    'groupid', 'User Role',
    array('type' => 'name', 'class' => 'pretty_input'),
    array(array('disable'), array('valid_string', array('alpha-numeric', 'dots', 'spaces')))
);*/
    //$form->disable('group_id');

    // since it's not on the form, make sure validation doesn't trip on its absence
    //$form->field('groupid')->delete_rule('required')->delete_rule('is_numeric');

    // fetch the oauth provider from the session (if present)
    $provider = \Session::get('auth-strategy.authentication.provider', false);

    // if we have provider information, create the login fieldset too
    if ($provider)
    {
        // disable the username, it was passed to us by the Oauth strategy
        $form->field('username')->set_attribute('readonly', true);

        // create an additional login form so we can link providers to existing accounts
        $login = \Fieldset::forge('loginform');
        $login->form()->add_csrf();
        $login->add_model('Model\\Auth_User');

        // we only need username and password
        //$login->disable('groupid')->disable('email');

        // since they're not on the form, make sure validation doesn't trip on their absence
        //$login->field('groupid')->delete_rule('required')->delete_rule('is_numeric');
        $login->field('email')->delete_rule('required')->delete_rule('valid_email');
    }

    // was the registration form posted?
    if (\Input::method() == 'POST')
    {
        // was the login form posted?
        if ($provider and \Input::post('login'))
        {
            // check the credentials.
            if (\Auth::instance()->login(\Input::param('username'), \Input::param('password')))
            {
                // get the current logged-in user's id
                list(, $userid) = \Auth::instance()->get_user_id();

                // so we can link it to the provider manually
                $this->link_provider($userid);

                // inform the user we're linked
                //\Messages::success(sprintf(__('login.provider-linked'), ucfirst($provider)));

                // logged in, go back where we came from,
                // or the the user dashboard if we don't know
                \Response::redirect_back('users/dashboard');
            }
            else
            {
                // login failed, show an error message
                //\Messages::error(__('login.failure'));
            }
        }

        // was the registration form posted?
        elseif (\Input::post('register'))
        {
            // validate the input
            $form->validation()->run();

            // if validated, create the user
            if ( ! $form->validation()->error())
            {
                try
                {
                    // call Auth to create this user
                    $created = \Auth::create_user(
                        $form->validated('username'),
                        $form->validated('password'),
                        $form->validated('email'),
                        \Config::get('application.user.default_group', 1),
                        array(
                            'fullname' => $form->validated('fullname'),
                        )
                    );

                    // if a user was created succesfully
                    if ($created)
                    {
                        // inform the user
                        //\Messages::success(__('login.new-account-created'));

                        // and go back to the previous page, or show the
                        // application dashboard if we don't have any
                        \Response::redirect_back('dashboard');
                    }
                    else
                    {
                        // oops, creating a new user failed?
                        //\Messages::error(__('login.account-creation-failed'));
                    }
                }

                // catch exceptions from the create_user() call
                catch (\SimpleUserUpdateException $e)
                {
                    // duplicate email address
                    if ($e->getCode() == 2)
                    {
                        //\Messages::error(__('login.email-already-exists'));
                    }

                    // duplicate username
                    elseif ($e->getCode() == 3)
                    {
                        //\Messages::error(__('login.username-already-exists'));
                    }

                    // this can't happen, but you'll never know...
                    else
                    {
                        //\Messages::error($e->getMessage());
                    }
                }
            }
        }

        // validation failed, repopulate the form from the posted data
        $form->repopulate();
    }
    else
    {
        // get the auth-strategy data from the session (created by the callback)
        $user_hash = \Session::get('auth-strategy.user', array());

        // populate the registration form with the data from the provider callback
        $form->populate(array(
            'username' => \Arr::get($user_hash, 'nickname'),
            'fullname' => \Arr::get($user_hash, 'name'),
            'email' => \Arr::get($user_hash, 'email'),
        ));
    }

    // pass the fieldset to the form, and display the new user registration view
    return \View::forge('users/register/index')->set('form', $form, false)->set('login', isset($login) ? $login : null, false);
}	
	}
?>