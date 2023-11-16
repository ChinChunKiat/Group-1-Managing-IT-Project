<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>MIP Assignment1</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg  navbar-dark " id="nav-bar">
        <a class="navbar-brand text-white" href="./index.html">Pasti Nyala</a>
        <!-- Toggle button for mobile navigation -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navigation links -->
        <div class="collapse navbar-collapse" id="navbarNav">
		<!--
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="">Main Module</a>
                </li>
                <li class="nav-item text-white">
                    <a class="nav-link text-white" href=".">Sub Module</a>
                </li>
                <li class="nav-item text-white">
                    <a class="nav-link text-white" href=".">Function</a>
                </li>
            </ul>
			-->
        </div>
    </nav>
    <div class="bg-image d-flex" style="
    background-image: url('./image/background.png');
    height: 100vh;
  ">
        <div class="container" style="border-radius: 1rem;">
            <div class="row">
                <div class="col-md-5" style="background: #434343; border-radius: 1rem;
                margin-top: 10%;">
                    <div class="col">
                        <h1 class="intro-text">User Page:
                        </h1>
                    </div>
                    <div class="button_choosen">
                        <h4 class="Login-As">Do you have existing account?</h4>
                        <div class="row text-left">
                            <div class="col">
                                <div class="register-button" id="input-3">
                                    <div class="circle-3"></div>
                                    <a href="./user_login.php">Login</a>
                                </div>
                                <div class="register-button" id="input-3">
                                    <div class="circle-3"></div>
                                    <a href="#">Register</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-100">
                    </div>
                </div>
                <!-- <div class="right_side">If wwant to add something at the right side</div> -->
            </div>
        </div>
    </div>
</body>

</html>