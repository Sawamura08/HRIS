<?php

include('../connection.php'); // to connect to database
session_start();
$idNumbers = $_SESSION['idNumber'];

$idNumber = $_GET['idNumber'];
$dateRequest = $_GET['dateRequest'];
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/scroller/2.0.5/js/dataTables.scroller.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/scroller/2.0.5/css/scroller.dataTables.min.css">
    <link rel="stylesheet" href="../login/css/navigation.css">
    <script src="../login/js/navigation.js" defer></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.1.2/css/searchPanes.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.6.2/css/select.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="leaves.css">

    <link rel="shortcut icon" href="RGEM.png" type="image/x-icon">
    <title>Leave Manangement Software</title>
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

    <div class="adminHeaderContainer" style="width:103vw">
        <span class="back" onclick="window.location.href='mj_leaveManagement.php'"><i
                class="fa-solid fa-backward"></i></span>
        <span class="title">Leave Manangement Software</span>
    </div>

    <!-- leave title Container  -->
    <div class="mainContainer">
        <div class="containers leaveForm">
            <div class="leaveRequest">
                <div class="type">
                    <div class="leaveType">
                        <?php


                        $sql = "SELECT * FROM hr_leavehistory WHERE idNumber = $idNumber AND status = 0 AND dateRequest = '" . $dateRequest . "'";
                        $query = $connectionString->query($sql);

                        if ($query && $query->num_rows > 0) {
                            $row = $query->fetch_assoc();
                            $startDate = $row['startDate'];
                            $endDate = $row['endDate'];
                            $purpose = $row['purpose'];
                            $leaveType = $row['leaveType'] == 0 ? "Sick Leave" : "Vacation Leave";
                            $requestType = $row['requestType'] == 0 ? "Whole Day" : "Half Day";
                        } else {
                            $startDate = "";
                            $endDate = "";
                            $purpose = "";
                            $leaveType = "";
                            $requestType = "";
                        }

                        if (isset($_POST['request'])) {
                            if (isset($_POST['approve'])) {
                                $request = $_POST['approve'];
                            } else {
                                $request = $_POST['reject'];
                            }

                            $sqlLeave = "UPDATE hr_leavehistory SET status = $request WHERE status = 0 AND idNumber = $idNumber AND dateRequest = '" . $dateRequest . "'";

                            $queryLeave = $connectionString->query($sqlLeave);

                            if ($queryLeave) {
                                $sqlCredit = "UPDATE hr_leavecredit SET  leaveCount = leaveCount - 1 WHERE idNumber = $idNumber";
                                $queryCredit = $connectionString->query($sqlCredit);

                                if ($queryCredit) {
                                    header("Location: mj_leaveManagement.php");
                                }
                            }
                        }

                        ?>


                        <input type="hidden" name="number" value="<?php echo $idNumber; ?>">
                        <label for="leaveType">Leave Type</label>
                        <select name="leaveType" id="" disabled>
                            <option selected><?php echo $leaveType ?></option>
                        </select>
                    </div>
                    <div class="leaveType">
                        <label for="requesType">Request Type</label>
                        <select name="requestType" id="" disabled>
                            <option selected><?php echo $requestType ?></option>
                        </select>
                    </div>
                </div>
                <div class="date">
                    <div class="dateDuration">
                        <label for="startDate">Start Date</label>
                        <input type="date" name="leaveStart" id="leaveType" class="selectType" placeholder="Start Date"
                            disabled value="<?php echo $startDate ?>">
                    </div>
                    <div class="dateDuration">
                        <label for="endDate">End Date</label>
                        <input type="date" name="leaveEnd" id="leaveType" class="selectType" disabled
                            value="<?php echo $endDate ?>">
                    </div>
                </div>
                <div class="description">
                    <label for="reason">Description</label>
                    <textarea name="reason" id="" cols="30" rows="5" class="textarea"
                        placeholder="<?php echo $purpose ?>" disabled></textarea>
                </div>
                <div class="submitButton">
                    <form action="" id="request" method="POST">
                        <button class="submit" type="submit" form='request' name='approve' value="1">Approve
                        </button>
                        <button class="submit" type="submit" form='request' name='approve' value="2">Reject
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- leave history Container -->
        <div class="containers">


            <div class="leaveInputContainer">
                <div class="leaveContainer">
                    <?php

                    $sql = "SELECT leaveCount FROM `hr_leavecredit` WHERE idNumber = $idNumber";
                    $query = $connectionString->query($sql);
                    if ($query && $query->num_rows > 0) {
                        $row = $query->fetch_assoc();
                        $leaveCount = $row['leaveCount'];
                    }
                    ?>
                    <h3><?php echo $leaveCount; ?></h3>
                    <h5>leaves left</h5>
                </div>

                <div class="requestContainer">
                    <a href="#">Requested Leave</a>


                    <?php

                    // check if the select form has a value
                    $filter = isset($_POST['status']) ? $_POST['status'] : "";

                    // check if the button is click
                    if (isset($_POST['form'])) {

                        // main query
                        $sql = "SELECT * FROM hr_leaveHistory WHERE idNumber = " . $idNumber . " AND ";

                        // concatinate it to main query
                        if ($filter == 1) {
                            $sql .= "status = 1";
                        } else if ($filter == 2) {
                            $sql .= "status = 2";
                        } else {
                            $sql = "SELECT * FROM hr_leaveHistory WHERE idNumber = " . $idNumber . "";
                        }
                    } else {
                        $sql = "SELECT * FROM hr_leaveHistory WHERE idNumber = " . $idNumber . "";
                    }
                    $daysInMonth = 30;
                    $startDate = date('Y-m-d', strtotime("-$daysInMonth days")); // subract the current date to 7 days
                    $sql .= " AND dateRequest >= DATE_SUB(CURDATE(), INTERVAL $daysInMonth DAY)"; // select only the data who has records for the past 7 days;

                    $query = $connectionString->query($sql);
                    ?>
                    <!-- filter leave -->
                    <div class="box">
                        <form action="" method="POST" id="form">
                            <select name="status">

                                <option value="" disabled hidden selected>
                                    <?php
                                    if (isset($_POST['status'])) {
                                        $status = $_POST['status'];
                                        if ($status == 0) {
                                            echo "Pending";
                                        } else if ($status == 1) {
                                            echo "Approved";
                                        } else if ($status == 2) {
                                            echo "Rejected";
                                        } else {
                                            echo "All";
                                        }
                                    } else {
                                        echo "Status";
                                    }

                                    ?>
                                </option>

                                <option value=3>ALL</option>
                                <option value=0>Pending</option>
                                <option value=1>Approved</option>
                                <option value=2>Rejected</option>
                            </select>
                        </form>
                        <input type="submit" value="Filter" name="form" class="filterBtn" form="form">
                        <!-- end of filter leave -->

                    </div>
                    <?php

                    $month = date('M Y');

                    ?>
                    <h4 class="month"><?php echo $month ?></h4>
                    <!-- leave leaveHistory -->
                    <?php

                    if ($query && $query->num_rows > 0) {
                        while ($row = $query->fetch_assoc()) {
                            $leaveType = $row['leaveType'] == 0 ? "Sick Leave" : "Vacation Leave";
                            $requestType = $row['requestType'] == 0 ? "Half Day" : "Whole Day";
                            $dateRequest = $row['dateRequest'];
                            $formattedDate = date("D, M j", strtotime($dateRequest));
                            $leaveStatus = $row['status'];

                    ?>
                    <div class="leaveHistory">
                        <div class="leaveDetailsContainer">
                            <div class="leaveDetails">
                                <h5><?php echo $leaveType ?></h5>
                                <p><?php echo $requestType . " | " . $formattedDate; ?></p>
                            </div>
                            <div class="leaveStatus">
                                <span class="status">

                                    <?php

                                            if ($leaveStatus == 0) {
                                                echo "Pending";
                                            } else if ($leaveStatus == 1) {
                                                echo "Approved";
                                            } else {
                                                echo "Rejected";
                                            }

                                            ?>

                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- end of leave history -->
                    <?php

                        }
                    }

                    ?>
                </div>

            </div>
        </div>


    </div>

</body>

</html>

<script>
var leaves = document.getElementsByClassName("status");

for (var i = 0; i < leaves.length; i++) {
    var leaveStatus = leaves[i];
    var status = leaveStatus.innerHTML.trim();

    if (status == "Pending") {
        leaveStatus.style.backgroundColor = '#f4a261';
    } else if (status == "Approved") {
        leaveStatus.style.backgroundColor = '#80ed99';
    } else {
        leaveStatus.style.backgroundColor = '#e63946';
    }
}
</script>