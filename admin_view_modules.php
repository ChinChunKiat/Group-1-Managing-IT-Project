<?php
// index.php
require_once './include/include_database.php';
require_once './include/functions.php';

// Fetch module and submodule data
$moduleData = getModuleData();

// Fetch submodule data
$submoduleData = getSubmoduleData();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module and Submodule Dropdown</title>
</head>

<body>

    <h2>Module and Submodule Dropdown</h2>

    <!-- Display Module Dropdown -->
    <label for="moduleDropdown">Select Module:</label>
    <select id="moduleDropdown" name="moduleDropdown">
        <?php
        foreach ($moduleData as $moduleRow) {
            echo "<option value='{$moduleRow['module_name']}'>{$moduleRow['module_name']}</option>";
        }
        ?>
    </select>

    <!-- Display Module Details -->
    <div id="moduleDetails"></div>

    <!-- Display Submodule Dropdown -->
    <label for="submoduleDropdown">Select Submodule:</label>
    <select id="submoduleDropdown" name="submoduleDropdown">
        <?php
        // Initially display all submodules
        foreach ($submoduleData as $submoduleRow) {
            echo "<option data-module-name='{$submoduleRow['module_name']}' data-submodule-description='{$submoduleRow['submodule_description']}' value='{$submoduleRow['submodule_name']}'>{$submoduleRow['submodule_name']}</option>";
        }
        ?>
    </select>

    <!-- Display Submodule Details -->
    <div id="submoduleDetails"></div>

    <script>
        // Add an event listener to the module dropdown
        document.getElementById("moduleDropdown").addEventListener("change", function () {
            // Get the selected module name
            var selectedModule = this.value;

            // Get the module details container
            var moduleDetailsContainer = document.getElementById("moduleDetails");

            // Clear existing module details
            moduleDetailsContainer.innerHTML = "";

            // Display details of the selected module
            <?php
            foreach ($moduleData as $moduleRow) {
                echo "if ('{$moduleRow['module_name']}' === selectedModule) {";
                echo "moduleDetailsContainer.innerHTML += '<p><strong>Module Name:</strong> {$moduleRow['module_name']}</p>';";
                echo "moduleDetailsContainer.innerHTML += '<p><strong>Module Description:</strong> {$moduleRow['module_description']}</p>';";
                echo "}";
            }
            ?>

            // Get the submodule dropdown
            var submoduleDropdown = document.getElementById("submoduleDropdown");

            // Clear existing options
            submoduleDropdown.innerHTML = "";

            // Display only submodules that match the selected module
            <?php
            foreach ($submoduleData as $submoduleRow) {
                echo "if ('{$submoduleRow['module_name']}' === selectedModule) {";
                echo "var option = document.createElement('option');";
                echo "option.value = '{$submoduleRow['submodule_name']}';";
                echo "option.text = '{$submoduleRow['submodule_name']}';";
                echo "option.setAttribute('data-submodule-description', '{$submoduleRow['submodule_description']}');";
                echo "submoduleDropdown.add(option);";
                echo "}";
            }
            ?>

            // Trigger the change event for the submodule dropdown to update submodule details
            var changeEvent = new Event('change');
            submoduleDropdown.dispatchEvent(changeEvent);
        });

        // Add an event listener to the submodule dropdown
        document.getElementById("submoduleDropdown").addEventListener("change", function () {
            // Get the selected submodule name
            var selectedSubmodule = this.value;

            // Get the submodule details container
            var submoduleDetailsContainer = document.getElementById("submoduleDetails");

            // Clear existing submodule details
            submoduleDetailsContainer.innerHTML = "";

            // Display details of the selected submodule
            <?php
            foreach ($submoduleData as $submoduleRow) {
                echo "if ('{$submoduleRow['submodule_name']}' === selectedSubmodule) {";
                echo "submoduleDetailsContainer.innerHTML += '<p><strong>Submodule Name:</strong> {$submoduleRow['submodule_name']}</p>';";
                echo "submoduleDetailsContainer.innerHTML += '<p><strong>Submodule Description:</strong> {$submoduleRow['submodule_description']}</p>';";
                echo "}";
            }
            ?>
        });
    </script>

</body>

</html>
