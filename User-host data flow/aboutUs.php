<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grab event - About us</title>
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
                <img src="../Images/user-profile-pic.jpg" class="nav-user-pic" alt="user image">
            </div>
        </nav>
    </header>

    <main>
        <div class="heading">
            <h1>About Us</h1>
            <p>An event is a cherished gathering that transforms fleeting moments into lasting connections and heartfelt memories.</p>
        </div>
        <div class="container">
            <section class="about">
                <div class="about-img">
                    <img src="../Images/about-img.jpg" alt="aboutUs image" />
                </div>
                <div class="about-content">
                    <h4>"Discover. Book. Enjoy."</h4>
                    <p>In today's fast-paced world, organizing and managing events can be a daunting task. The Grab Event is designed to streamline the entire process, making it easier for both event organizers and attendees to plan, book, and manage events efficiently. With a user-friendly interface and robust features, the system allows users to create events, track registrations, manage attendees, and process payments seamlessly. Whether it's a small gathering or a large conference, the Grab Event provides the tools and flexibility needed to ensure a smooth and successful event experience for everyone involved.</p>
                    <a href="#">Read more</a>
                </div>
            </section>
        </div>
    </main>

    <footer>
        <p class="foot-tm">Grab Event</p>
        <p>© Copyright 2025. All rights reserved.</p>
    </footer>
</body>
</html>