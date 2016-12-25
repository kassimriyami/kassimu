<?php
require 'Student.php';

$kipp = new Student;

$id = $_GET['id'];

$student = $kipp->getStudentById($id);

if($student == false){
	echo 'No student found matching that ID';
	die;
}

?>

<html>
<head>
	<title>Edit Student</title>
</head>
<body>
		<form action="update.php" method="POST">
		  	Firstname: <input type="text" name="firstname" value="<?php echo $student->firstname ?>"><br>
		 	 Lastname: <input type="text" name="lastname" value="<?php echo $student->lastname ?>"><br>
		  	Age: <input type="text" name="age" value="<?php echo $student->age ?>"><br>

		  	<input type="hidden" name="id" value="<?php echo $student->id ?>"><br>
	  	<input type="submit"  name="submit">
	</form>	
</body>
</html>

	