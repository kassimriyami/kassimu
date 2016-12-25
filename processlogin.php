<?php

require 'User.php';

if(isset($_POST['login']))
{
		
		if(!empty($_POST['username'])&& !empty($_POST['password']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];

			$user = new User();

			if($user->login($username,$password)== true)
			{
				 header("Location:view.php");
			}
			else
			{
				 header("Location:login.php");
			}
			
		}		
		
}
		
	
	



?>