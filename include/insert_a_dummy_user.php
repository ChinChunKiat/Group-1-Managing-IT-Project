<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="KPI Assignment System"/>
	<meta name="keywords" content="HTML5, tags"/>
	<meta name="author" content="Albert Lee Kai Xian"/>
	<link rel="stylesheet" type="text/css" href="style/style1.css">

	<title>Index</title>

</head>

<body>
	<?php
		//initialise value 	
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "pasti_nyala_db";
		
		//connect to database server
		$conn = @mysqli_connect($servername,$username,$password);
		
		if(!$conn){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		else{
			//create database
			$create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
			$queryResult = @mysqli_query($conn,$create_db);
			
			if($queryResult){
				$check_db = @mysqli_select_db($conn,$dbname);
				//select the database and create the table
				if($check_db){
					$staff_id = "SS001";
					$name = "Mussolini";
					$password = "123";  // You should use a secure password hashing method
					$type = "user";

					// Hash the password (you should use a more secure method in a production environment)
					$hashed_password = hash("sha256", $password);

					// Insert data into login_table
					$insert_query = "INSERT INTO login_table (staff_id, name, password, type) VALUES ('$staff_id', '$name', '$hashed_password', '$type')";
					$result = mysqli_query($conn, $insert_query);

					if ($result) {
						echo "Data inserted successfully!";
					} else {
						echo "Error: " . mysqli_error($conn);
					}
				}
				else{
					die("ERROR: Could not connect. " . mysqli_connect_error());
				}
			}
			else{
				die("ERROR: Could not connect. " . mysqli_connect_error());
			}
		}
		
		
	?>
	
	
</body>
</html>