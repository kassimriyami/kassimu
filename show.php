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

<table>
    <tr>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Age</th>
    </tr>

      
      <tr>
      <td>  <?php echo $student->firstname ?> </td>
      <td>  <?php echo $student->lastname ?> </td>
      <td>  <?php echo $student->age ?> </td>
      </tr>
    

</table>