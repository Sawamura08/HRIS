<?php

include('connection.php'); // to connect to database

// get the idNumber from the login.php
session_start();
$idNumber = $_SESSION['idNumber'];

$sql = "SELECT CONCAT(firstName, ' ', lastName) AS name, departmentName, position, picture FROM `hr_employeeinfo` INNER JOIN hr_department ON hr_employeeinfo.departmentId = hr_department.departmentId WHERE idNumber = '" . $idNumber . "'";
$query = $connectionString->query($sql);
if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $name = $row['name'];
        $departmentName = $row['departmentName'];
        $position = $row['position'];
        $picture = $row['picture'];
    }
}


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
    <link rel="stylesheet" href="../login/css/mainPage.css">
    <link rel="stylesheet" href="../login/css/navigation.css">
    <link rel="shortcut icon" href="RGEM.png" type="image/x-icon">
    <script src="../login/js/navigation.js" defer></script>
    <title>Main Page</title>
</head>

<body>
    <?php
    ob_start();
    ?>


    <?php

    $link = "http://localhost/capstone/HRIS/capstone/HRIS/img/";
    if ($picture == "") {
        $picture = "noProfile.jpg";
    }
    $link .= $picture;


    ?>
    <header class="headers">
        <nav class="navbars">
            <a href="#" class="navLogo">RGEM</a>
            <ul class="navMenu">
                <li class="navItem">
                    <a href="./mj_mainPage.php" class="navLink">Home</a>
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
                    <a href="../admin/mj_admin.php" class="navLink">Admin</a>
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

        <!-- User info with picture -->
        <div class="userInfoContainer">
            <div class="photoContainer">
                <img src="<?php echo $link; ?>" alt="" class="photo">
            </div>
            <div class="infoContainer">
                <!-- Print out info data of the user -->
                <h4><?php echo $name ?></h4>
                <p><?php echo $departmentName . " - " . $position; ?></p>
                <p>at RGEM Building Maintenance Services</h6>
            </div>
        </div>
        <!-- End of UserInfo -->

        <div class="flexContainers">

            <div class="left">
                <?php

                $sql = "SELECT * FROM  hr_annoucement WHERE scheduledDate >= CURDATE();";
                $query = $connectionString->query($sql);

                ?>

                <!-- Annoucement -->
                <div class="announcementContainer">
                    <div class="thead"><span><i class="fa-sharp fa-solid fa-bullhorn" style="margin-right: 1rem;"></i></span>Annoucement</div>

                    <?php

                    if ($query->num_rows > 0) {


                    ?>
                        <table class="table caption-top table-hover table-secondary">
                            <tbody>
                                <?php
                                while ($row = $query->fetch_assoc()) {


                                ?>
                                    <tr>
                                        <td class="table-info"><?php echo $row['scheduledDate'] ?></td>
                                        <td class="table-info"><?php echo $row['type'] == 0 ? "Meeting" : "General" ?></td>
                                        <td class="table-info">
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" data-id='<?php echo $row["announcementId"]; ?>'><i class="fa-solid fa-eye"></i></button>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }

                            ?>
                            </tbody>
                        </table>

                        <!-- Bootstrap Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog announce">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header" style="display:flex; justify-content:space-evenly;">
                                        <h4 class="modal-title">Annoucement Informations</h4>
                                        <button type="button" class="close" data-dismiss="modal" style="font-size: 4rem;">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                    </div>
                                </div>
                            </div>
                        </div>


                </div>
                <!-- End of Annoucement -->

                <!-- Attendance -->

                <?php
                // will get the shiftId of the employee
                $sql2 = "SELECT shiftId FROM hr_employeeinfo WHERE idNumber = " . $idNumber . "";
                $query2 = $connectionString->query(($sql2));
                if ($query2 && $query2->num_rows == 1) {
                    while ($row = $query2->fetch_assoc()) {
                        $shiftId = $row['shiftId'];
                    }
                } else {
                    echo "Error!";
                }
                //  checkk if the button is click
                if (isset($_POST['timeIn'])) {
                    // get the value of last timeIn and timeOut of the user

                    $sqlCheck = "SELECT timeIn, timeOut FROM hr_dtr WHERE idNumber = $idNumber ORDER BY timeIn DESC LIMIT 1";
                    $queryCheck = $connectionString->query($sqlCheck);

                    if ($queryCheck && $queryCheck->num_rows > 0) {
                        $result = $queryCheck->fetch_assoc();
                        $timeIn = $result['timeIn'];
                        $timeOut = $result['timeOut'];

                        // a condition if the user has a time out in his/her latest data
                        if ($timeIn && !$timeOut) {
                            echo '
                
                                <div id="myModals" class="modals">
                                    <div class="modal-contents">
                                        <p class="text">Error No Time Out!</p>
                                        <div class="buttonContainer">
                                            <button id="close">Okay</button>
                                        </div>
                                    </div>
                                </div>
                            
                            ';
                        } else {
                            // this query is for checking if the employee has a time in for today
                            $sql = "SELECT * FROM hr_dtr WHERE idNumber = " . $idNumber . " AND dateToday = CURRENT_DATE()";
                            $query = $connectionString->query($sql);
                            if ($query && $query->num_rows == 0) {

                                // a query to insert data to hr_dtr
                                $sql = "INSERT INTO hr_dtr (dateToday,timeIn,idNumber) VALUES (CURRENT_DATE(),NOW(), " . $idNumber . ")";

                                $query = $connectionString->query($sql);
                                if ($query) {

                                    // get the timeIn of employee to hr_dtr
                                    $sqlTimeIn = "SELECT timeIn FROM hr_dtr WHERE idNumber = " . $idNumber . " AND  dateToday = CURRENT_DATE()";
                                    $queryTimeIn = $connectionString->query($sqlTimeIn);

                                    if ($queryTimeIn && $queryTimeIn->num_rows > 0) {
                                        while ($results = $queryTimeIn->fetch_assoc()) {
                                            $timeIn = $results['timeIn'];
                                            $timeStamp = strtotime($timeIn);
                                            $hsi = date("H:i:s", $timeStamp);
                                        }

                                        // get the time shift of the employee
                                        $shiftIn = "";
                                        $sqlLate = "SELECT * FROM hr_shiftsched WHERE shiftId = " . $shiftId . "";
                                        $lateQuery = $connectionString->query($sqlLate);
                                        if ($lateQuery && $lateQuery->num_rows > 0) {
                                            while ($result = $lateQuery->fetch_assoc()) {
                                                $shiftIn = $result['shiftIn'];
                                                $shiftIn = strtotime($shiftIn);
                                            }
                                            // a condition if the employee is late or not
                                            if ($timeStamp > $shiftIn) {
                                                $sqlUpdateLate = "UPDATE hr_dtr SET late = 1 WHERE idNumber = " . $idNumber . " AND dateToday = CURRENT_DATE()";
                                                $queryUpdateLate = $connectionString->query($sqlUpdateLate);
                                                if ($queryUpdateLate && $queryUpdateLate > 0) {
                                                    header("location: http://localhost/capstone/HRIS/capstone/HRIS/attendance/mj_attendance.php");
                                                } else {
                                                    echo "Error";
                                                }
                                            } else {
                                                echo "You're on time";
                                            }
                                        }
                                    }
                                } else {
                                    echo 'Error!';
                                }
                            } else {
                                echo '
                
                                <div id="myModals" class="modals">
                                    <div class="modal-contents">
                                        <p class="text">You already have a Time In</p>
                                        <div class="buttonContainer">
                                            <button id="close">Okay</button>
                                        </div>
                                    </div>
                                </div>
                            
                            ';
                            }
                        }
                    }
                }


                if (isset($_POST['timeOut'])) {
                    $sql = "SELECT timeIn FROM hr_dtr WHERE idNumber = " . $idNumber . " AND dateToday = CURRENT_DATE()";
                    $query = $connectionString->query($sql);

                    if ($query && $query->num_rows > 0) {
                        $sql = "SELECT timeOut FROM hr_dtr WHERE idNumber = $idNumber AND dateToday = CURRENT_DATE() AND timeOut IS NOT NULL";
                        $query = $connectionString->query($sql);

                        if ($query && $query->num_rows > 0) {
                            $row = $query->fetch_assoc();
                            $timeOut = $row['timeOut'];

                            echo '
                        <div id="myModals" class="modals">
                            <div class="modal-contents">
                                <p class="text">You already have a Time Out</p>
                                <div class="buttonContainer">
                                    <button id="close" class = "okay">Okay</button>
                                </div>
                            </div>
                        </div>
                    ';
                        } else {
                            echo '
                        <div id="myModals" class="modals">
                            <div class="modal-contents">
                                <p class="text sure">Are you sure you want to TIME OUT?</p>
                                <div class="buttonContainer flexContainer">
                                <button class="attendanceButton" id = "go"  style="width: 40%;">Yes</button>
                                    <button id="close" style="width: 40%;">No</button>
                                    
                                </div>
                            </div>
                        </div>
                    ';
                        }
                    } else {
                        echo '
                <div id="myModals" class="modals">
                    <div class="modal-contents">
                        <p class="text">You must have TIME IN first!</p>
                        <div class="buttonContainer">
                            <button id="close" class = "okay">Okay</button>
                        </div>
                    </div>
                </div>
            ';
                    }
                }


                ?>
                <div class="attendanceContainer">
                    <div class="thead"><span><i class="fa-sharp fa-solid fa-clipboard-user" style="margin-right: 1rem;"></i></span>Attendance
                    </div>
                    <div id="DigitalCLOCK" class="time" onload="showTime()"></div>
                    <div class="attendanceButtonContainer">
                        <form action="" method="post">
                            <button class="attendanceButton" name="timeIn">Time In</button>
                        </form>
                        <form action="" method="post">
                            <button class="attendanceButton" name="timeOut">Time Out</button>
                        </form>
                    </div>
                </div>

                <!-- End of Attendance -->
            </div>


            <div class="right">
                <!-- Calender -->
                <div class="wrapper">
                    <div class="thead"><span><i class="fa-sharp fa-solid fa-calendar-days" style="margin-right: 1rem;"></i></span>Calendar</div>
                    <div class="container-calendar">
                        <h3 id="monthAndYear"></h3>
                        <div class="button-container-calendar">
                            <button id="previous" onclick="previous()">&#8249;</button>
                            <button id="next" onclick="next()">&#8250;</button>
                        </div>
                        <table class="table-calendar" id="calendar" data-lang="en">
                            <thead id="thead-month"></thead>
                            <tbody id="calendar-body"></tbody>
                        </table>
                        <div class="footer-container-calendar">
                            <!-- <label for="month">Jump To: </label> -->
                            <select id="month" onchange="jump()" style="display: none;">
                                <option value=0>Jan</option>
                                <option value=1>Feb</option>
                                <option value=2>Mar</option>
                                <option value=3>Apr</option>
                                <option value=4>May</option>
                                <option value=5>Jun</option>
                                <option value=6>Jul</option>
                                <option value=7>Aug</option>
                                <option value=8>Sep</option>
                                <option value=9>Oct</option>
                                <option value=10>Nov</option>
                                <option value=11>Dec</option>
                            </select>
                            <select id="year" onchange="jump()" style="display: none;"></select>
                        </div>
                    </div>

                    <!-- End of calendar -->
                </div>
            </div>

        </div>

    </div>
</body>

</html>

<!-- modal for attendance -->
<script type="text/javascript">
    $(document).ready(function() {
        $(' #myModal').on('show.bs.modal', function(e) {
            var announcementId = $(e.relatedTarget).data('id');
            $.ajax({
                type: 'post',
                url: 'select.php',
                data: {
                    announcementId: announcementId
                },
                success: function(response) {
                    $('.modal-body').html(response);
                }
            });
        });
    });
</script>

<!-- modal for time out -->
<script>
    $("#go").click(function() {
        var idNumber = <?php echo "'$idNumber'"; ?>; // Replace with actual idNumber variable
        $.ajax({
            url: "timeOut.php",
            type: "POST",
            data: {
                idNumber: idNumber
            },
            success: function(response) {
                // Redirect to the welcome page with the idNumber as a query parameter
                window.location.href =
                    "http://localhost/capstone/HRIS/capstone/HRIS/attendance/mj_attendance.php";
            },
            error: function(xhr, status, error) {
                alert("Error: " + error);
            }
        });
    });
</script>


<!-- script for normal modals -->
<script>
    // Get the modal
    var modal = document.getElementById("myModals");

    // modal variable
    let okay = document.getElementById("close");

    okay.onclick = function() {
        modal.style.display = "none";
    }
</script>

<!-- script for calendar -->
<script>
    function generate_year_range(start, end) {
        var years = "";
        for (var year = start; year <= end; year++) {
            years += "<option value='" + year + "'>" + year + "</option>";
        }
        return years;
    }

    today = new Date();
    currentMonth = today.getMonth();
    currentYear = today.getFullYear();
    selectYear = document.getElementById("year");
    selectMonth = document.getElementById("month");


    createYear = generate_year_range(1970, 2050);
    /** or
     * createYear = generate_year_range( 1970, currentYear );
     */

    document.getElementById("year").innerHTML = createYear;

    var calendar = document.getElementById("calendar");
    var lang = calendar.getAttribute('data-lang');

    var months = "";
    var days = "";

    var monthDefault = ["January", "February", "March", "April", "May", "June", "July", "August", "September",
        "October", "November", "December"
    ];

    var dayDefault = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

    if (lang == "en") {
        months = monthDefault;
        days = dayDefault;
    } else if (lang == "id") {
        months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
            "November", "Desember"
        ];
        days = ["Ming", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];
    } else if (lang == "fr") {
        months = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre",
            "Novembre", "Décembre"
        ];
        days = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];
    } else {
        months = monthDefault;
        days = dayDefault;
    }


    var $dataHead = "<tr>";
    for (dhead in days) {
        $dataHead += "<th data-days='" + days[dhead] + "'>" + days[dhead] + "</th>";
    }
    $dataHead += "</tr>";

    //alert($dataHead);
    document.getElementById("thead-month").innerHTML = $dataHead;


    monthAndYear = document.getElementById("monthAndYear");
    showCalendar(currentMonth, currentYear);



    function next() {
        currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
        currentMonth = (currentMonth + 1) % 12;
        showCalendar(currentMonth, currentYear);
    }

    function previous() {
        currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
        currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
        showCalendar(currentMonth, currentYear);
    }

    function jump() {
        currentYear = parseInt(selectYear.value);
        currentMonth = parseInt(selectMonth.value);
        showCalendar(currentMonth, currentYear);
    }

    function showCalendar(month, year) {

        var firstDay = (new Date(year, month)).getDay();

        tbl = document.getElementById("calendar-body");


        tbl.innerHTML = "";


        monthAndYear.innerHTML = months[month] + " " + year;
        selectYear.value = year;
        selectMonth.value = month;

        // creating all cells
        var date = 1;
        for (var i = 0; i < 6; i++) {

            var row = document.createElement("tr");


            for (var j = 0; j < 7; j++) {
                if (i === 0 && j < firstDay) {
                    cell = document.createElement("td");
                    cellText = document.createTextNode("");
                    cell.appendChild(cellText);
                    row.appendChild(cell);
                } else if (date > daysInMonth(month, year)) {
                    break;
                } else {
                    cell = document.createElement("td");
                    cell.setAttribute("data-date", date);
                    cell.setAttribute("data-month", month + 1);
                    cell.setAttribute("data-year", year);
                    cell.setAttribute("data-month_name", months[month]);
                    cell.className = "date-picker";
                    cell.innerHTML = "<span>" + date + "</span>";

                    if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                        cell.className = "date-picker selected";
                    }
                    row.appendChild(cell);
                    date++;
                }


            }

            tbl.appendChild(row);
        }

    }

    function daysInMonth(iMonth, iYear) {
        return 32 - new Date(iYear, iMonth, 32).getDate();
    }
</script>

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