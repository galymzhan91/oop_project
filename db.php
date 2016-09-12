<?php 
	class Db
	{
		protected $servername = "localhost:8080";
		protected $username = "root";
		protected $password = "";

		$conn = new mysqli($servername, $username, $password);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		echo "Connected successfully";
	}
?>