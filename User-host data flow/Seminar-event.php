<?php

session_start();
$username = $_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grab event - Seminar event</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../Stylesheets/event.css">
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
                        </ul>
                    </div>
                </div>
                <img src="../Images/user-profile-pic.jpg" class="nav-user-pic"  onclick="toggleProfile()" alt="user image">
                <div class="sub-menu-wrap" id="profileMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            <img src="../images/user-profile-pic.jpg" class="toggle-user-pic"  alt="user image">
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
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>

    <div class="body-event">
        <h3>International Conference On Innovative Trend In Science, Engineering And Technology</h3>
        <div class="container">
            <section class="event event1">
                <div class="event-img">
                    <img src="../Images/body-index-slide1.jpg" alt="seminar event">
                </div>
                <div class="event-description">
                    <p>The "International Conference on Innovative Trends in SET" is a prestigious platform bringing together leading researchers, academics, and industry professionals from across the globe. This conference serves as a hub for the exchange of groundbreaking ideas, emerging trends, and innovative solutions shaping the future of science, engineering, and technology. From thought-provoking keynote addresses to insightful technical sessions, the event promises to inspire innovation and drive progress across diverse domains.</p>
                    <p>Join us in this dynamic gathering to contribute to and learn from the cutting edge of science and technology. Let’s shape the future together.</p>
                    <p>Organized by Institute of Research & Journals.</p>
                </div>
            </section>
        </div>

        <p class="event-title">Event details</p>
        <div class="event-details">
            <p class="event-date">Date: 10<sup>th</sup> April 2025</p>
            <p class="event-time">Time: 10:00 am - 3:00 pm</p>
            <p class="event-venue">Venue: Plot 39/1 6 To 15, Sector 30A, Vashi, Navi Mumbai, Mumbai, Maharashtra 400701</p>
            <p class="event-eligibility">Eligibility: No age criteria.</p>
            <a href="Seminar-enroll.php" class="event-enroll-btn">Enroll</a>
        </div>
    </div>

    <footer>
        <p class="foot-tm">Grab Event</p>
        <p>© Copyright 2025. All rights reserved.</p>
    </footer>

    <script>
        let profileMenu = document.getElementById("profileMenu");

        function toggleProfile() 
        {
            profileMenu.classList.toggle("open-menu");
        }
    </script>

</body>
</html>