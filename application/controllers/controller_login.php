<?php
	class Controller_Login extends Controller
	{
		public function action_index()
		{
			if(isset($_REQUEST['submit']) && ($_REQUEST['submit'] == 'Enter'
				|| $_REQUEST['submit'] == 'Вхід'))
			{
				session_start();

				$url =  $_SERVER['HTTP_REFERER'];
			
				if(!empty($_REQUEST['login']) && !empty($_REQUEST['password']))
				{
					$login = trim(htmlspecialchars($_REQUEST['login']));
					$password = trim(htmlspecialchars($_REQUEST['password']));
				}
				else
				{
					$_SESSION['login_status'] = 'Login or password was not entered';
					header("Location: " . $url);
				}
				
				$users_data = $this->model->check_login($login);

				if(!$users_data)
				{
					$_SESSION['login_status'] = 'User with such login is not exist or not registered';
					header("Location: " . $url);
				}
				elseif(is_array($users_data))
				{	
					$_SESSION['id'] = $users_data['id'];
					$_SESSION['login'] = $users_data['login'];
					$_SESSION['email'] = $users_data['email'];
					$_SESSION['avatar'] = $users_data['avatar'];
					$_SESSION['status'] = $users_data['status'];
					$_SESSION['registration_date'] = $users_data['registration_date'];
					$_SESSION['login_time'] = $users_data['login_time'];
					
					header("Location: " . $url);
				}
			}
		}
	}