<?php
	class Controller_Edit extends Controller
	{
		private $data;
		private $id;

		public function action_index()
		{
			$this->id = $_REQUEST['article_id'];

			$this->data = $this->model->getArticle($this->id);

			session_start();
			
			if(isset($_SESSION['login']))
				$this->view->displayEditPage('view_user', 
					'view_edit', $this->data, parent::$language);
		}

		public function action_save()
		{
			if(!empty($_REQUEST['header']) && !empty($_REQUEST['text']))
			{
				$header = trim(htmlspecialchars($_REQUEST['header']));
				$text = trim(htmlspecialchars($_REQUEST['text']));
			}

			$this->id = $_REQUEST['article_id'];

			$this->model->saveArticle($header, $text, $this->id, parent::$language);
			
			header("Location: http://localhost/site/" . parent::$language . "/read");
		}

		public function action_delete()
		{
			$this->id = $_REQUEST['article_id'];

			$this->model->deleteArticle($this->id);
			
			header("Location: http://localhost/site/" . parent::$language);
		}
	}