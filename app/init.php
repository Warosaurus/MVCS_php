<?php

require_once 'core/Controller.php';

// Load and initialize an instance of the App
$app = App::getInstance();

// Route incoming request
new Router();