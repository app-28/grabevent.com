<?php

session_start();
$showAlert = false;
if(!isset($_SESSION['UserLoggedIn']) || $_SESSION['UserLoggedIn'] != true)
{
    header("location: user-login.php");
    exit();
}
else
{
    $userid = $_SESSION['userid'];
    $username = $_SESSION['user'];
    $userfirst = $_SESSION['userfirst'];
    $userlast = $_SESSION['userlast'];
    $useremail = $_SESSION['useremail'];

    include 'serverConn.php';

    $retrieveQuery = "SELECT `event_id`, `event_price` FROM `event` WHERE `event_name` = 'Muddy Woods pottery workshop';";
    $resultRetrieve = mysqli_query($connection, $retrieveQuery);
    while($row = mysqli_fetch_assoc($resultRetrieve))
    {
        $eventid = $row['event_id'];
        $eventprice = $row['event_price'];
    }

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $bookedDate = $_POST['inputDate'];
        $bookedTime = $_POST['inputTime'];
        $bookedSeats = $_POST['inputSeats'];

        $registerQuery = "INSERT INTO `enrollment`(`user_id`, `event_id`, `event_date`, `event_time`, `enrollment_seats`) VALUES ('$userid','$eventid','$bookedDate','$bookedTime','$bookedSeats') ";
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
    <title>Grab event -  Seminar event enrollment page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../Stylesheets/all-event-styles/pottery.css">
</head>
<body>
<header> 
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <img src="../images/logo.png" />
                <a class="navbar-brand ms-3 me-auto fs-3" href="../Individual profile dashboards/user-profile.html">GRAB EVENT</a>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Grab event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav nav-underline justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item mt-2 me-3">
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
                                    <li><a href="pottery-event.html">Muddy Woods pottery</a></li>
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
                <img src="../images/user-profile-pic.jpg" class="nav-user-pic"  onclick="toggleProfile()" alt="user image">            
                <div class="sub-menu-wrap" id="profileMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            <img src="../Images/user-profile-pic.jpg" class="toggle-user-pic"  alt="user image">
                            <h5> <?php echo $username ?> </h5>
                        </div>
                        <hr>
                        <a href="#" class="user-info-list">
                            <i class="fa-solid fa-user-pen"></i>
                            <p>Edit profile</p>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </a>

                        <a href="#" class="user-info-list">
                            <i class="fa-solid fa-gear"></i>                            
                            <p>Settings & Privacy</p>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </a> 

                        <a href="#" class="user-info-list">
                            <i class="fa-solid fa-circle-info"></i>                            
                            <p>Help & Support</p>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </a>

                        <a href="logout.php" class="user-info-list">
                            <i class="fa-solid fa-right-from-bracket"></i>                            
                            <p>Log out</p>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="body-main">

    <?php
    if($showAlert)
        {
            echo'<div class="alert alert-success alert-dismissible fade show p-3" role="alert">
                    <strong>Congratulations!</strong> You are successfully enrolled to the event.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }
    ?>

    <section class= "container">
        <div class="form-container">
            <form action= "Pottery-enroll.php" method="POST" class= "row g-3">
                <h4 class="pt-4 pb-3">Enrollment Page</h4>
                <div class="col-md-6">
                    <label for="inputFirstname" class="form-label ps-2">First name: </label>
                    <input type="text" class="form-control" id="inputFirstname" name="inputFirstname" placeholder="<?php echo $userfirst ?>" >
                </div>
                <div class="col-md-6">
                    <label for="inputLastname" class="form-label ps-2">Last name: </label>
                    <input type="text" class="form-control" id="inputLastname" name="inputLastname" placeholder="<?php echo $userlast ?>" >
                </div>

                <div class="col-md-6">
                    <label for="inputEmail" class= "form-label ps-2">Email: </label>
                    <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="<?php echo $useremail ?>" >
                </div>
                <div class="col-md-6">
                    <label for="inputSeats" class= "form-label ps-2">No. of Seats: </label>
                    <input type="number" class="form-control" id="inputSeats" name="inputSeats" required>             
                </div>
                <div class="col-md-6">
                    <label for="inputDate" class="form-label ps-2">Preferred Date [YYYY-MM-DD]:</label>
                    <select id="inputDate" class="form-select" name="inputDate" required>
                        <option selected>2025-04-05</option>   
                        <option>2025-04-06</option>
                        <option>2025-04-07</option>
                        <option>2025-04-08</option>
                        <option>2025-04-09</option>
                        <option>2025-04-10</option>
                    </select>             
                </div>
                <div class="col-md-6">
                    <label for="inputTime" class="form-label ps-2">Preferred time:</label>
                    <select id="inputTime" class="form-select" name="inputTime" required>
                        <option selected>10:00am - 12:00pm</option>
                        <option>12:00pm - 02:00pm</option>
                        <option>02:00pm - 04:00pm</option>
                        <option>04:00pm - 06:00pm</option>
                    </select>                 
                </div>
                <div class="col-md-6">
                    <label for="eventprice" class="form-label ps-2">Event price per seat [in Rs]:</label>
                    <input type="number" class="form-control" id="eventprice" name="eventprice" value="<?php echo $eventprice ?>" disabled>                
                </div>
                <div class="col-md-6">
                    <label for="totalprice" class="form-label ps-2">Total price:</label>
                    <input type="text" class="form-control" id="totalprice" name="totalprice">                
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
                    <input type="submit" value="Enroll" class="enroll-btn">
                </div>
            </form>
        </div>
    </section>
    </div>

    <script>
        const inputprice = document.getElementById('eventprice');
        const inputseats = document.getElementById('inputSeats');
        const totalprice = document.getElementById('totalprice');

        function calculateTotal() 
        {
            const price = parseFloat(inputprice.value) || 0; // Get price value
            const quantity = parseInt(inputseats.value) || 0; // Get selected seats value
            const total = price * quantity; // Calculate total price
            totalprice.value = total.toFixed(2); // Display total price in the input
        }

        inputseats.addEventListener('input', calculateTotal);
    </script>
</body>
</html>