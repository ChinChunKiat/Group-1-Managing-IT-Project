<?php
// Start the session
session_start();

if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

include_once 'include/db_connection.php';
// Include functions
include 'include/functions.php';


// Get user department based on user_id
$user_department = getUserDepartment($_SESSION['user_id']);

// Fetch modules based on the user's department
$modules = getModulesByDepartment($user_department);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Modules</title>
</head>
<body>

<h2>Modules for Department: <?php echo $user_department; ?></h2>

<table border="1">
    <tr>
        <th>Module Name</th>
        <th>Module Code</th>
        <th>Module Description</th>
    </tr>

    <?php foreach ($modules as $module): ?>
        <tr>
            <td><?php echo $module['module_name']; ?></td>
            <td><?php echo $module['module_code']; ?></td>
            <td><?php echo $module['module_description']; ?></td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
