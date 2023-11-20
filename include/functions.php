<?php
// Separate database connection into a different file or class

// Function to sanitize input data
// function sanitize_input($data)
// {
//     return htmlspecialchars(stripslashes(trim($data)));
// }

// Function to create a module
// Function to create a module
// function createModule($conn, $module_name, $module_code, $module_description, $selected_departments)
// {
//     try {
//         $conn->beginTransaction();

//         // Insert the new module into the Module table
//         $sql = "INSERT INTO Module (module_name, module_code, module_description, department_id) VALUES (?, ?, ?, ?)";
//         $stmt = $conn->prepare($sql);
//         $result = $stmt->execute([$module_name, $module_code, $module_description, $selected_departments[0]]);

//         // Commit the transaction on success
//         $conn->commit();

//         return $result;
//     } catch (PDOException $e) {
//         // Roll back the transaction on exception
//         $conn->rollBack();
//         // Log the error or handle it based on your requirements
//         die("Error creating module: " . $e->getMessage());
//     }
// }



// function getDepartments()
// {
//     global $conn;

//     try {
//         // Retrieve the list of departments from the Department table
//         $sql = "SELECT * FROM department";
//         $stmt = $conn->query($sql);
//         $departments = $stmt->fetchAll(PDO::FETCH_ASSOC);

//         return $departments;
//     } catch (PDOException $e) {
//         // Log the error or handle it based on your requirements
//         die("Error getting departments: " . $e->getMessage());
//     }
// }


// include/functions.php

// include/functions.php

// include/functions.php



function getModules($conn)
{
    try {
        // Replace 'your_modules_table' with the actual table name for modules in your database
        $query = "SELECT * FROM module";

        // Prepare the query
        $statement = $conn->prepare($query);

        // Execute the query
        $statement->execute();

        // Fetch the data into an associative array
        $modules = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $modules;
    } catch (PDOException $e) {
        // Log or display the error message
        error_log("Query failed: " . $e->getMessage());
        // You can also handle the error in a more graceful way if needed
        // For example, return an empty array or set a flag for the calling code to handle
        return array();
    }
}

require_once 'include_database.php';

function getModuleData()
{
    global $conn;  // Use the global connection variable

    $moduleQuery = "SELECT * FROM module_table";
    $moduleResult = mysqli_query($conn, $moduleQuery);

    $moduleData = array();
    while ($row = mysqli_fetch_assoc($moduleResult)) {
        $moduleData[] = $row;
    }

    return $moduleData;
}

function getSubmoduleData()
{
    global $conn;  // Use the global connection variable

    $submoduleQuery = "SELECT * FROM submodule_table";
    $submoduleResult = mysqli_query($conn, $submoduleQuery);

    $submoduleData = array();
    while ($row = mysqli_fetch_assoc($submoduleResult)) {
        $submoduleData[] = $row;
    }

    return $submoduleData;
}


// function getDepartmentOptions($conn)
// {
//     $options = [];

//     // Fetch departments from the database
//     $departmentQuery = "SELECT department_name FROM department";
//     $departmentResult = $conn->query($departmentQuery);

//     // Check for errors in the query execution
//     if (!$departmentResult) {
//         die("Query failed: " . $conn->error);
//     }

//     if ($departmentResult->num_rows > 0) {
//         while ($row = $departmentResult->fetch_assoc()) {
//             $options[] = $row["department_name"];
//         }
//     }

//     return $options;
// }

// function getUserDepartment($user_id)
// {
//     global $conn;

//     $sql = "SELECT department FROM user_information WHERE user_id = :user_id";
//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(':user_id', $user_id);
//     $stmt->execute();

//     $result = $stmt->fetch(PDO::FETCH_ASSOC);

//     return $result['department'];
// }

// // Function to get modules based on department
// function getModulesByDepartment($department_id)
// {
//     global $conn;

//     $sql = "SELECT module_id, module_name, module_code, module_description
//             FROM Module
//             WHERE department_id = :department_id";

//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(':department_id', $department_id);
//     $stmt->execute();

//     return $stmt->fetchAll(PDO::FETCH_ASSOC);
// }

?>
