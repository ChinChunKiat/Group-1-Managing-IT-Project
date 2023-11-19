<?php
include_once 'include/db_connection.php';
include_once 'include/functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitize_input($_POST["username"]);
    $password = sanitize_input($_POST["password"]);

    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        session_start();

        // Fetch the user information
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Store the user ID in the session
        $_SESSION["user_id"] = $user['user_id'];

        // Optionally, you can store other user information in the session as needed
        $_SESSION["user_username"] = $user['username'];

        header("Location: user_dashboard.php");
        exit();
    } else {
        $error_message = "Invalid username or password";
    }

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/styles_login.css">
</head>

<body>
    <div class="container">
        <div class="row"> <!-- Remove justify-content-center to align left -->
            <div class="col-md-4 login-container">
                <h2 class="text-center">User Login</h2>
                <?php if (isset($error_message)): ?>
                    <p style="color: red;">
                        <?php echo $error_message; ?>
                    </p>
                <?php endif; ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group mb-3"> <!-- Add margin-bottom to the form group -->
                        <input type="submit" class="btn btn-primary btn-block" value="Login">
                    </div>
                    <div class="form-group text-center"> <!-- Center align the links -->
                        <a href="register.php" class="mr-3">Register here</a>
                        <a href="forgot_password.php" class="mr-3">Forgot Password?</a>
                        <a href="contact_support.php">Contact Support</a>
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