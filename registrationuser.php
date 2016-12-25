<?php

require 'User.php';

if(isset($_POST['submit']))
{
		

		if(!empty($_POST['username'])&& !empty($_POST['password']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];

			$user = new User();

			if($user->register($username,$password))
			{
				header("Location:login.php");
			}
			
		}		
		
}
		
	
	



?>