<?php

class Controller_Site extends Controller_App
{
	public function get_index()
	{
		$this->require_auth();
		
	}


	public function get_create()
	{
		try
		{
			Auth::create_user('tmatthewsdev@gmail.com', 'pass', 'tmatthewsdev@gmail.com');
		}
		catch (Auth\SimpleUserUpdateException $e)
		{
			return $e->getMessage();
		}
		
		return 'user created';
	}


	public function get_login()
	{
		$success = Auth::login('tmatthewsdev@gmail.com', 'pass');

		return $success ? 'logged_in' : 'login_error';
	}

	public function get_check()
	{
		return Auth::check() ? 'logged_in' : 'unauth';
	}

	public function get_logout()
	{
		return Auth::logout();
	}

	public function get_id()
	{
		return Auth::get_user_id();
	}
}