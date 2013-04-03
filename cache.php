<?php


if($_SERVER['REMOTE_ADDR'] != 'IP SERVEUR' && $_SERVER['REQUEST_METHOD'] == 'GET' && empty($_GET) && null === $cookie = $_COOKIE['wordpress_logged_in_'.md5('http://'.$_SERVER['HTTP_HOST'])]){

	// For local developpment you can replace REMOTE_ADDR condition by isset($_SERVER['HTTP_USER_AGENT'])

	$path = filter_var($_SERVER['REQUEST_URI'],FILTER_SANITIZE_URL);

	$cachefolder = "cache";

	// Folder creation
	if( !is_dir( $cachefolder ) ) mkdir( $cachefolder, 755 );

	$uri = explode('/',rtrim($path,'/'));
	
	$flaturl = end($uri);
	
	// Handle archives

	if(is_numeric($flaturl)) $flaturl = str_replace('/','-',trim($path,'/'));

	if($flaturl == '') $flaturl = 'home';

		if(!file_exists($cachefolder.'/'.$flaturl)){
          
		$data = file_get_contents('http://'.$_SERVER['HTTP_HOST'].$path);
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
