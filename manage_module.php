<?php
$pageTitle = "Pasti Nyala Module";
$userIconPath = "profile.png";
?>

<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $pageTitle; ?>
    </title>
    <!-- Add your CSS styles here -->
    <style>
        /* Add your styles for cards here */
        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            margin: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <h3>Add Module</h3>
                    <!-- Add your content for Add Module card here -->
                    <p>This card is for adding modules.</p>
                    <a href="add_module.php" class="btn btn-primary">Go to Add Module</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <h3>Edit Module</h3>
                    <!-- Add your content for Edit Module card here -->
                    <p>This card is for editing modules.</p>
                    <a href="edit_module.php" class="btn btn-primary">Go to Edit Module</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <h3>Delete Module</h3>
                    <!-- Add your content for Delete Module card here -->
                    <p>This card is for deleting modules.</p>
                    <a href="delete_module.php" class="btn btn-primary">Go to Delete Module</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>