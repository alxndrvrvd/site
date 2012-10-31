<?php
	class Controller_Read extends Controller
	{
		public function action_index()
		{
			session_start();

			if(isset($_REQUEST['id']))
				$_SESSION['article_id'] = $_REQUEST['id'];

			$id = $_SESSION['article_id'];

			$data['article'] = $this->model->getArticleText($id);
			$data['comments'] = $this->model->getComments($id);
			
			if(!empty($_SESSION['login']))
			{
				$grade = $this->model->getGrade($_SESSION['login'], $id);
				$_SESSION['user_grade'] = $grade[0]['grade'];
				
				$grades = $this->model->getGrades($id);

				if($grades !== false)
				{
					for($i = 0; $i != count($grades); $i++)
						$average_grade += $grades[$i]['grade'];

					$_SESSION['average_grade'] = $average_grade / count($grades);
					$_SESSION['grades'] = count($grades);
				}
				else
				{
					unset($_SESSION['average_grade']);
					unset($_SESSION['grades']);
				}

				$this->view->displayReadPage('view_user',
					'view_read', $data, parent::$language);
			}
			else
				$this->view->displayReadPage('view_login',
					'view_read', $data, parent::$language); 
		}

		public function action_add_comment()
		{
			$article_id = $_REQUEST['article_id'];
			$author = $_REQUEST['author'];

			$comment_header = trim(htmlspecialchars($_REQUEST['comment_header']));
			$comment_text = trim(htmlspecialchars($_REQUEST['comment_text']));

			if(empty($comment_header))
				$comment_header = substr($comment_text, 0, 15);

			$data = array($comment_header, $comment_text);

			$this->model->addComment($author, $article_id, $data, parent::$language);

			header("Location: " . $_SERVER['HTTP_REFERER']);
		}

		public function action_delete_comment()
		{
			$id = $_REQUEST['comment_id'];
			$this->model->delete_comment($id);
			header("Location: " . $_SERVER['HTTP_REFERER']);
		}

		public function action_vote()
		{
			$login = $_REQUEST['login'];
			$article_id = $_REQUEST['article_id'];
			$grade = $_REQUEST['grade'];

			$this->model->setGrade($login, $article_id, $grade);
			header("Location: " . $_SERVER['HTTP_REFERER']);
		}

		public function action_delete_grade()
		{
			$login = $_REQUEST['login'];
			$article_id = $_REQUEST['article_id'];

			$this->model->deleteGrade($login, $article_id);
			header("Location: " . $_SERVER['HTTP_REFERER']);
		}
	}