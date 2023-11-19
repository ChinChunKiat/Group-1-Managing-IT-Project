<!-- header.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <title>Your Website Title</title>
</head>

<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <?php echo $pageTitle; ?>
            </div>
            <div class="user-icon" onclick="toggleSideMenu()">
                <img src="<?php echo $userIconPath; ?>" alt="User Icon">
            </div>
        </div>
    </header>

    <!-- Inside the div with class="side-menu" -->
    <div class="side-menu" id="sideMenu">
        <div class="close-btn" onclick="toggleSideMenu()">&times;</div>

        <div class="user-info">
            <div class="user-icon" onclick="toggleSideMenu()">
                <img src="<?php echo $userIconPath; ?>" alt="User Icon">
            </div>
            <div class="logout">
                <a href="logout.php">Logout</a>
            </div>
        </div>

        <nav class="menu-navigation">
            <a href="admin_dashboard.php">Dashboard</a>
            <a href="#">Modules</a>
            <a href="manage_module.php">Edit Modules</a>
            <a href="#">View Users</a>
            <a href="#">View Requests</a>
        </nav>
    </div>


    <script>
        function toggleSideMenu() {
            var sideMenu = document.getElementById("sideMenu");
            sideMenu.style.width = sideMenu.style.width === "250px" ? "0" : "250px";
        }
    </script> <!-- Include your JavaScript file -->
</body>

</html>