<?php

$showAlert = false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include 'serverConn.php';

    $h_loginParam = $_POST["inputCompany"];
    $h_pass = $_POST["inputPassword"];

    $loginQuery = "SELECT * FROM `host-login` WHERE `h_company` = '$h_loginParam' AND `h_pwd` = '$h_pass' ";
    $result = mysqli_query($connection, $loginQuery);
    $resultNum = mysqli_num_rows($result); 

    if($resultNum == 1)
    {
        session_start();
        $_SESSION['HostLoggedIn'] = true;
        $_SESSION['host'] = $h_loginParam;
        header("location: host-profile.php");
    }
    else
    {
        $showAlert = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grab event -  host login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../Stylesheets/login.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <img src="../Images/logo.png" />
                <a class="navbar-brand ms-3 me-auto fs-3" href="../Main pages/index.html">GRAB EVENT</a>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Grab event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav nav-underline justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item mt-2 me-2">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#">Seminars</a>
                                <ul class="dropdown">
                                    <li><a href="../Event dashboards/Seminar-event.html">Conference on Innovative Technology</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#">Workshops</a>
                                <ul class="dropdown">
                                    <li><a href="../Event dashboards/pottery-event.html">Muddy Woods pottery</a></li>
                                    <li><a href="../Event dashboards/resin-art-event.html">Koi Pond Resin Art</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#">Events</a>
                                <ul class="dropdown">
                                    <li><a href="../Event dashboards/Jazz-event.html">Jazz event - 5th</a></li>
                                    <li><a href="../Event dashboards/rambo-event.html">Rambo circus</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="../Main pages/navbar-host.html">Host event</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a class="nav-button nav-login-button" href="host-login.php">Log in</a>
                <a class="nav-button nav-signup-button" href="host-register.php">Sign up</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>

    <div class="body-main">

    <?php 
        if($showAlert)
        {
            echo'<div class="alert alert-danger alert-dismissible fade show p-3" role="alert">
                    <strong>Invalid Credentials!</strong> Try again.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }
    ?>

    <section class= "container">
        <div class="form-container">
            <form action= "host-login.php" method="POST" class= "row g-3">
                <h4 class="pt-4">Log in [Host]</h4>
                <div class="col-md-12 pt-3">
                    <label for="inputCompany" class="form-label ps-2">Organization's name</label>
                    <input type="text" class="form-control" id="inputCompany" aria-describedby="inputGroupPrepend" name="inputCompany" required>
                </div>
                <div class="col-md-12 pt-3">
                    <label for="inputPassword" class="form-label ps-2">Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="inputPassword" required>
                </div>
                <div class="last-field col-md-12 pt-3 ps-5">
                    <a class="login-text ps-4" href="../PHP registrations/host-register.php">Don't have an account? Sign up</a>
                </div>
                <div class="col-12 pt-3">
                    <input type="submit" value="Log in" class="submit-btn">
                </div>
            </form>
        </div>
    </section>
    </div>

</body>
</html>