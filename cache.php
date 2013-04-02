<?php


if($_SERVER['REMOTE_ADDR'] != 'IP SERVEUR' && $_SERVER['REQUEST_METHOD'] == 'GET' && empty($_GET) && null === $cookie = $_COOKIE['wordpress_logged_in_'.md5('http://'.$_SERVER['HTTP_HOST'])]){


	$cachefolder = "cache";
	$uri = explode('/',rtrim($_SERVER['REQUEST_URI'],'/'));
	$flaturl = end($uri);
	
	if($flaturl == '') $flaturl = 'home';

		if(!file_exists($cachefolder.'/'.$flaturl)){
          
		$data = file_get_contents('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		$response = $http_response_header[0];
		if(strpos($response, '200')!==false){
			
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