<?php
include_once 'include/db_connection.php';
include_once 'include/functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitize_input($_POST["username"]);
    $email = sanitize_input($_POST["email"]);
    $password = sanitize_input($_POST["password"]);
    $gender = sanitize_input($_POST["gender"]);
    $uid = sanitize_input($_POST["uid"]);
    $department = sanitize_input($_POST["department"]);

    // Insert user information into the users table
    $insertUserSQL = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($insertUserSQL) === TRUE) {
        // Get the user ID of the newly inserted user
        $userID = $conn->insert_id;

        // Insert additional user information into the user_information table
        $insertUserInfoSQL = "INSERT INTO user_information (user_id, email, gender, uid, department) VALUES ('$userID', '$email', '$gender', '$uid', '$department')";
        if ($conn->query($insertUserInfoSQL) === TRUE) {
            // Registration successful
            header("Location: user_login.php"); // Redirect to login page
            exit();
        } else {
            $error_message = "Error inserting user information: " . $conn->error;
        }
    } else {
        $error_message = "Error creating user: " . $conn->error;
    }
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="css/styles_register.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 register-container">
                <h2 class="text-center">User Registration</h2>
                <?php if (isset($error_message)): ?>
                    <p style="color: red;">
                        <?php echo $error_message; ?>
                    </p>
                <?php endif; ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <!-- Add new form fields for registration -->
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="uid">UID:</label>
                        <input type="text" class="form-control" name="uid" required>
                    </div>
                    <div class="form-group">
                        <label for="department">Department:</label>
                        <select class="form-control" name="department" required>
                            <?php
                            // Call a function to get department options
                            $departmentOptions = getDepartmentOptions($conn);
                            // Generate options for the dropdown
                            foreach ($departmentOptions as $option) {
                                echo "<option value='$option'>$option</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <input type="submit" class="btn btn-primary btn-block" value="Register">
                    </div>
                    <div class="form-group text-center">
                        <a href="login.php">Already have an account? Login here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>


</html>