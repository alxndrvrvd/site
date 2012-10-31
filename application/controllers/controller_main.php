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
					if(parent::$language === 'ua')
					{
						mb_internal_encoding("UTF-8");
						
						$len = mb_strlen($data[$i][$language . "_text"]);

						if($len > MAX_LENGTH)
						{
							$text = mb_substr($data[$i][$language . "_text"], 0, MAX_LENGTH);
							$data[$i][$language . "_text"] = $text . "...";
						}
					}
					else
					{
						$len = strlen($data[$i][$language . "_text"]);

						if($len > MAX_LENGTH)
						{
							$text = substr($data[$i][$language . "_text"], 0, MAX_LENGTH);

							$data[$i][$language . "_text"] = $text . "...";
						}
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