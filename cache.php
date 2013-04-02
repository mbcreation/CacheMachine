<?php


if($_SERVER['REMOTE_ADDR'] != 'IP SERVEUR' && $_SERVER['REQUEST_METHOD'] == 'GET' && empty($_GET) && null === $cookie = $_COOKIE['wordpress_logged_in_'.md5('http://'.$_SERVER['HTTP_HOST'])]){

	// For local developpment you can replace REMOTE_ADDR condition by isset($_SERVER['HTTP_USER_AGENT'])

	$cachefolder = "cache";
	$uri = explode('/',rtrim($_SERVER['REQUEST_URI'],'/'));
	$flaturl = end($uri);
	
	// Handle archives

	if(is_numeric($flaturl)) $flaturl = str_replace('/','-',trim($_SERVER['REQUEST_URI'],'/'));

	if($flaturl == '') $flaturl = 'home';

		if(!file_exists($cachefolder.'/'.$flaturl)){
          
		$data = file_get_contents('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		$response = $http_response_header[0];

		// OR 'HTTP/1.1 200 OK' depends on your server.
		// Weird issues  when test response with strpos or multiple values...

		if($response == 'HTTP/1.0 200 OK') {
			
			file_put_contents($cachefolder.'/'.$flaturl, $data);
		
		}
		else{
			
			include('index.php');
			exit;

		}


	}
	
	readfile($cachefolder.'/'.$flaturl);
	exit;

}

else{
	
	include('index.php');
	exit;

}