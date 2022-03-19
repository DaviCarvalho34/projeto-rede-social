<?php

	//session_start();


	require('vendor/autoload.php');	

	define('INCLUDE_PATH_STATIC','http://localhost/project_backend/Project/Views/pages/');
	define('INCLUDE_PATH','http://localhost/project_backend/');
	define('STYLES','login.css');
	$app = new Project\Application();

	$app->run();

?>