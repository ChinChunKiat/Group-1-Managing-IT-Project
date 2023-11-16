<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dh="pasti_nyala_db";
			
	//Create connection
	$conn=mysqli_connect($servername,$username,$password,$dh);
			
	//Check connection
	if(!$conn){
		die("Connection failed".mysqli_connect_error());
	}
?>