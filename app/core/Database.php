<?php

Class Database {

	// Database singleton * might change later if causing bottleneck

	private $con;

	public static function getInstance() {

		static $instance = null;
		if (null === $instance) {
			$instance = new Database();
		}

		return $instance;
	}

	private function __construct() {
		$config = parse_ini_file('../app/config/database.ini');
		$this->con = new PDO($config['adapter'] .':host='. $config['host'] .';dbname='. $config['name'] .';charset=utf8', $config['username'], $config['password']);
	}

	public function getConnection() {
		return $this->con;
	}

	// Prevent cloning of instance using method overriding
	private function __clone() {
	}

	// Prevent unserializing of instance
	private function __wakeup() {
	}
}