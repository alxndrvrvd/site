<?php
	class Controller
	{
		public $view;
		public $model;
		static $language;

		public function __construct()
		{
			$this->view = new View();
			$this->model = new Model();

			if(!isset(self::$language) || empty(self::$language))
				self::$language = 'en';
		}
	}