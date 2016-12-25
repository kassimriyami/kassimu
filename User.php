<?php

session_start();

require 'DB.php';

class User
{
	private $_call;

	public function __construct()
	{
		$this->_call = DB::connect();

	}

	public function register($username,$password)
	{
		$password = md5($password);

		$sql="INSERT INTO `users`(`username`, `password`) VALUES (:username,:password)";

		$stmt = $this->_call->prepare($sql);
		$stmt->bindParam("username",$username);
		$stmt->bindParam("password",$password);
		$stmt->execute();
		return true;
	}

	public function login($username,$password)
	{
		$password = md5($password);
		
		$sql="SELECT * FROM users WHERE username=:username AND password=:password";
		
		$stmt = $this->_call->prepare($sql);
		$stmt->bindParam("username",$username);
		$stmt->bindParam("password",$password);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_OBJ);

		if($user==null){

			return 0;

		} else {

			$_SESSION['user_id'] = $user->id;

			return 1;
		}

	}
		
	public function isLoggedIn()
	{

		return isset($_SESSION['user_id']) ? true : false;
	}
}
		
		