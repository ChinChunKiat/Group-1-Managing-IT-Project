<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="KPI Assignment System"/>
	<meta name="keywords" content="HTML5, tags"/>
	<meta name="author" content="Albert Lee Kai Xian"/>
	<link rel="stylesheet" type="text/css" href="style/style.css">

	<title>Search Staff Information</title>

</head>

<body>
<!--Header-->
<header>
	<h1>Staff Profile</h1>
</header>

<?php
	$option = $_GET["staffName"];
	$item = $_GET["item"];
	$file_name = "..\\..\\data\\Employee\\employees.txt";
	$noFound = "";
	//The option of the select box
	if($option == "School/Faculty"){
		$c1 = strcasecmp($item, "SFS");
		$c2 = strcasecmp($item, "FBDA");
		$c3 = strcasecmp($item, "FECS");
		//The display of user input for the name of the school/faculty
		if($c1 == 0){
			echo"<p>Results of employees from SFS:</p>";
		}
		elseif($c2 == 0){
			echo"<p>Results of employees from FBDA:</p>";
		}
		elseif($c3 == 0){
			echo"<p>Results of employees from FECS:</p>";
		}
		//The input of user is in correct partten 
		if($c1==0 || $c2==0 || $c3==0){
			if(file_exists($file_name) == True){
				$get_file_line = file($file_name);
				$count_file_line = count($get_file_line);
				//Cut the string of the file contents into small string and put into an array
				if($count_file_line>=1){
					for($x = 0; $x<$count_file_line; $x++){
						$token2 = strtok($get_file_line[$x],"|:");
						while($token2 != false){
							$get_line_token[] = $token2;
							$token2 = strtok("|:");
						}
						$count_line_token = count($get_line_token);
						$a9 = $get_line_token[9];
						$test_sfs = strcasecmp($item,"SFS");
						$test_fbda = strcasecmp($item,"FBDA");
						$test_sfs2 = strcasecmp($a9," SFS \n");
						$test_fbda2 = strcasecmp($a9," FBDA \n");
						$test_fecs2 = strcasecmp($a9," FECS \n");
						//If the input is "SFS"
						if($test_sfs == 0){
							if($test_sfs2 == 0){
								for($z = 1; $z<$count_line_token; $z+=2){
									$TheInformation[] = $get_line_token[$z];
								}
								$total_token_array[] = $TheInformation;
								$TheArray = $total_token_array;
								$_SESSION["session_array"] = $TheArray;
								echo "<li><a href='displayEmployeeInfo.php?employeeInformation=$get_line_token[3]'>$TheInformation[0]</a></li>";
								$TheInformation = [];
							}
						}
						//If the input is "FBDA"
						elseif($test_fbda == 0){
							if($test_fbda2 == 0){
								for($z = 1; $z<$count_line_token; $z+=2){
									$TheInformation[] = $get_line_token[$z];
								}
								$total_token_array[] = $TheInformation;
								$TheArray = $total_token_array;
								$_SESSION["session_array"] = $TheArray;
								echo"<li><a href='displayEmployeeInfo.php?employeeInformation=$get_line_token[3]'>$TheInformation[0]</a></li>";
								$TheInformation = [];
							}
						}
						//If the input is "FECS"
						else{
							if($test_fecs2 == 0){
								for($z = 1; $z<$count_line_token; $z+=2){
									$TheInformation[] = $get_line_token[$z];
								}
								$total_token_array[] = $TheInformation;
								$TheArray = $total_token_array;
								$_SESSION["session_array"] = $TheArray;
								echo"<li><a href='displayEmployeeInfo.php?employeeInformation=$get_line_token[3]'>$TheInformation[0]</a></li>";
								$TheInformation = [];
							}
						}
						$get_line_token = [];
					}
				}
				else{
					echo "<p class='tips'>The record do not exist!</p>";
				}
			}
			else{
				echo "<p class='tips'>The record do not exist!</p>";
			}
		}
		else{
			echo "<p class='tips'>Invalid School/Faculty. Please enter the following school/faculty:</p>";
			echo "<li class='tips'>SFS</li>";
			echo "<li class='tips'>FBDA</li>";
			echo "<li class='tips'>FECS</li>";
		}
	}
	//If the selection of user is "Staff Name" in selection box
	elseif($option == "Staff Name"){
		$pattern_1 = "/^[A-Za-z ]+$/";
		//Check the pattern is match the input	
		if(!preg_match($pattern_1, $item)){
			echo "<p class='tips'>Only letters and white space allowed!</p>";
		}
		else{
			if(file_exists($file_name)){
				//Cut the string of the file contents into small string and put into an array
				$file_content = file_get_contents($file_name);
				$token = strtok($file_content,"|:");
				while($token != false){
					$employee_array[] = $token;
					$token = strtok("|:");
				}
				//Check the content prevent empty
				if($file_content == True){
					$count_array = count($employee_array);
					$item_pattern = "/$_GET[item]/";
					for($i = 1; $i<$count_array; $i+=9){
						//Match the pattern and the file content and put into array
						if(preg_match($item_pattern,$employee_array[$i])){
							$c = $i + 2;
							$similar_array[] = $employee_array[$i];
							$similar_idArray[] = $employee_array[$c];
						}
					}
				}
				//Check the array is not empty
				if (!empty($similar_array) ){
					echo"<p class='infor'>Results found:</p>";
					$count_similarArray = count($similar_array);
					for($r = 0; $r<$count_similarArray; $r++){
						//Cut the string of the file contents into small string and put into an array
						$similar_array2 = "/$similar_array[$r]/";
						$get_file_line = file($file_name);
						$count_file_line = count($get_file_line);
						for($x = 0; $x<$count_file_line; $x++){
							$token2 = strtok($get_file_line[$x],"|:");
							while($token2 != false){
								$get_line_token[] = $token2;
								$token2 = strtok("|:");
							}
							$count_line_token = count($get_line_token);
							for($y = 0; $y <$count_line_token; $y++){
								//If the pattern match files content, put into an array and pass the array variable by session
								if(preg_match($similar_array2, $get_line_token[$y])){
									for($z = 1; $z<$count_line_token; $z+=2){
										$TheInformation[] = $get_line_token[$z];
									}
									$TheInformationArray[] = $TheInformation;
									$theSessionArray = $TheInformationArray;
									$_SESSION["session_array"] = $theSessionArray;
									$TheInformation = [];
								}
							}
							$get_line_token = [];
						}
					}
					for($a = 0; $a < $count_similarArray; $a++){
						echo "<li><a href='displayEmployeeInfo.php?employeeInformation=$similar_idArray[$a]'>$similar_array[$a]</a></li>";
					}
				}
				else{
					echo "<p class='tips'>The record do not exist!</p>";
				}
			}
			else{
				echo "<p class='tips'>The record do not exist!</p>";
			}
		}
	}
	//If the user select "Staff Id" in selection box
	else{
		$noFound = 0;
		$pattern_2 = "/^SS\d\d\d\d?$/";
		//Matach the pattern of the input
		if(!preg_match($pattern_2, $item)){
			echo "<p class='tips'>Staff ID should start with 'SS' followed by 3-4 numbers!</p>";
		}
		else{
			echo "<p class='infor'>Result found:</p>";
			if(file_exists($file_name)){
				$get_file_line = file($file_name);
				$count_file_line = count($get_file_line);
				//Check the file got contents or not
				if($count_file_line>=1){
					//Cut the string of the file contents into small string and put into an array
					for($x = 0; $x<$count_file_line; $x++){
						$token2 = strtok($get_file_line[$x],"|:");
						while($token2 != false){
							$get_line_token[] = $token2;
							$token2 = strtok("|:");
						}
						$count_line_token = count($get_line_token);
						$fix_id = "/^ $item $/";
						//Match the pattern of the file content match or not and put into an array, then pass the array using session
						if(preg_match($fix_id, $get_line_token[3])){
							for($z = 1; $z<$count_line_token; $z+=2){
								$TheInformation[] = $get_line_token[$z];
							}
							$TheInformationArray[] = $TheInformation;
							$theSessionArray = $TheInformationArray;
							$_SESSION["session_array"] = $theSessionArray;
							echo"<li class='infor'><a href='displayEmployeeInfo.php?employeeInformation=$get_line_token[1]'>$TheInformation[0]</a></li>";
							$noFound = 0;
							break;
						}
						else{
							$noFound = 1;
						}
						$get_line_token = [];
					}
				}
				else{
					echo "<p class='tips'>The record do not exist!</p>";
				}				
			}
			else{
				echo "<p class='tips'>The record do not exist!</p>";
			}
		}
	}
	if($noFound == 1){
		echo "<p class='tips'>The record do not exist!</p>";
	}
?>
<!--Back to advancedSearchForm button-->
<section>
	<p><button><a href = "advancedSearchForm.php">Back</a></button></p>
</section>
<!--footer-->
<footer>
	<?php include("include/footer.php"); ?>
</footer>
</body>
</html>