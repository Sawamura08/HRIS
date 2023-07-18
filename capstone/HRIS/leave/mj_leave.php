<?php

include("../connection.php");
session_start();
$idNumber = $_SESSION['idNumber'];

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
    <link rel="shortcut icon" href="../login/RGEM.png" type="image/x-icon">
    <link rel="stylesheet" href="leave.css">
    <title>Leave Input Software</title>
</head>

<body>
    <header class="headers">
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
    <?php

    ob_start();

    ?>
    <!-- leave title -->
    <div class="leaveHeaderContainer">
        <p class="title">Leave Input Software</p>
    </div>



    <!-- leave title Container  -->
    <div class="mainContainer">
        <div class="containers leaveForm">
            <div class="leaveRequest">
                <div class="type">
                    <div class="leaveType">
                        <form action="" id="request"></form>
                        <input type="hidden" name="number" value="<?php echo $idNumber; ?>" form="request">
                        <label for="leaveType">Leave</label>
                        <select name="leaveType" id="" form="request" required>
                            <option selected disabled hidden>Select</option>
                            <option value="0">Sick Leave</option>
                            <option value="1">Vacation Leave</option>
                        </select>
                    </div>
                    <div class="leaveType">
                        <label for="requesType">Request Type</label>
                        <select name="requestType" id="" form="request" required>
                            <option selected disabled hidden>Select</option>
                            <option value="0">Half Day</option>
                            <option value="1">Whole Day</option>
                        </select>
                    </div>
                </div>
                <div class="date">
                    <div class="dateDuration">
                        <label for="startDate">Start Date</label>
                        <input type="date" name="leaveStart" id="leaveType" class="selectType" form="request" placeholder="Start Date" required>
                    </div>
                    <div class="dateDuration">
                        <label for="endDate">End Date</label>
                        <input type="date" name="leaveEnd" id="leaveType" class="selectType" form="request" required>
                    </div>
                </div>
                <div class="description">
                    <label for="reason">Description</label>
                    <textarea name="reason" id="" cols="30" rows="5" form="request" class="textarea" placeholder="Type description here..." required></textarea>
                </div>
                <div class="submitButton">
                    <input type="submit" form="request" value="Submit" name="request" class="submit">
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
                    <a href="#">Request Leave</a>


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
                    $daysInWeek = 7;
                    $startDate = date('Y-m-d', strtotime("-$daysInWeek days")); // subract the current date to 7 days
                    $sql .= " AND dateRequest >= DATE_SUB(CURDATE(), INTERVAL $daysInWeek DAY)"; // select only the data who has records for the past 7 days;

                    $query = $connectionString->query($sql);
                    ?>
                    <!-- filter leave -->
                    <div class="box">
                        <form action="" method="post" id="form">
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
    <div id="responseContainer"></div>
</body>

</html>

<script>
    $(document).ready(function() {
        // Listen for form submission
        $('#request').submit(function(event) {
            event.preventDefault(); // Prevent default form submission
            var idNumber = <?php echo $idNumber; ?>;
            // Get form data
            var formData = $(this).serialize();

            // Make AJAX request
            $.ajax({
                url: 'mj_leaveAjax.php', // Replace with the URL where you want to submit the form
                type: 'POST', // Change to 'POST' if needed
                data: formData + '&idNumber=' + idNumber,
                success: function(response) {
                    // Handle the server response if needed
                    console.log('Server response:', response);
                    // Optionally, you can update a specific element on the page with the response
                    window.location.href = "mj_leave.php";
                },
                error: function(error) {
                    // Handle any errors that occur during the AJAX request
                    console.error('Error submitting form:', error);
                    // Optionally, you can display an error message or perform other actions
                }
            });
        });
    });
</script>


<!-- change the color of the background of the font based on the status of leave request -->
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