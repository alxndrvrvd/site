<?php
	class Model
	{
		public $DBH;

//....................................CONSTRUCTOR.....................................
		public function __construct()
		{
			try
			{
				$this->DBH = new PDO('mysql:host=localhost; dbname=users_db',
					'alexander', '114afb2');
				$this->DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $exception)
			{
				echo __LINE__ . " " . $exception->getMessage();
			}
		}
//....................................................................................
//..................................GET ARTICLES......................................
		public function getArticles()
		{
			try
			{
				$STH = $this->DBH->prepare('SELECT * FROM users_article');
				$STH->execute();
				$articles = $STH->fetchAll(PDO::FETCH_ASSOC);
			}
			catch(PDOException $exception)
			{
				echo __LINE__ . " " . $exception->getMessage();
			}

			return $articles;
		}
//.....................................................................................

//................................GET FULL ARTICLE TEXT...............................
		public function getArticleText($article_id)
		{
			try
			{
				$STH = $this->DBH->prepare('SELECT * FROM users_article 
					WHERE id=?');
				$STH->bindParam(1, $id);
				$id = $article_id;
				$STH->execute();
				$article = $STH->fetchAll();
			}
			catch(PDOException $exception)
			{
				echo __LINE__ . " " . $exception->getMessage();
			}

			return $article;
		}
//.....................................................................................

//................................GET COMMENTS.........................................
		public function getComments($article_id)
		{
			try
			{
				$STH = $this->DBH->prepare('SELECT * FROM comments WHERE article_id=?');
				$STH->bindParam(1, $id);
				$id = $article_id;
				$STH->execute();
				$comments = $STH->fetchAll(PDO::FETCH_ASSOC);
			}
			catch(PDOException $exception)
			{
				echo __LINE__ . " " . $exception->getMessage();
			}

			return $comments;
		}
//.....................................................................................

//...............................ADD COMMENT...........................................
		public function addComment($author, $article_id, $comment, $lang)
		{
			($lang === 'ua') ? 
				$query = 'INSERT INTO comments 
					(author, comment_theme_ua, comment_text_ua, comment_date, article_id) 
					VALUES (?, ?, ?, ?, ?)'
				:
				$query = 'INSERT INTO comments 
					(author, comment_theme_en, comment_text_en, comment_date, article_id) 
					VALUES (?, ?, ?, ?, ?)';

			try
			{
				$STH = $this->DBH->prepare($query);
				$comment_data = 
					array($author, $comment[0], $comment[1], date('Y-m-d H:i:s'), $article_id);
				$STH->execute($comment_data);
			}
			catch(PDOException $exception)
			{
				echo __LINE__ . $exception->getMessage();
			}
		}
//.......................................................................................
//......................................DELETE COMMENT...................................
		public function delete_comment($comment_id)
		{
			try
			{
				$STH = $this->DBH->prepare('DELETE FROM comments WHERE id=?');
				$STH->bindParam(1, $id);
				$id = $comment_id;
				$STH->execute();
			}
			catch(PDOException $exception)
			{
				echo __LINE__ . " " . $exception->getMessage();
			}
		}
//.......................................................................................
//.....................................MODEL_LOGIN.......................................
		public function check_login($login)
		{
			try
			{
				$result = $this->DBH->query("SELECT * FROM users_list WHERE login='$login'");

				if(!$result)
					return false;
				
				$STH = $this->DBH->prepare('UPDATE users_list SET login_time=? WHERE login=?');
				$STH->bindParam(1, $first_param);
				$STH->bindParam(2, $second_param);

				$first_param = date("Y-m-d H:i:s");
				$second_param = $login;

				$STH->execute();

				$STH = $this->DBH->prepare('SELECT * FROM users_list WHERE login=?');
				$STH->bindParam(1, $param);
				$param = $login;
				$STH->execute();
				return $STH->fetch(PDO::FETCH_ASSOC);
			}
			catch(PDOException $exception)
			{
				echo  __LINE__ . " " . $exception->getMessage();
			}
		}
//.............................................................................
//..................................GET GRADE..................................
		public function getGrade($login, $article_id)
		{
			try
			{
				$STH = $this->DBH->prepare(
					'SELECT grade FROM grades WHERE login=? AND article_id=?');
				$params = array($login, $article_id);
				$STH->execute($params);
				$grade = $STH->fetchAll(PDO::FETCH_ASSOC);

				if(empty($grade))
					return false;

				return $grade;
			}
			catch(PDOException $exception)
			{
				echo __LINE__ . " " . $exception->getMessage();
			}
		}
//................................................................................
//..............................GET ALL GRADES....................................
		public function getGrades($article_id)
		{
			try
			{
				$STH = $this->DBH->prepare(
					'SELECT grade FROM grades WHERE article_id=?');
				$STH->bindParam(1, $id);
				$id = $article_id;
				$STH->execute();
				$grades = $STH->fetchAll(PDO::FETCH_ASSOC);

				if(empty($grades))
					return false;
				return $grades;
			}
			catch(PDOException $exception)
			{
				echo __LINE__ . " " . $exception->getMessage();
			}
		}
//..................................................................................
//..................................ADD GRADE.......................................
		public function setGrade($login, $article_id, $grade)
		{
			try
			{
				$STH = $this->DBH->prepare('INSERT INTO grades (
					login, grade, article_id) VALUES (?, ?, ?)');
				$params = array($login, $grade, $article_id);
				$STH->execute($params);
			}
			catch(PDOException $exception)
			{
				echo __LINE__ . " " . $exception->getMessage();
			}
		}
//...................................................................................
//................................DELETE GRADE.......................................
		public function deleteGrade($login, $article_id)
		{
			try
			{
				$STH = $this->DBH->prepare('DELETE FROM grades WHERE
					login=? AND article_id=?');
				$params = array($login, $article_id);
				$STH->execute($params);
			}
			catch(PDOException $exception)
			{
				echo __LINE__ . " " . $exception->getMessage();
			}
		}
//....................................................................................
//................................GET ARTICLE.........................................
		public function getArticle($article_id)
		{
			try
			{
				$STH = $this->DBH->prepare('SELECT * FROM users_article
					WHERE id=?');
				$STH->bindParam(1, $id);
				$id = $article_id;
				$STH->execute();
				$article = $STH->fetchAll(PDO::FETCH_ASSOC);
				return $article;
			}
			catch(PDOException $exception)
			{
				echo $exception->getMessage();
			}
		}
//......................................................................................
//..................................SAVE ARTICLE........................................
		public function saveArticle($header, $text, $id, $lang)
		{
			($lang === 'ua') ?
				$query = 'UPDATE users_article 
					SET ua_header=?, ua_text=?, date=? WHERE id=?'
				:
				$query = 'UPDATE users_article 
					SET en_header=?, en_text=?, date=? WHERE id=?';

			try
			{
				$STH = $this->DBH->prepare($query);
				$params = array($header, $text, date('Y-m-d H:i:s'), $id);
				$STH->execute($params);
			}
			catch(PDOException $exception)
			{
				echo $exception->getMessage();
			}
		}
//......................................................................................
//.................................DELETE ARTICLE.......................................
		public function deleteArticle($article_id)
		{
			try
			{
				$STH = $this->DBH->prepare('DELETE FROM users_article WHERE id=?');
				$STH->bindParam(1, $id);
				$id = $article_id;
				$STH->execute();

				$STH = $this->DBH->prepare('DELETE FROM comments WHERE article_id=?');
				$STH->bindParam(1, $comments);
				$comments = $article_id;
				$STH->execute();

				$STH = $this->DBH->prepare('DELETE FROM grades WHERE article_id=?');
				$STH->bindParam(1, $grades);
				$grades = $article_id;
				$STH->execute();
			}
			catch(PDOException $exception)
			{
				echo $exception->getMessage();
			}
		}
//........................................................................................
//...............................ADD ARTICLE..............................................
		public function addArticle($author, $en_header, $ua_header, 
			$en_text, $ua_text)
		{
			try
			{
				$STH = $this->DBH->prepare('INSERT INTO users_article
					(author, ua_header, en_header, ua_text, en_text, date)
					VALUES (?, ?, ?, ?, ?, ?)');

				$params = array($author, $ua_header, $en_header,
					$ua_text, $en_text, date('Y-m-d H:i:s'));
				$STH->execute($params);
			}
			catch(PDOException $exception)
			{
				echo $exception->getMessage();
			}
		}
//.........................................................................................
//...............................CHECK REGISTRATION FORM...................................
		public function checkRegData($login, $email)
		{
			try
			{
				$STH = $this->DBH->prepare('SELECT * FROM users_list WHERE login=? OR email=?');
				$STH->bindParam(1, $first_param);
				$STH->bindParam(2, $second_param);
				$first_param = $login;
				$second_param = $email;

				if($STH->execute())
					if(!$STH->fetch())
						return false;
				else
					return true;
			}
			catch(PDOException $exception)
			{
				echo $exception->getMessage();
			}
		}
//.........................................................................................
//......................................USER REGISTRATION..................................
		public function regUser($login, $password, $email)
		{
			try
			{
				$STH = $this->DBH->prepare('INSERT INTO 
					users_list (login, email, password, status, 
						registration_date, login_time, avatar)
					VALUES(?, ?, ?, ?, ?, ?, ?)');

				$date = date("Y-m-d H:i:s");

				$params = array($login, $email, $password, 'user', 
					$date, $date, 'img/avatar.png');
				$STH->execute($params);
				$STH = $this->DBH->prepare('SELECT * FROM users_list WHERE login=?');
				$STH->bindParam(1, $login);
				$STH->execute();
				return $STH->fetch(PDO::FETCH_ASSOC);
			}
			catch(PDOException $exception)
			{
				echo $exception->getMessage();
			}
		}
//.........................................................................................
//..............................CHECK CHANGED PROFILE INFO.................................
		public function checkEnteredData($login, $email, $user_id)
		{
			try
			{
				$STH = $this->DBH->prepare('SELECT * FROM users_list WHERE login=? 
					OR email=? AND id!=?');
				$params = array($login, $email, $_SESSION['id']);
				$STH->execute($params);
				$count = $STH->rowCount(PDO::FETCH_ASSOC);

				if($count != 0)
					return false;
				else
				{
					if($login != null)
					{
						$STH = $this->DBH->prepare('UPDATE users_list SET login=? WHERE id=?');
						$params = array($login, $_SESSION['id']);
						$STH->execute($params);
						$_SESSION['login'] = $login;
					}

					if($email != null)
					{
						$STH = $this->DBH->prepare('UPDATE users_list SET email=? WHERE id=?');
						$params = array($email, $_SESSION['id']);
						$STH->execute($params);
						$_SESSION['email'] = $email;
					}

					return true;
				}
			}
			catch(PDOException $exception)
			{
				echo $exception->getMessage();
			}
		}
//.........................................................................................
//...................................SET AVATAR............................................
		public function setAvatar($direction, $login)
		{
			try
			{
				$STH = $this->DBH->prepare('UPDATE users_list SET avatar=? WHERE login=?');
				$params = array($direction, $login);
				$STH->execute($params);
			}
			catch(PDOException $exception)
			{
				echo 'Error: ' . $exception->getMessage();
			}
		}
//.........................................................................................
//...................................DELETE PROFILE........................................
		public function deleteProfile($login)
		{
			try
			{
				$STH = $this->DBH->prepare('DELETE FROM users_list WHERE login=?');
				$STH->bindParam(1, $l);
				$l = $login;
				$STH->execute();
			}
			catch(PDOException $exception)
			{
				echo 'Error: ' . $exception->getMessage();
			}
		}
//.........................................................................................
//...................................GET USERS PROFILES....................................
		public function getProfiles()
		{
			try
			{
				$STH = $this->DBH->prepare('SELECT * FROM users_list WHERE login!=?');
				$STH->bindParam(1, $login);
				$login = 'admin';
				$STH->execute();
				return $STH->fetchAll(PDO::FETCH_ASSOC);
			}
			catch(PDOException $exception)
			{
				echo 'Error: ' . $exception->getMessage();
			}
		}
//.........................................................................................
//.......................................SAVE STATUS.......................................
		public function saveStatus($id, $status)
		{
			try
			{
				$STH = $this->DBH->prepare('UPDATE users_list SET status=? WHERE id=?');
				$params = array($status, $id);
				$STH->execute($params);
			}
			catch(PDOException $exception)
			{
				echo $exception->getMessage();
			}
		}
//.........................................................................................
	}