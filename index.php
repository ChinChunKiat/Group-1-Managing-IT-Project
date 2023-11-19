<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>MIP Assignment1</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="welcome-box">
                    <h2 class="welcome-heading">Welcome to Pasti Nyala</h2>
                    <div class="button-choose">
                        <div class="register-button">
                            <div class="circle"></div>
                            <button class="redirect-button" data-href="admin_login.php">Admin</button>
                        </div>
                        <div class="register-button">
                            <div class="circle"></div>
                            <button class="redirect-button" data-href="user_login.php">User</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 d-flex align-items-center justify-content-center">
                <div class="logo-section">
                    <img src="./image/pnsb-original.png" alt="Logo" class="logo">
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $(".redirect-button").on("click", function () {
                var destination = $(this).attr("data-href");
                window.location.href = destination;
            });
        });
    </script>
</body>

</html>
