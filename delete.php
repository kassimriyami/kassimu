<?php

require 'Student.php';

	$id=$_GET['id'];
	$student = new Student();

	if($student->delete($id))
			{
				header("Location:view.php");
			}
			
		
		

?>		
	
	



