<?php
	class Controller_Add extends Controller
	{
		public function action_index()
		{
			session_start();
			
			$this->view->displayAddPage('view_user',
				'view_add', null, parent::$language);
		}

		public function action_add_article()
		{
			if(isset($_REQUEST['ua_header'], $_REQUEST['en_header'],
				$_REQUEST['en_text'], $_REQUEST['ua_text']))
			{
				$en_header = trim(htmlspecialchars($_REQUEST['en_header']));
				$ua_header = trim(htmlspecialchars($_REQUEST['ua_header']));
				$en_text = trim(htmlspecialchars($_REQUEST['en_text']));
				$ua_text = trim(htmlspecialchars($_REQUEST['ua_text']));

				session_start();

				$this->model->addArticle($_SESSION['login'], $en_header,
					$ua_header, $en_text, $ua_text);

				header("Location: http://localhost/site/" . parent::$language);
			}
			else
				header("Location: http://localhost/site/" . parent::$language);
		}
	}