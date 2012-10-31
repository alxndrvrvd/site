<?php
	class View
	{
		static $lang_array;

		private $form_1;
		private $form_2;

		public function displayMainPage($sign_in, $content, $data, $lang)
		{
			session_start();

			if($sign_in == 'view_user')
				$this->form_1 = self::$lang_array['view_user'];
			else
				$this->form_1 = self::$lang_array['view_login'];

			$this->form_2 = self::$lang_array['view_articles'];

			$page_title = 'Main page';
			require_once 'application/views/template.php';
		}

		public function displayReadPage($sign_in, $content, $data, $lang)
		{
			session_start();
			
			if($sign_in == 'view_user')
				$this->form_1 = self::$lang_array['view_user'];
			else
				$this->form_1 = self::$lang_array['view_login'];

			$this->form_2 = self::$lang_array['view_read'];

			$page_title = 'Read more';
			$article = $data['article'];
			$comments = $data['comments'];
	
			require_once 'application/views/template.php';
		}

		public function displayEditPage($sign_in, $content, $data, $lang)
		{
			session_start();

			if($sign_in == 'view_user')
				$this->form_1 = self::$lang_array['view_user'];
			else
				$this->form_1 = self::$lang_array['view_login'];

			$this->form_2 = self::$lang_array['view_edit'];

			$page_title = "Edit article";

			require_once 'application/views/template.php';
		}

		public function displayAddPage($sign_in, $content, $data, $lang)
		{
			if($sign_in == 'view_user')
				$this->form_1 = self::$lang_array['view_user'];
			else
				$this->form_1 = self::$lang_array['view_login'];

			$this->form_2 = self::$lang_array['view_add'];

			$page_title = "Add article";
			require_once 'application/views/template.php';
		}

		public function displayRegisterForm($sign_in, $content, $lang)
		{
			if($sign_in == 'view_user')
				$this->form_1 = self::$lang_array['view_user'];
			else
				$this->form_1 = self::$lang_array['view_login'];

			$this->form_2 = self::$lang_array['view_register'];

			$page_title = "Registration";
			require_once 'application/views/template.php';
		}

		public function displayUserProfile($sign_in, $content, $lang)
		{
			session_start();

			$this->form_1 = self::$lang_array['view_user'];

			$this->form_2 = self::$lang_array['view_profile'];

			$page_title = "Profile";
			require_once 'application/views/template.php';
		}

		public function displayEditProfileForm($sign_in, $content, $lang)
		{
			session_start();

			$this->form_1 = self::$lang_array['view_user'];

			$this->form_2 = self::$lang_array['view_edit_profile'];

			$page_title = "Edit profile";
			require_once "application/views/template.php";
		}

		public function displayUsersProfiles($sign_in, $content, $data, $lang)
		{
			session_start();

			$this->form_1 = self::$lang_array['view_user'];

			$this->form_2 = self::$lang_array['view_profiles'];

			$page_title = "View profiles";
			require_once 'application/views/template.php';
		}
	}