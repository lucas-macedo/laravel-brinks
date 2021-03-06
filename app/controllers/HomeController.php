<?php

class HomeController extends BaseController {

	 protected $layout = 'layouts.defaut';

	public function showWelcome()
	{
		 $this->layout->content = View::make('hello');
	}

	public function showLogin()
	{
		
		return View::make('login');
	}


	public function doLogout()
	{
		Auth::user()->logout();
        return Redirect::to('/');
	}


	public function doLogin()
	{
		// validate the info, create rules for the inputs
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('/')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$userdata = array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password')
			);
			
			Auth::customer()->attempt(array(
		   		 'email'     => $userdata['email'],
				 'password'  => $userdata['password'],
				));
			

			// attempt to do the login
			if (Auth::customer()->check()) {
				return Redirect::to('/');
				

			} else {	 	

				// validation not successful, send back to form	
				return Redirect::to('/');

			}

		}
	}


}
