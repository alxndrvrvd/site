<?php
	class Controller_Register extends Controller
	{
		public function action_index()
		{
			$this->view->displayRegisterForm('view_login', 
				'view_register', parent::$language);
		}

		public function action_registration()
		{
			if(empty($_REQUEST['login']) || empty($_REQUEST['email'])
				|| empty($_REQUEST['password']) || empty($_REQUEST['retype']))
				exit(header("Location: " . $_SERVER['HTTP_REFERER']));
			elseif($_REQUEST['password'] != $_REQUEST['retype'])
				exit(header("Location: " . $_SERVER['HTTP_REFERER']));

			$login = trim(htmlspecialchars($_REQUEST['login']));
			$email = trim(htmlspecialchars($_REQUEST['email']));
			$password = trim(htmlspecialchars($_REQUEST['password']));

			$data = $this->model->checkRegData($login, $email);

			if(!$data)
			{
				$data = $this->model->regUser($login, $password, $email);

				session_start();

				$_SESSION['id'] = $data['id'];
				$_SESSION['login'] = $data['login'];
				$_SESSION['email'] = $data['email'];
				$_SESSION['avatar'] = $data['avatar'];
				$_SESSION['status'] = $data['status'];
				$_SESSION['registration_date'] = $data['registration_date'];
				$_SESSION['login_time'] = $data['login_time'];

				header("Location: http://localhost/site/" . parent::$language);
			}
			else
				header("Location: " . $_SERVER['HTTP_REFERER']);
		}
	}