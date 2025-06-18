<?php

session_start();
if(!isset($_SESSION['HostLoggedIn']) || $_SESSION['HostLoggedIn'] != true)
{
    header("location: host-login.php");
    exit();
}
else
{
    $company = $_SESSION['host'];

    include 'serverConn.php';
    
    $retrieveQuery = "SELECT `host-login`.`host_id`, `host-login`.`h_firstName`, `host-login`.`h_lastName`, `host-login`.`h_company`, `host-login`.`email_address`, `event`.`event_id`, `event`.`event_name` FROM `host-login` JOIN `event` ON `host-login`.`host_id` = `event`.`host_id` WHERE `host-login`.`h_company` = '$company' ;";
    $resultRetrieve = mysqli_query($connection, $retrieveQuery);
    while($row = mysqli_fetch_assoc($resultRetrieve))
    {
        $hostid = $row['host_id'];
        $hostfirst = $row['h_firstName'];
        $hostlast = $row['h_lastName'];
        $hostcompany = $row['h_company'];
        $hostemail = $row['email_address'];
        $eventid = $row['event_id'];
        $eventname = $row['event_name'];
    }

    $displayQuery = "SELECT `user-login`.`u_firstName`, `user-login`.`u_lastName`, `user-login`.`email_address`, `enrollment`.`enrollment_seats`, `enrollment`.`event_date`, `enrollment`.`event_time` FROM `user-login` JOIN `enrollment` ON `user-login`.`user_id` = `enrollment`.`user_id` WHERE `enrollment`.`event_id` = '$eventid'; ";
    $resultDisplay = mysqli_query($connection, $displayQuery);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grab event - Host profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../Stylesheets/host-profile.css" />
</head>
<body>
    <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h3>GRAB EVENT</h3>
        </div>
         
        <div class="side-content">
            <div class="profile">
                <div class="profile-img bg-img" style="background-image: url(../Images/user-profile-pic.jpg)"></div>
                <h5> <?php echo $hostfirst . " " . $hostlast ?> </h5>
                <p> <?php echo $hostemail ?> </p>
            </div>
 
            <div class="side-menu">
                <ul>
                    <li>
                        <a href="#" class="active">
                            <i class="fa-solid fa-house"></i>
                            <small>Dashboard</small>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-user"></i>
                            <small>Profile</small>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-message"></i>
                            <small>Chat</small>
                        </a>
                    </li>
                    <li>
                        <a href="aboutUs.php">
                            <i class="fa-solid fa-laptop"></i>
                            <small>About us</small>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-gear"></i>
                            <small>Settings</small>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
     
    <div class="main-content">
        <header>
            <div class="header-content">
                <label for="menu-toggle" class="menu-toggle-icon">
                    <i class="fa-solid fa-bars header-icon"></i>
                </label>
                 
                <div class="header-menu">
                    <div class="notify-icon">
                        <i class="fa-solid fa-bell header-icon"></i>
                    </div>
                     
                    <div class="host">
                        <a href="logout.php">
                            <i class="fa-solid fa-right-from-bracket header-icon"></i>
                            <p>Logout</p>
                        </a>
                    </div>
                </div>
            </div>
        </header>
         
         
        <main>
            <div class="page-content">

                <div class="event">
                    <div class="card text-center" style="width: 60rem">
                        <div class="card-header">
                            <?php echo $hostcompany ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"> <?php echo $eventname ?> </h5>
                        </div>
                    </div>
                </div>
 
                <div class="records table-responsive">
                    <div class="record-header">
                        <div class="record-manipulate">
                            <button>Add record</button>
                            <button>Delete record</button>
                        </div>
                    </div>
 
                    <div>
                        <table width="100%">
                            <thead>
                            <tr>
                                <th> ATTENDEE NAME </th>
                                <th> EMAIL ADDRESS </th>
                                <th> SEATS </th>
                                <th> DATE </th>
                                <th> TIME </th>
                                <th> PAYMENT STATUS </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php       
                                    while ($row = mysqli_fetch_assoc($resultDisplay)) 
                                    {
                                ?>  
                                        <td> <?php echo $row['u_firstName'] . " " . $row['u_lastName']; ?> </td>
                                        <td> <?php echo $row['email_address']; ?> </td>
                                        <td> <?php echo $row['enrollment_seats']; ?> </td>
                                        <td> <?php echo $row['event_date']; ?> </td>
                                        <td> <?php echo $row['event_time']; ?> </td>
                                        <td> <button class="paymentStatus"> Paid </button> </td>
                            </tr>
                                <?php
                                    }
                                    $totalQuery = "SELECT SUM(`enrollment_seats`) AS total_sum FROM `enrollment` WHERE `event_id` = '$eventid'; ";
                                    $totalResult = mysqli_query($connection, $totalQuery);
                                    if ($totalResult) 
                                    {
                                        $row = mysqli_fetch_assoc($totalResult);
                                        $totalSum = $row['total_sum'];
                                    }
                                ?>                      
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="record-footer">
                        <div class="count">
                            <p><strong>Total attendees: <?php echo $totalSum ?> </strong></p>
                        </div>
                    </div>
                </div>
            </div>     
        </main>
    </div>
</body>
</html>