<?php

require 'DB.php';

class Student
{
	private $_db;

	public function __construct()
	{
		$this->_db = DB::connect();
	}

	public function index()
	{
		$sql = "SELECT * FROM students";

		$stmt = $this->_db->query($sql);

		$students = $stmt->fetchAll(PDO::FETCH_OBJ);

		return $students;

	}

	public function store($firstname,$lastname,$age)
	{
		$sql = "INSERT INTO `students` (`firstname`, `lastname`, `age`) VALUES(:firstname,:lastname,:age)";

		$stmt = $this->_db->prepare($sql);

		$stmt->bindParam(":firstname",$firstname);
		$stmt->bindParam(":lastname",$lastname);
		$stmt->bindParam(":age",$age);
		$stmt->execute();
		return true;

	}

	public function getStudentById($id)
	{

		$sql = "SELECT * FROM students WHERE id= :id";

		$stmt = $this->_db->prepare($sql);
		$stmt->bindParam("id",$id);
		$stmt->execute();

		$student = $stmt->fetch(PDO::FETCH_OBJ);

		if($student == null) {
			return false;
		}

		return $student;

	}

	public function update($firstname, $lastname, $age, $id)
	{
		$sql = "UPDATE `students` SET `firstname` = :firstname, `lastname` = :lastname, `age` = :age WHERE id = :id";

		$stmt = $this->_db->prepare($sql);

		$stmt->bindParam(":firstname", $firstname);
		$stmt->bindParam(":lastname", $lastname);
		$stmt->bindParam(":age", $age);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		return true;

	}

	public function delete($id)
	{
		$sql="DELETE FROM `students` WHERE id=:id";
		$stmt = $this->_db->prepare($sql);
		$stmt->bindParam("id",$id);
		$stmt->execute();
		return true;

	}
}

