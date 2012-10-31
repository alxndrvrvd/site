<?php
	class Controller_Profile extends Controller
	{
		public function action_index()
		{
			$this->view->displayUserProfile('view_user',
				'view_profile', parent::$language);
		}

		public function action_edit()
		{
			$this->view->displayEditProfileForm('view_user',
				'view_edit_profile', parent::$language);
		}

		public function action_save()
		{
			session_start();

			if(!empty($_REQUEST['login']))
				$login = trim(htmlspecialchars($_REQUEST['login']));

			if(!empty($_REQUEST['email']))
				$email = trim(htmlspecialchars($_REQUEST['email']));

			$is_valid = $this->model->checkEnteredData($login, $email, $_SESSION['id']);

			if(!$is_valid)
			{
				exit(header("Location: http://localhost/site/" .
					parent::$language . "/profile/edit"));
			}
				
			if(!empty($_FILES['userfile']))
			{
				if($_FILES['userfile']['error'] == 0)
				{
					$max_file_size = 1000 * 1024;
					$file_size = $_FILES['userfile']['size'];

					if($file_size > $max_file_size)
						exit('File size is to big.');

					$filename = $_FILES['userfile']['name'];

					$allowed = array("jpg", "jpeg", "gif", "png");
					$extension = end(explode('.', $filename));

					$type = $_FILES['userfile']['type'];

					if($type === 'image/jpg' || $type === 'image/jpeg' 
						|| $type === 'image/gif' || $type === 'image/png'
						&& in_array($extension, $allowed))
					{
						if(file_exists('img/'. $filename) && $filename != 'avatar.png')
							exit ('File exist.');
						else
						{
							$tmp_name = $_FILES['userfile']['tmp_name'];

							if($extension == 'jpg')
								$img = imagecreatefromjpeg($tmp_name);
							elseif($extension == 'png')
								$img = imagecreatefrompng($tmp_name);
							elseif($extension == 'gif')
								$img = imagecreatefromgif($tmp_name);

							$width = 150;
							$height = 150;

							$x = imagesx($img);
							$y = imagesy($img);

							$new_image = imagecreatetruecolor($width, $height);

							imagecopyresampled($new_image, $img, 0, 0, 0, 0, $width, 
								$height, $x, $y);

							$index = strpos($filename, '.');
							$filename = substr($filename, 0, $index);
							$direction = 'img/'.$filename.'.png';
							imagepng($new_image, $direction);

							unlink($tmp_name);

							$old_avatar = $_SESSION['avatar'];

							$this->model->setAvatar($direction, $_SESSION['login']);

							$_SESSION['avatar'] = $direction;

							if($old_avatar != 'img/avatar.png')
								unlink($old_avatar);

							header("Location: http://localhost/site/" . parent::$language);
						}
					}
					else
						echo "File type extension don't allowed.";
				}
//				else
//					echo 'Error: '.$_FILES['userfile']['error'];
			}
			header("Location: http://localhost/site/" . parent::$language);
		}

		public function action_delete()
		{
			session_start();

			$this->model->deleteProfile($_SESSION['login']);
			$avatar = trim($_SESSION['avatar']);
			
			if($avatar != 'img/avatar.png' && file_exists($avatar))
				unlink($avatar);

			$_SESSION = array();
			session_destroy();

			header("Location: http://localhost/site/" . parent::$language);
		}
	}