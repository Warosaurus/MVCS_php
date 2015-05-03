<?php

class App {

	// App singleton
	protected $config;
	protected $db;
	public $twig;

	public static function getInstance() {

		static $instance = null;
		if (null === $instance) {
			$instance = new App();
		}

		return $instance;
	}

	protected function __construct() {
		// Get application config
		$this->config = parse_ini_file('../app/config/app.ini');

		// Get Database connection
		$this->db = Database::getInstance();

		// Build twig instance
		Twig_Autoloader::register();
		$this->twig = new Twig_Environment(new Twig_Loader_Filesystem('../app/views/templates'));

	}

	// Prevent cloning of instance using method overriding
	private function __clone() {
	}

	// Prevent unserializing of instance
	private function __wakeup() {
	}
}
