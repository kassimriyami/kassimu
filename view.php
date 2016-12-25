<?php
session_start();

require 'Student.php';

if(!isset($_SESSION['user_id']))
{
header("Location: login.php");
}

$kipp = new Student;

$students = $kipp->index();

?>
<a href="logout.php">Logout</a>

<table>
    <tr>
      <th>Firstname</th>
      <th>lastname</th>
      <th>age</th>
      <th>Action</th>
      <th>Delete</th>
    </tr>

    <?php foreach ($students as $student) { ?>
      
      <tr>
      <td> <a href="show.php?id=<?php echo $student->id ?>"> <?php echo $student->firstname ?></a> </td>
       <td>  <?php echo $student->lastname ?> </td>
      <td>  <?php echo $student->age ?> </td>
      <td> <a href="edit.php?id=<?php echo $student->id ?>"> Edit</a> </td>
      <td> <a href="delete.php?id=<?php echo $student->id ?>"> Delete</a> </td>
      </tr>
    
    <?php } ?>

</table>