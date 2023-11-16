<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>MIP Assignment1</title>
</head>

<body>
<?php
	//initialise the value
		$errorMsg = "";
		$login_Name = "";
		
		//receive the value through post method
		if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_login"])) {
    // Ensure the values are set
    if (isset($_POST["login"]) && isset($_POST["password"])) {
        // Check if password is empty
        if (empty($_POST["password"])) {
            $errorMsg = "Password required";
        } else {
            // Check if login name and password are not empty
            if (!empty($_POST["login"]) && !empty($_POST["password"])) {
                // Include the database
                include "include/connection.php";
                $secure_login = $_POST['login'];
                $secure_pwd = $_POST['password'];
                $login = mysqli_real_escape_string($conn, $secure_login);
                $pwd = mysqli_real_escape_string($conn, $secure_pwd);

                $login_Name = $login;
                $sql_password = "SELECT * FROM login_table WHERE name='$login'";
                $results = mysqli_query($conn, $sql_password);

                // Match the password entered by the user and the value in the table
                if (mysqli_num_rows($results) > 0) {
                    $row = mysqli_fetch_assoc($results);
                    session_start();
                    while ($row) {
                        $hash = hash("sha256", $pwd);
                        if ($row["password"] == $hash) {
                            // Pass the values of email and type
                            // $_SESSION["email"] = $row["email"];
                            $_SESSION["type"] = $row["type"];
                            mysqli_close($conn);
                            header("Location:index_home.php");
                            exit;
                        } else {
                            $errorMsg = "Invalid password!";
                        }
                        $row = mysqli_fetch_assoc($results);
                    }
                } else {
                    $errorMsg = "Invalid login name!";
                }
            } else {
                $errorMsg = "Login name or password cannot be empty!";
            }
        }
    }
}

		
		//to display the error message
		function errorMsgs($errorMsg) {
			echo <<<EOL
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				var errorDiv = document.createElement('div');
				errorDiv.innerHTML = '$errorMsg';
				errorDiv.style.cssText = 'background-color: red; color: white; padding: 10px; position: fixed; top: 0; left: 0; width: 100%; text-align: center; z-index: 1000; opacity: 0.7;';
				document.body.appendChild(errorDiv);
				setTimeout(function() {
					errorDiv.remove();
				}, 3000); // 5000 milliseconds = 5 seconds
			});
		</script>
		EOL;
		}


		
		//secure the value 
		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
	?>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg  navbar-dark " id="nav-bar">
        <a class="navbar-brand text-white" href="./index.html">Pasti Nyala</a>
        <!-- Toggle button for mobile navigation -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navigation links -->
        <div class="collapse navbar-collapse" id="navbarNav">
		<!--
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="">Main Module</a>
                </li>
                <li class="nav-item text-white">
                    <a class="nav-link text-white" href=".">Sub Module</a>
                </li>
                <li class="nav-item text-white">
                    <a class="nav-link text-white" href=".">Function</a>
                </li>
            </ul>
			-->
        </div>
    </nav>
    <section class="vh-100">
        <div class="bg-image d-flex" style="
            background-image: url('./image/background.png');
            height: 100vh;
          ">
            <div class="container py-5 h-100">
                <div class="row d-flex align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card text-white" style="border-radius: 1rem;" id="user_form">
								<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                <div class="card-body p-5 text-center">
									<div class="mb-md-5 mt-md-4 pb-5">
										<h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                        <p class="text-white-50 mb-5">Please enter your login and password!</p>
										
											<div class="form-outline form-white mb-4">
												<label class="form-label" for="login">User ID: </label>
												<input type="text" id="password" name="login"  class="form-control form-control-lg" value="<?php echo $login_Name ?>"></input>
											</div>
											
											
											
											<div class "form-outline form-white mb-4">
												<label class="form-label" for="password">Password: </label>
												<input type="password" id="password" name="password" class="form-control form-control-lg"></input>
											</div>
											
										<p style="text-align:center; margin-top:10px;">
											<button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit_login">Login</button>
											<!--<button class="btn btn-outline-light btn-lg px-5" type="reset">Reset Password</button>-->
										</p>

									</div>
									
                                    <div>
                                        <p class="mb-0">Reset Password: <a href="#!" class="text-white-50 fw-bold">Send email to Admin</a></p>
                                    </div>
									
                                </div>
								
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	<?php
		if(!empty($errorMsg)){
			errorMsgs($errorMsg);
		}
	?>
	
	
</body>

</html>
