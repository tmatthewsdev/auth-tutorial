<?php

class Controller_App extends Controller_Base
{
	public function before()
	{
		parent::before();

		$this->_init_user();
	}


	private function _init_user()
	{
		if (Auth::check())
		{
			$user_id    = Auth::get_user_id();
			$this->user = Model_User::get_by_id($user_id);
		}
		else
		{
			$this->user = false;
		}
	}


	public function is_logged_in()
	{
		return isset($this->user);
	}

	public function require_auth()
	{
		if (! $this->is_logged_in())
		{
			$this->redirect('site/login', 'error', 'Please login');
		}
	}

}