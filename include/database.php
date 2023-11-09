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
					connect_table(create_login_table(),create_module_table(),create_submodule_table(),create_function_table(),$conn);
					/*insert_infor_staff_table('SS001','admin@swinburne.edu.my','admin','Male','SFS','available');
					insert_infor_account_table('SS001','admin','admin','admin','admin@swinburne.edu.my');
					
					insert_infor_staff_table('SS100','jennifer@swinburne.edu.my','Jennifer Lau','Female','SFS','available');
					insert_infor_account_table('SS100','jennifer','password123','user','jennifer@swinburne.edu.my');*/
				}
				else{
					die("ERROR: Could not connect. " . mysqli_connect_error());
				}
			}
			else{
				die("ERROR: Could not connect. " . mysqli_connect_error());
			}
		}
		
		//create table function
		function create_function_table(){
			return $create_tb = "CREATE TABLE IF NOT EXISTS function_table(
							id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
							staff_id VARCHAR(6) NOT NULL,
                            function_name VARCHAR(50) NOT NULL,
							function_description VARCHAR(150) NOT NULL,
                            date VARCHAR(10) NOT NULL)";
		}
		
		//create table function
		function create_module_table(){
			return $create_tb = "CREATE TABLE IF NOT EXISTS  module_table(
							id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
                            staff_id VARCHAR(6) NOT NULL,
                            module_name VARCHAR(50) NOT NULL,
							module_description VARCHAR(150) NOT NULL,
                            date VARCHAR(10) NOT NULL)";
		}
		
		//create table function
		function create_submodule_table(){
			return $create_tb = "CREATE TABLE IF NOT EXISTS submodule_table(
							id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
							staff_id VARCHAR(6) NOT NULL,
                            submodule_name VARCHAR(50) NOT NULL,
							submodule_description VARCHAR(150) NOT NULL,
                            date VARCHAR(10) NOT NULL)";
		}
		
		//create table function
		function create_login_table(){
			return $create_tb = "CREATE TABLE IF NOT EXISTS login_table(
							id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
							staff_id VARCHAR(6) NOT NULL,
							name VARCHAR(50) NOT NULL,
							password VARCHAR(255) NOT NULL,
							type VARCHAR(12) NOT NULL)";
		}
		
		//create table function
		function connect_table($create_login_table, $create_module_table, $create_submodule_table, $create_function_table, $conn){
			$queryResult1 = mysqli_query($conn,$create_login_table);
			$queryResult2 = mysqli_query($conn,$create_module_table);
			$queryResult3 = mysqli_query($conn,$create_submodule_table);
			$queryResult4 = mysqli_query($conn,$create_function_table);
			if($queryResult1 && $queryResult2 && $queryResult3 && $queryResult4){
				mysqli_close($conn);
			}
			else{
				die("ERROR: Could not connect. " . mysqli_connect_error());
			}
		}
		
		//insert the value into the staff_table
		/*function insert_infor_staff_table($staff_id,$email,$name,$gender,$school,$availability){
			include "include/connection.php";
			$sql = "SELECT staff_id FROM staff_table";
			$result = mysqli_query($conn, $sql);
			$num = mysqli_num_rows($result);
			$exist = false;
			
			if($num == 0){
				$sql = "INSERT staff_table (staff_id,email,name,gender,school,availability)VALUES('$staff_id','$email','$name','$gender','$school','$availability')";
				$results = mysqli_query($conn,$sql);
				$exist = true;
			}
			else if($num > 0){
				while($row = mysqli_fetch_assoc($result)){
					if($row["staff_id"] == $staff_id){
						$exist = true;
					}
				}
			}
			else{
				die("ERROR: Could not connect. " . mysqli_connect_error());
			}
			
			if($exist == false){
				$sql = "INSERT staff_table (staff_id,email,name,gender,school,availability)VALUES('$staff_id','$email','$name','$gender','$school','$availability')";
				$results = mysqli_query($conn,$sql);
			}
		}
		
		//insert the value into the staff_table
		function insert_infor_account_table($staff_id,$name,$passwords,$type,$email){
			include "include/connection.php";
			$hash = hash("sha256",$passwords);
			$sql = "SELECT staff_id FROM account_table";
			$result = mysqli_query($conn, $sql);
			$num = mysqli_num_rows($result);
			$exist = false;
			
			if($num == 0){
				$sql = "INSERT account_table (staff_id,name,password,type,email)VALUES('$staff_id','$name','$hash','$type','$email')";
				$results = mysqli_query($conn,$sql);
				$exist = true;
			}
			else if($num > 0){
				while($row = mysqli_fetch_assoc($result)){
					if($row["staff_id"] == $staff_id){
						$exist = true;
					}
				}
			}
			else{
				die("ERROR: Could not connect. " . mysqli_connect_error());
			}
			
			if($exist == false){
				$sql = "INSERT account_table (staff_id,name,password,type,email)VALUES('$staff_id','$name','$hash','$type','$email')";
				$results = mysqli_query($conn,$sql);
			}
		}*/
	?>
	
	<header>
		<h1>KPI Assignment System</h1>
	</header>
	
	<!--My information-->
	<section>
		<p><img id="albert" src="image/me.jpeg" alt="Albert Lee"></p>
		<fieldset style="margin:0 20%;padding: 20px 5%">
			<p>Name: Albert Lee Kai Xian</p>
			<p>Student ID: 101234596</p>
			<p>Email: <a href="mailto:101234596@students.swinburne.edu.my">101234596@students.swinburne.edu.my</a></p>
			<p>I declare that this assignment is my individual work. I have not work collaboratively nor have I copied from any other student's work or from any other source. I have not engaged another party to complete this assignment. I am aware of the University’s policy with regards to plagiarism. I have not allowed, and will not allow, anyone to copy my work with the intention of passing it off as his or her own work.</p>
		</fieldset>
	</section>
	</br>
	<!--Footer-->
	<footer>
		<a href="login.php">Login |</a>
		<a href="AboutMe.php">About This Assignment</a>
	<footer>
</body>
</html>