<?php

include("../connection.php");
?>

<?php

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../login/css/navigation.css">
    <script src="../login/js/navigation.js" defer></script>
    <link rel="stylesheet" href="attendance.css">
    <link rel="shortcut icon" href="../login/RGEM.png" type="image/x-icon">
    <title>Attendance</title>
</head>

<body>
    <header class="headers" style="width: 100%;">
        <nav class=" navbars">
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
                    <a href="../admin/mj_admin.php" class="navLink">Admin</a>
                </li>
                <li class="navItem">
                    <a href="#" class="navLink">Log Out</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>

    <!-- Attendance title -->
    <div class="attendanceHeaderContainer">
        <p class="title">Attendance</p>
    </div>
    <!-- Attendance title Container  -->

    <div class="containers">

        <!-- Attendance input -->

        <div class="attendanceInputContainer">
            <div class="dateContainer">

                <!-- A php function that will generate the current date and time -->
                <?php $currentDayAndDate = date('l, F j, Y'); ?>
                <p class="curdate"><?php echo $currentDayAndDate; ?></p>
                <div id="DigitalCLOCK" class="time" onload="showTime()"></div>
            </div>
            <?php


            /* This block of codes will query the time shift of the employee */
            $sql = "SELECT shiftId FROM hr_employeeinfo WHERE idNumber = " . $idNumber . "";
            $query = $connectionString->query($sql);
            if ($query && $query->num_rows > 0) {
                $row = $query->fetch_assoc();
                $shiftId = $row['shiftId'];

                $sql2 = "SELECT * FROM hr_shiftsched WHERE shiftId = " . $shiftId . "";
                $query2 = $connectionString->query($sql2);
                if ($query2 && $query2->num_rows > 0) {
                    $result = $query2->fetch_assoc();
                    $timeStampIn = $result['shiftIn'];
                    $timeStamp = $result['shiftOut'];
                    $shiftIn = date('h:i:A', strtotime($timeStampIn));
                    $shiftOut = date('h:i:A', strtotime($timeStamp));
                }
            }

            ?>
            <div class="attendanceData">
                <div class="shiftSched">
                    <h1>Shift Schedule</h1>
                    <p><?php echo $shiftIn . " - " . $shiftOut ?></p>
                </div>

                <div class="timeInOut">
                    <button disabled="disabled" class="go">Time In</button>
                    <button disabled="disabled" class="go">Time Out</button>
                </div>
                <div class="timeInput">
                    <?php

                    $sql = "SELECT * FROM hr_dtr WHERE idNumber = " . $idNumber . " AND dateToday = CURRENT_DATE()";
                    $query = $connectionString->query($sql);
                    $timeIn = NULL;
                    $timeOut = NULL;

                    if ($query && $query->num_rows > 0) {
                        $result = $query->fetch_assoc();
                        // put all the value to respected variables
                        $timeStampIn = $result['timeIn'];
                        $timeStampOut = $result['timeOut'];

                        // convert the timestamp value to 12hr format
                        $timeIn = $timeStampIn == NULL ? NULL : date('h:i:s A', strtotime($timeStampIn));
                        $timeOut = $timeStampOut == NULL ? NULL : date('h:i:s A', strtotime($timeStampOut));
                    }

                    ?>
                    <p class="time"><?php echo $timeIn == NULL ? "NO TIME IN" : $timeIn; ?></p>
                    <p class="time"><?php echo $timeOut == NULL ? "NO TIME OUT" : $timeOut; ?></p>

                </div>
            </div>
        </div>

        <!-- End of Attendance input -->

        <!-- Attendance Log -->
        <div class="logContainer">
            <div class="attendanceLogContainer">
                <p>Attendance Log</p>
            </div>
            <?php

            // number of days to limit the query
            $numberOfDays = 7;

            // Calculate the date 1 week ago from today
            $startDate = date('Y-m-d', strtotime("-$numberOfDays days"));

            $sql = "SELECT * FROM hr_dtr WHERE idNumber = $idNumber AND timeOut IS NOT NULL AND dateToday >= DATE_SUB(CURDATE(), INTERVAL $numberOfDays DAY) ORDER BY dateToday DESC";
            $query = $connectionString->query($sql);
            if ($query && $query->num_rows > 0) {

                while ($row = $query->fetch_assoc()) {

                    $dateToday = $row['dateToday'];
                    $date = date('F j', strtotime($dateToday)); // this code is get the month and date only === May 14
                    $day = $row['dateToday'];
                    $exactDay = date('l', strtotime($day)); // get the excat day of the date
                    $timeStampIn = $row['timeIn'];
                    $timeStampOut = $row['timeOut'];
                    $timeIn = date('h:i:s A', strtotime($timeStampIn));
                    $timeOut = date('h:i:s A', strtotime($timeStampOut));

                    // calculate the work duration
                    $timeInDateTime = strtotime($timeIn);
                    $timeOutDateTime = strtotime($timeOut);
                    $elapsedTime = $timeOutDateTime - $timeInDateTime;
                    $hours = floor($elapsedTime / 3600);
                    $minutes = floor(($elapsedTime % 3600) / 60);
                    $seconds = $elapsedTime % 60;
                    $workDurations = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
                    // end of calculate the work duration


                    // Convert workDurations in to word 1hr 10mins 38sec
                    $durationInSeconds = strtotime($workDurations) - strtotime('00:00:00');

                    $hours = floor($durationInSeconds / 3600);
                    $minutes = gmdate('i', $durationInSeconds);
                    $seconds = gmdate('s', $durationInSeconds);

                    $durationString = '';
                    if ($hours > 0) {
                        $durationString .= $hours . 'hr ';
                    }
                    if ($minutes > 0) {
                        $durationString .= $minutes . 'mins ';
                    }
                    $work = "";
                    $work .= $hours . 'hr ';
                    $work .= $minutes . "mins ";

                    // end of Convert workDurations in to word 1hr 10mins 38sec
            ?>
                    <div class="log">
                        <div class="dayAndDate">
                            <span><?php echo $date; ?></span>
                            <span><?php echo $exactDay ?></span>
                        </div>
                        <div class="duration">
                            <span><?php echo $work; ?></span>
                            <span><?php echo $timeIn . " - " . $timeOut; ?></span>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <!-- end of Attendance log -->
    </div>
</body>

</html>
<!-- script for real time clock -->
<script>
    function showTime() {
        var date = new Date();
        var h = date.getHours();
        var m = date.getMinutes();
        var s = date.getSeconds();
        var session = "AM";

        if (h == 0) {
            h = 12;
        }

        if (h > 12) {
            h = h - 12;
            session = "PM";
        }

        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;

        var time = h + ":" + m + ":" + s + " " + session;
        document.getElementById("DigitalCLOCK").innerText = time;
        document.getElementById("DigitalCLOCK").textContent = time;

        setTimeout(showTime, 1000);

    }

    showTime();
</script>