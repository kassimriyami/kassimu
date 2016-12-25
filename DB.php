<?php

class DB 
{
	public static function connect()
	{
		try {

			return new PDO('mysql:host=localhost;dbname=kassimu', 'root', '');

		} catch (PDOException $e) {

			echo $e->getMessage();
			
		}
		
	}
}
