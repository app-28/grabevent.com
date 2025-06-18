<?php

$showAlert = false;
$exists = false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include 'serverConn.php';

    $h_firstName = $_POST["inputFirstname"];
    $h_lastName = $_POST["inputLastname"];
    $h_company = $_POST["inputCompany"];
    $h_pwd = $_POST["inputPassword"];
    $h_email = $_POST["inputEmail"];
    $h_contact = $_POST["inputContact"];
    $h_city = $_POST["inputCity"];
    $h_state = $_POST["inputState"];

    $existsQuery = "SELECT * FROM `host-login` WHERE `email_address` = '$h_email' ";
    $resultExists = mysqli_query($connection, $existsQuery);
    $resultNum = mysqli_num_rows($resultExists); 
    if($resultNum == 1)
    {
        $exists = true;
    }
    else
    {
        $registerQuery = "INSERT INTO `host-login` (`h_firstName`, `h_lastName`, `h_company`, `h_pwd`, `email_address`, `contact_no`, `city`, `state`) VALUES ('$h_firstName', '$h_lastName', '$h_company', '$h_pwd', '$h_email', '$h_contact', '$h_city', '$h_state') ";
        $resultRegister = mysqli_query($connection, $registerQuery);
        if($resultRegister)
            $showAlert = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en"> 
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grab event - host register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../Stylesheets/signup.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <img src="../images/logo.png" />
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
                        </ul>
                    </div>
                </div>
                <a class="nav-button nav-login-button" href="host-login.php">Log in</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>

    <div class="body-main">

        <?php
            if($exists)
            {
                echo'<div class="alert alert-danger alert-dismissible fade show p-3" role="alert">
                        <strong>Oops!</strong> Email Id already in use.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            }

            if($showAlert)
            {
                echo'<div class="alert alert-success alert-dismissible fade show p-3" role="alert">
                    <strong>Signed up!</strong> Log in to continue.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
            }
        ?>

    <section class= "container">
        <div class="form-container my-2">
            <form action= "host-register.php" method="POST" class= "row g-3">
                <h4>Registration [Host]</h4>
                <div class="col-md-6">
                    <label for="inputFirstname" class="form-label ps-2">First name</label>
                    <input type="text" class="form-control" id="inputFirstname" name="inputFirstname" required>
                </div>
                <div class="col-md-6">
                    <label for="inputLastname" class="form-label ps-2">Last name</label>
                    <input type="text" class="form-control" id="inputLastname" name="inputLastname" required>
                </div>
                <div class="col-md-6">
                    <label for="inputCompany" class="form-label ps-2">Organizing Company</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" class="form-control" id="inputCompany" name="inputCompany" aria-describedby="inputGroupPrepend" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword" class="form-label ps-2">Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="inputPassword" required>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail" class= "form-label ps-2">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="inputEmail" required>
                </div>
                <div class="col-md-6">
                    <label for="inputContact" class= "form-label ps-2">Contact no.</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">+91</span>
                        <input type="text" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="inputContact" name="inputContact" aria-describedby="inputGroupPrepend" required>
                    </div>                
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label ps-2">City</label>
                    <input type="text" class="form-control" id="inputCity" name="inputCity" required>
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label ps-2">State</label>
                    <select id="inputState" class="form-select" name="inputState" required>
                        <option selected>Maharashtra</option>
                        <option>Karnataka</option>
                        <option>Rajasthan</option>
                    </select>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" required>
                        <label class="form-check-label" for="gridCheck">
                        Agree to Terms & Conditions
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <input type="submit" value="Sign in" class="submit-btn">
                </div>
            </form>
        </div>
    </section>
    </div>

</body>
</html>