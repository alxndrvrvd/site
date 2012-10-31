<?php
	class Controller_Profiles extends Controller
	{
		public function action_index()
		{
			$data = $this->model->getProfiles();

			if($data)
				$this->view->displayUsersProfiles('view_user',
					'view_profiles', $data, parent::$language);
			else
				header("Location: http://localhost/site/" . parent::$language . "/");
		}

		public function action_save()
		{
			if(isset($_REQUEST['id'], $_REQUEST['status']))
			{
				$id = $_REQUEST['id'];
				$status = $_REQUEST['status'];

				$this->model->saveStatus($id, $status);
			}
			
			header("Location: http://localhost/site/" . parent::$language ."/profiles");
		}
	}