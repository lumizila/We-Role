<?php
class Login
{
	public static function createUser($nickname, $email, $password){
		$conn = new mysqli("classroom.cs.unc.edu", "luiculau", "visionward12!", "luiculaudb");
		$res = $conn->query("SELECT COUNT(*) FROM Users WHERE nickname='".$nickname."'");
		$aux = $res->fetch_row();
		if($aux[0] != 0){
			return (null);
			//return error
		}
		$conn->query("insert into Users(nickname, email, password)VALUES('".$nickname."','".$email."','".$password."')"); 
		return 1;
	}
	public static function checkUser($nickname, $password){
		$conn = new mysqli("classroom.cs.unc.edu", "luiculau", "visionward12!", "luiculaudb");
		$res = $conn->query("SELECT COUNT(*) FROM Users WHERE nickname='".$nickname."' AND password = '".$password."'");
		$aux = $res->fetch_row();
		if($aux[0] == 0){ //if there is no nickname like this
			return (null);
			//return error
		}
		return 1;
	}
}
?>