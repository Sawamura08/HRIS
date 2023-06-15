<?php

include('../connection.php'); // to connect to database

session_start();
$idNumber = $_SESSION['idNumber'];
?>

<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../login/css/navigation.css">
    <link rel="stylesheet" href="adminPanel.css">
    <link rel="shortcut icon" href="RGEM.png" type="image/x-icon">
    <script src="../login/js/navigation.js" defer></script>
    <title>Admin</title>
</head>

<body>

    <header class="headers" style="width: 100%;">
        <nav class="navbars">
            <a href="#" class="navLogo">RGEM</a>
            <ul class="navMenu">
                <li class="navItem">
                    <a href="../login/mj_mainPage.php" class="navLink">Home</a>
                </li>
                <li class="navItem">
                    <a href="../attendance/mj_attendance.php" class="navLink">Attendance</a>
                </li>
                <li class="navItem">
                    <a href="../leave/mj_leave.php" class="navLink">Leave</a>
                </li>
                <li class="navItem">
                    <a href="#" class="navLink">Profile</a>
                </li>
                <li class="navItem">
                    <a href="../admin/mj_adminPanel.php" class="navLink">Admin</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>

    <!-- header title -->
    <div class="adminHeaderContainer">
        <p class="title">Admin</p>
    </div>

    <div class="containers">
        <!-- Employee Data Management -->
        <div class="function" onclick="window.location.href='../admin/mj_data.php'">
            <div class="iconContainer">
                <div class="icon">
                    <i class="fa-regular fa-folder-open"></i>
                </div>
            </div>
            <div class="functionTitle">
                <p>Employee Data Management</p>
            </div>
        </div>

        <!-- Attendance Tracker -->
        <div class="function" onclick="window.location.href='../admin/mj_attendanceTracker.php'">
            <div class="iconContainer">
                <div class="icon">
                    <i class="fa-solid fa-clipboard-user"></i>
                </div>
            </div>
            <div class="functionTitle">
                <p>Attendance Tracker</p>
            </div>
        </div>

        <!-- Advance Leave Management -->
        <div class="function" onclick="window.location.href='../admin/mj_leaveManagement.php'">
            <div class="iconContainer">
                <div class="icon">
                    <i class="fa-solid fa-person-walking-arrow-right"></i>
                </div>
            </div>
            <div class="functionTitle">
                <p>Advance Leave Management</p>
            </div>
        </div>

        <!-- Annoucement -->
        <div class="function">
            <div class="iconContainer">
                <div class="icon">
                    <i class="fa-solid fa-bullhorn"></i>
                </div>
            </div>
            <div class="functionTitle">
                <p>Annoucement</p>
            </div>
        </div>
    </div>



</body>

</html>