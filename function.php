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

		if($_SERVER["REQUEST_METHOD"] == "POST"){
            include "include/connection.php";
            if(isset($_POST["FunctionUserID"]) && (!empty($_POST["FunctionUserID"]))){
                $nameClr = $_POST["FunctionUserID"];
            }

            if(isset($_POST["FunctionName"]) && (!empty($_POST["FunctionName"]))){
                $ModuleClr = $_POST["FunctionName"];;
            }

            if(isset($_POST["FunctionDescription"]) && (!empty($_POST["FunctionDescription"]))){
                $DescriptionClr = $_POST["FunctionDescription"];
            }

            if(isset($_POST["FunctionDate"]) && (!empty($_POST["FunctionDate"]))){
                $DateClr = $_POST["FunctionDate"];
            }

            $sql = "SELECT * FROM module_table WHERE staff_id = '$nameClr'";
			$result = mysqli_query($conn,$sql);
            $num_result = mysqli_num_rows($result);
			if($num_result >= 1){
				if(isset($nameClr, $ModuleClr, $DescriptionClr,$DateClr)){
                    $insert_1 = insert_in_function_table($nameClr, $ModuleClr, $DescriptionClr,$DateClr,$conn);
                        mysqli_close($conn);
                }
			}
            else{
                $idErr = "Staff ID already exist!";
            }
		}

        function insert_in_function_table($nameClr, $ModuleClr, $DescriptionClr,$DateClr,$conn){
			$sql="INSERT function_table(staff_id,function_name,function_description,module_date)VALUES('$nameClr','$ModuleClr','$DescriptionClr','$DateClr')";
			if(mysqli_query($conn,$sql)){
				return True;
			}
			else{
				return False;
			}
		}
	?>
	
    <header>
		<h1>Function</h1>
	</header>
	
	<section>
		<form method="post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<fieldset>
                <p><label for="sID">User ID: </label>
				<input type="text" id="sID" name="FunctionUserID"></input></p>

                <p><label for="fname">Sub-Module Name: </label>
				<input type="text" id="fname" name="FunctionName"  maxlength="50"></span></input></p>

                <p><label for="fname">Sub-Module Description: </label>
				<input type="text" id="fname" name="FunctionDescription"  maxlength="50"></input></p>

                <p><label for="fname">Date: </label>
				<input type="text" id="fname" name="FunctionDate"  maxlength="10"></input></p>

				<p><button type="submit" value="submit">Add Staff</button></p>
			</fieldset>
		</form>
	</section>	
</body>
</html>