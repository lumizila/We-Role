<?php
require_once('Login.php');
$path_components = explode('/', $_SERVER['PATH_INFO']);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if($_REQUEST['newacc'] == 0){
		$res = Login::checkUser($_REQUEST['nickname'], $_REQUEST['password']);
		if($res == null){
			header("HTTP/1.0 400 Bad Request");
			print("Nickname or password does not match.");	
			exit();
		}
		header("Content-type: application/json");
	    print(json_encode(true));
	    exit();
	}
	else{
		$res = Login::createUser($_REQUEST['newnickname'], $_REQUEST['newemail'], $_REQUEST['newpassword']);
		if ($res == null){
			header("HTTP/1.0 400 Bad Request");
			print("Nickname already exists. Choose another");	
			exit();
		}
		header("Content-type: application/json");
		print(json_encode(true));
	  	exit();
	}
	
}

else if($SERVER['REQUEST_METHOD'] == "GET"){
	
}
?>