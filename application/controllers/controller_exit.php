<?php
	class Controller_Exit extends Controller
	{
		public function action_index()
		{
			session_start();
			$_SESSION = array();
			session_destroy();
			
			header("Location: http://localhost/site/" . parent::$language);
		}
	}