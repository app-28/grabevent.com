<?php

session_start();
if(!isset($_SESSION['UserLoggedIn']) || $_SESSION['UserLoggedIn'] != true)
{
    header("location: user-login.php");
    exit();
}
else
{
    $username = $_SESSION['user'];
    $userpass = $_SESSION['pass'];

    include 'serverConn.php';
    
    $retrieveQuery = "SELECT user_id, u_firstName, u_lastName, email_address FROM `user-login` WHERE u_username = '$username' AND u_pwd = '$userpass';";
    $resultRetrieve = mysqli_query($connection, $retrieveQuery);
    while($row = mysqli_fetch_assoc($resultRetrieve))
    {
        $userid = $row['user_id'];
        $userfirst = $row['u_firstName'];
        $userlast = $row['u_lastName'];
        $useremail = $row['email_address'];
    }

    $_SESSION['userid'] = $userid;
    $_SESSION['userfirst'] = $userfirst;
    $_SESSION['userlast']= $userlast;
    $_SESSION['useremail'] = $useremail;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grab event - user profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../Stylesheets/main.css">


</head>

<body>
    <header> 
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <img src="../Images/logo.png" />
                <a class="navbar-brand ms-3 me-auto fs-3" href="user-profile.php">GRAB EVENT</a>
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
                                    <li><a href="Seminar-event.php">Conference on Innovative Technology</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#">Workshops</a>
                                <ul class="dropdown">
                                    <li><a href="Pottery-event.php">Muddy Woods pottery</a></li>
                                    <li><a href="Resin-art-event.php">Koi Pond Resin Art</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#">Events</a>
                                <ul class="dropdown">
                                    <li><a href="Jazz-event.php">Jazz event - 5th</a></li>
                                    <li><a href="Rambo-event.php">Rambo circus</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="aboutUs.php">About us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <img src="../Images/user-profile-pic.jpg" class="nav-user-pic"  onclick="toggleProfile()" alt="user image">            
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

    <div class="body-index">
        <div id="popular-section" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#popular-section" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#popular-section" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#popular-section" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousal-inner">
                <div class="carousel-item active">
                    <img src="../Images/body-index-slide1.jpg" class="d-block w-100 slide-img" alt="Seminar image">
                    <div class="carousel-caption">
                        <h3>International Conference On Innovative Trend In Science, Engineering And Technology</h3>
                        <p>Organized by Institute of Research & Journals at Four Points by Sheratan, Mumbai.</p>
                        <a href="Seminar-event.php" class="slider-btn">View event</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../Images/body-index-slide2.jpeg" class="d-block w-100 slide-img" alt="Concert image">
                    <div class="carousel-caption">
                        <h3>World Jazz Festival - 5th Edition</h3>
                        <p>Organized by Banyan Tree at Sakal Lalit Kalaghar, Pune.</p>
                        <a href="Jazz-event.php" class="slider-btn">View event</a>
                    </div>
                </div>
                <div class="carousel-item c-slide">
                    <img src="../Images/body-index-slide3.jpg" class="d-block w-100 slide-img" alt="Circus image">
                    <div class="carousel-caption">
                        <h2 class="fw-bolder">RAMBO CIRCUS</h2>
                        <p>A Must-See Family Entertainment Extravaganza! 🎪, held at multiple places.</p>
                        <a href="Rambo-event.php" class="slider-btn">View event</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-join">
            <p class="fs-3">Discover. Book. Enjoy.</p>
            <p>Join our community of event goers to never miss out on the moments that matter.</p>
        </div>

        <div class="body-event-section">
            <p class="upcoming-section">Upcoming events</p>
            <div class="container">
                <div class="row g-5">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <img src="../Images/body-index-card1-.jpg" alt="pottery workshop" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">Muddy Woods pottery workshop</h5>
                                <p class="card-text">Immerse yourself in the timeless craft of pottery in our engaging hands-on workshop from wheel-throwing delicate forms to crafting rustic hand-built pieces and experimenting with intricate sculptural designs. Guided by skilled instructors, you'll learn essential techniques like shaping, glazing, and texturing to create functional pieces like bowls and vases or unique decorative art.</p>
                                <a href="Pottery-event.php" class="card-btn card1-btn">View event</a> 
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="card">
                            <img src="../Images/body-index-card2.png" alt="pottery workshop" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">Koi Pond Resin Art</h5>
                                <p class="card-text">Explore a variety of resin art styles, from ocean-inspired designs that capture the beauty of waves to encapsulating flowers and objects in glass-like resin. Also, discover the techniques behind creating stunning abstract pieces, functional art like coasters and trays, and even elegant resin jewelry.</p>
                                <a href="Resin-art-event.php" class="card-btn card2-btn">View event</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <footer>
        <p class="foot-tm">Grab Event</p>
        <p>© Copyright 2025. All rights reserved.</p>
    </footer>
    
    <script>
        let profileMenu = document.getElementById("profileMenu");

        function toggleProfile() {
            profileMenu.classList.toggle("open-menu");
        }
    </script>
</body>

</html>