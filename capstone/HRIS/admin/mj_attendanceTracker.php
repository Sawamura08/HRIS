<?php
include('../connection.php');

date_default_timezone_set('Asia/Manila');
session_start();
$idNumber = $_SESSION['idNumber'];
ob_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/scroller/2.0.5/js/dataTables.scroller.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.5/css/scroller.dataTables.min.css">
    <link rel="stylesheet" href="../login/css/navigation.css">
    <script src="../login/js/navigation.js" defer></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.1.2/css/searchPanes.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.6.2/css/select.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="attendanceTracker.css">
    <link rel="shortcut icon" href="RGEM.png" type="image/x-icon">
    <title>Attendance Tracker</title>
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

    <div class="containers">

        <div class="adminHeaderContainer">
            <span class="back" onclick="window.location.href='mj_adminPanel.php'"><i class="fa-solid fa-backward"></i></span>
            <span class="title">Attendance Tracker</span>
        </div>
        <div class="filter">
            <div class="searchContainer">
                <form action="" method="post" id="searched"></form>
                <div class="search">
                    <input type="text" name="search" id="" form="searched" placeholder="Search..." value="<?php if (isset($_POST['search'])) {
                                                                                                                echo $_POST['search'];
                                                                                                            } ?>">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <button class="refresh" onclick="window.location.href ='mj_attendanceTracker.php'"><i class="fa-solid fa-arrows-rotate"></i></button>
            </div>
            <div class="filterContainer">
                <div class="dropDown">
                    <div class="filterLogo">
                        <i class="fa-sharp fa-solid fa-filter"></i>
                        <span>Filter</span>
                    </div>
                    <form action="" method="post" id="dropDown"></form>
                    <select name="departmentName" id="select" form="dropDown">
                        <option value="" disabled hidden selected>
                            <?php

                            if (isset($_POST['departmentName'])) {
                                $departmentName = $_POST['departmentName'];
                                if ($departmentName == 1) {
                                    echo "Admin";
                                } else if ($departmentName == 2) {
                                    echo "Production";
                                } else {
                                    echo "Maintenance";
                                }
                            } else {
                                echo "Department Name";
                            }

                            ?>
                        </option>
                        <option value="1">Admin</option>
                        <option value="2">Production</option>
                        <option value="3">Maintenance</option>
                    </select>
                    <input type="submit" value="Apply" name="Apply" class="apply" form="dropDown">
                </div>
            </div>


            <?php

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $sql = "SELECT firstName, lastName,middleName,suffixName, picture,idNumber, d.departmentName,s.shiftIn,s.shiftOut
                        FROM hr_employeeinfo AS e
                        LEFT JOIN hr_department AS d ON e.departmentId = d.departmentId
                        RIGHT JOIN hr_shiftsched AS s ON e.shiftId = s.shiftId WHERE STATUS = 1";

                $searchKeys = isset($_POST['search']) ? $_POST['search'] : "";

                $searchKeys = explode(" ", $searchKeys);
                foreach ($searchKeys as $key) {
                    $addSql = " AND (idNumber LIKE '%" . $key . "%' OR firstName LIKE '%" . $key . "%' OR lastName LIKE '%" . $key . "%' OR middleName LIKE '%" . $key . "%' OR suffixName LIKE '%" . $key . "%')";

                    $sql .= $addSql;
                }

                $departmentName = isset($_POST['departmentName']) ? $_POST['departmentName'] : "";

                $dropDown = " OR e.departmentId LIKE '" . $departmentName . "'";

                $sql .= $dropDown;

                $query = $connectionString->query($sql);

                // this condition will check if there is affected values and get it
                if ($query && $query->num_rows > 0) {
                    echo '   <!-- tables -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Profile</th>
                                        <th>Department</th>
                                        <th>Status</th>
                                        <img src="" alt="">
                                    </tr>
                                </thead>
                                <tbody>';
                    while ($row = $query->fetch_assoc()) {
                        $idNumber = $row['idNumber'];
                        $firstName = $row['firstName'];
                        $lastName = $row['lastName'];
                        $middleName = $row['middleName'];
                        $suffixName = $row['suffixName'];
                        $departmentName = $row['departmentName'];
                        $profile = $row['picture'] ? $row['picture'] : 'noProfile.jpg';
                        $shiftIn = $row['shiftIn'];
                        $shiftOut = $row['shiftOut'];
                        $link = "../img/";
                        $link .= $profile;
                        $name = $lastName . ", " . $firstName . " " . $middleName . " " . $suffixName;


                        $sql2 = "SELECT * FROM hr_dtr WHERE idNumber = $idNumber AND dateToday = CURDATE()";
                        $query2 = $connectionString->query($sql2);
                        $timeIn = "";
                        $timeOut = "";
                        $status = "";
                        if ($query2 && $query2->num_rows > 0) {
                            while ($data = $query2->fetch_assoc()) {
                                $timeIn = $data['timeIn'];
                                $timeOut = $data['timeOut'];
                                $time = strtotime($timeIn);
                                $shift = strtotime($shiftIn);

                                // will check the user is late in hr format
                                if ($time > $shift) {
                                    if ($timeOut) {
                                        $status = "OUT";
                                        $time = date('H:i:s', strtotime($timeOut));
                                    } else {
                                        $status = "Late";
                                        $time = date('H:i:s', strtotime($timeIn));
                                    }
                                    // will check the user is late in minutes format
                                } else if (date('H:i', $time) > date('H:i', $shift)) {
                                    if ($timeOut) {
                                        $status = "OUT";
                                        $time = date('H:i:s', strtotime($timeOut));
                                    } else {
                                        $status = "Late";
                                        $time = date('H:i:s', strtotime($timeIn));
                                    }
                                } else {
                                    $status = "On Time";
                                    $time = date('H:i:s', strtotime($timeIn));
                                }
                            }
                        } else {

                            $sqlLeave = "SELECT COUNT(*) AS leaveCount FROM hr_leavehistory WHERE idNumber = $idNumber AND CURDATE() BETWEEN startDate AND endDate";
                            $query = $connectionString->$query($sqlLeave);

                            if ($query && $query->num_rows > 0) {
                                $row = $query->fetch_assoc();
                                $leaveCount = $row['leaveCount'];
                                if ($leaveCount > 0) {
                                    $status = "Leave";
                                    $time = "";
                                } else {
                                    $time = "";
                                    $status = "Absent";
                                }
                            }
                        }




                        echo "<tr> 
                                <td  class='align-middle'>$name</td>
                                <td><img src='$link' alt='' class='profile'></td>
                                <td  class='align-middle'>$departmentName</td>
                                <td  class='align-middle'><span class = 'status'>$status </span><p style='margin-top:0.5rem;'>$time</p></td>
                            </tr>";
                    }
                } else {
                    echo '<div class="noData"><img src="../admin//noData.jpg" alt=""></div>';
                }
            } else {
                //  query for the table
                $sql = "SELECT firstName, lastName,middleName,suffixName, picture,idNumber, d.departmentName,s.shiftIn,s.shiftOut
                    FROM hr_employeeinfo AS e
                    LEFT JOIN hr_department AS d ON e.departmentId = d.departmentId
                    RIGHT JOIN hr_shiftsched AS s ON e.shiftId = s.shiftId WHERE STATUS = 1";
                $query = $connectionString->query($sql);
                // this condition will check if there is affected values and get it
                if ($query && $query->num_rows > 0) {
                    echo '   <!-- tables -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Employee Name</th>
                                <th>Profile</th>
                                <th>Department</th>
                                <th>Status</th>
                                <img src="" alt="">
                            </tr>
                        </thead>
                        <tbody>';
                    while ($row = $query->fetch_assoc()) {
                        $idNumber = $row['idNumber'];
                        $firstName = $row['firstName'];
                        $lastName = $row['lastName'];
                        $middleName = $row['middleName'];
                        $suffixName = $row['suffixName'];
                        $departmentName = $row['departmentName'];
                        $profile = $row['picture'] ? $row['picture'] : 'noProfile.jpg';
                        $shiftIn = $row['shiftIn'];
                        $shiftOut = $row['shiftOut'];
                        $link = "../img/";
                        $link .= $profile;
                        $name = $lastName . ", " . $firstName . " " . $middleName . " " . $suffixName;


                        $sql2 = "SELECT * FROM hr_dtr WHERE idNumber = $idNumber AND dateToday = CURDATE()";
                        $query2 = $connectionString->query($sql2);
                        $timeIn = "";
                        $timeOut = "";
                        $status = "";
                        if ($query2 && $query2->num_rows > 0) {
                            while ($data = $query2->fetch_assoc()) {
                                $timeIn = $data['timeIn'];
                                $timeOut = $data['timeOut'];
                                $time = strtotime($timeIn);
                                $shift = strtotime($shiftIn);

                                // will check the user is late in hr format
                                if ($time > $shift) {
                                    if ($timeOut) {
                                        $status = "OUT";
                                        $time = date('H:i:s', strtotime($timeOut));
                                    } else {
                                        $status = "Late";
                                        $time = date('H:i:s', strtotime($timeIn));
                                    }
                                    // will check the user is late in minutes format
                                } else if (date('H:i', $time) > date('H:i', $shift)) {
                                    if ($timeOut) {
                                        $status = "OUT";
                                        $time = date('H:i:s', strtotime($timeOut));
                                    } else {
                                        $status = "Late";
                                        $time = date('H:i:s', strtotime($timeIn));
                                    }
                                } else {
                                    $status = "On Time";
                                    $time = date('H:i:s', strtotime($timeIn));
                                }
                            }
                        } else {

                            $sqlLeave = "SELECT COUNT(*) AS leaveCount FROM hr_leavehistory WHERE idNumber = $idNumber AND CURDATE() BETWEEN startDate AND endDate";
                            $queryLeave = $connectionString->query($sqlLeave);
                            if ($queryLeave && $queryLeave->num_rows > 0) {
                                $row = $queryLeave->fetch_assoc();
                                $leaveCount = $row['leaveCount'];
                                if ($leaveCount > 0) {
                                    $status = "Leave";
                                    $time = "";
                                } else {
                                    $time = "";
                                    $status = "Absent";
                                }
                            }
                        }




                        echo "<tr> 
                                <td  class='align-middle'>$name</td>
                                <td><img src='$link' alt='' class='profile'></td>
                                <td  class='align-middle'>$departmentName</td>
                                <td  class='align-middle'><span class = 'status'>$status </span><p style='margin-top:0.5rem;'>$time</p></td>
                            </tr>";
                    }
                }
            }

            ?>
            </tbody>
            </table>

        </div>




</body>

</html>

<!-- change the color of the background of the font based on the status of leave request -->
<script>
    var leaves = document.getElementsByClassName("status");

    for (var i = 0; i < leaves.length; i++) {
        var leaveStatus = leaves[i];
        var status = leaveStatus.innerHTML.trim();

        if (status == "Late") {
            leaveStatus.style.backgroundColor = '#f4a261';
        } else if (status == "On Time") {
            leaveStatus.style.backgroundColor = '#80ed99';
        } else if ($status == "Leave") {
            leaveStatus.style.backgroundColor = '#fb8500';
        } else if (status == "Absent") {
            leaveStatus.style.backgroundColor = '#e63946';
        } else {
            leaveStatus.style.backgroundColor = '#8d99ae';
        }
    }
</script>