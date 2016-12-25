<?php

require 'Student.php';

if(isset($_POST['submit']))
{
		

		if(!empty($_POST['firstname'])&& !empty($_POST['lastname'])&& !empty($_POST['age']))
		{
			$firstname=$_POST['firstname'];
			$lastname=$_POST['lastname'];
			$age=$_POST['age'];

			$student = new Student();

			if($student->store($firstname,$lastname,$age))
			{
				header("Location:view.php");
			}
			
		}		
		
}
		
	
	



?>