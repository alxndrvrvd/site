<?php
	class Controller_Main extends Controller
	{
		public function action_index()
		{
			$data = $this->model->getArticles();

			$language = parent::$language;

			define(MAX_LENGTH, 150);

			if(defined('MAX_LENGTH'))
			{
				for($i = 0; $i != count($data); $i++)
				{
					if(strlen($data[$i][$language . "_text"]) > MAX_LENGTH)
					{
						$text = substr($data[$i][$language . "_text"], 0, MAX_LENGTH);

						$data[$i][$language . "_text"] = $text . "...";
					}
				}
			}

			session_start();

			if(!empty($_SESSION['login']))
				$this->view->displayMainPage('view_user',
					'view_articles', $data, parent::$language);
			else
				$this->view->displayMainPage('view_login',
					'view_articles', $data, parent::$language);
		}
	}