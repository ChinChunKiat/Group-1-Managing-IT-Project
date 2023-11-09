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
            if(isset($_POST["UserID"]) && (!empty($_POST["UserID"]))){
                $nameClr = $_POST["UserID"];
            }

            if(isset($_POST["ModuleName"]) && (!empty($_POST["ModuleName"]))){
                $ModuleClr = $_POST["ModuleName"];;
            }

            if(isset($_POST["Description"]) && (!empty($_POST["Description"]))){
                $DescriptionClr = $_POST["Description"];
            }

            if(isset($_POST["CreateDate"]) && (!empty($_POST["CreateDate"]))){
                $DateClr = $_POST["CreateDate"];
            }
			
			//ensure the value are isset and run the functions
			if(isset($nameClr, $ModuleClr, $DescriptionClr,$DateClr)){
				$insert_1 = insert_in_module_table($nameClr, $ModuleClr, $DescriptionClr,$DateClr,$conn);
					mysqli_close($conn);
			}
		}

        function insert_in_module_table($nameClr, $ModuleClr, $DescriptionClr,$DateClr,$conn){
			$sql="INSERT module_table(staff_id,module_name,module_description,module_date)VALUES('$nameClr','$ModuleClr','$DescriptionClr','$DateClr')";
			if(mysqli_query($conn,$sql)){
				return True;
			}
			else{
				return False;
			}
		}
	?>
	
    <header>
		<h1>Module</h1>
	</header>
	
	<section>
		<form method="post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<fieldset>
                <p><label for="sID">User ID: </label>
				<input type="text" id="sID" name="UserID"></input></p>

                <p><label for="fname">Module Name: </label>
				<input type="text" id="fname" name="ModuleName"  maxlength="50"></span></input></p>

                <p><label for="fname">Description: </label>
				<input type="text" id="fname" name="Description"  maxlength="50"></input></p>

                <p><label for="fname">Date: </label>
				<input type="text" id="fname" name="CreateDate"  maxlength="10"></input></p>

				<p><button type="submit" value="submit">Add Staff</button></p>
			</fieldset>
		</form>
	</section>	
</body>
</html>