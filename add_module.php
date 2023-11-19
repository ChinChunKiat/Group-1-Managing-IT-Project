<?php
// Include database connection and functions
include_once 'include/db_connection.php';
include_once 'include/functions.php';

// Check if the form is submitted
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $module_name = $_POST['module_name'];
    $module_code = $_POST['module_code'];
    $module_description = $_POST['module_description'];
    $selected_departments = $_POST['departments'];

    // Validate form data (you can add more validation)
    if (empty($module_name) || empty($module_code) || empty($module_description) || empty($selected_departments)) {
        echo "All fields are required.";
    } else {
        // Call function to create a module
        $result = createModule($conn, $module_name, $module_code, $module_description, $selected_departments);

        if ($result) {
            echo "Module created successfully!";
            header("refresh:2;url=manage_module.php");
        } else {
            echo "Error creating module.";
        }
    }
}

// Get list of departments
$departments = getDepartments();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Module</title>
</head>

<body>
    <h2>Create Module</h2>
    <form method="post" action="">
        <label for="module_name">Module Name:</label>
        <input type="text" name="module_name" required><br>

        <label for="module_code">Module Code:</label>
        <input type="text" name="module_code" required><br>

        <label for="module_description">Module Description:</label>
        <textarea name="module_description" rows="4" required></textarea><br>

        <label for="departments[]">Select Departments:</label>
        <select name="departments[]" multiple required>
            <?php foreach ($departments as $department): ?>
                <option value="<?php echo $department['department_id']; ?>">
                    <?php echo $department['department_name']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Create Module</button>
    </form>
</body>

</html>