<!-- index.php -->

<?php
$pageTitle = "Pasti Nyala";
$userIconPath = "profile.png";

// Include database connection and functions
include_once 'include/db_connection.php';
include_once 'include/functions.php';

// Get list of modules
$modules = getModules($conn);
?>

<?php include 'header.php'; ?>

<!-- Your main content for the index page goes here -->
<h2>Module List</h2>

<div class="module-list">
    <?php foreach ($modules as $module): ?>
        <div class="module-card">
            <h3>
                <?php echo $module['module_name']; ?>
            </h3>
            <p>Code:
                <?php echo $module['module_code']; ?>
            </p>
            <p>Description:
                <?php echo $module['module_description']; ?>
            </p>
            <!-- Add other module information as needed -->
        </div>
    <?php endforeach; ?>
</div>

</html>