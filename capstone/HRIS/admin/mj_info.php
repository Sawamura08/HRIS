<?php

include('../connection.php'); // to connect to database
session_start();
$idNumbers = $_SESSION['idNumber'];

$idNumber = $_GET['idNumber'];
?>

<?php
ob_start();


/* main query get all info of employee */
$sql = "SELECT * FROM hr_employeeinfo WHERE idNumber = $idNumber";
$query = $connectionString->query($sql);

if ($query && $query->num_rows > 0) {
    $row = $query->fetch_assoc();

    $idNumber = $row['idNumber'];
    $userName = $row['userName'];
    $password = $row['password'];
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $middleName = $row['middleName'];
    $suffixName = $row['suffixName'];
    $birthDate = $row['birthDate'];
    $birthPlace = $row['birthPlace'];
    $civilStatus = $row['civilStatus'];
    $gender = $row['gender'];
    $picture = $row['picture'];
    if ($picture == "") {
        $picture = "noProfile.jpg";
    }
    $presentAddress = $row['presentAddress'];
    $permanentAddress = $row['permanentAddress'];
    $nationality = $row['nationality'];
    $telephone = $row['telephone'];
    $contactNumber = $row['contactNumber'];
    $email = $row['email'];
    $contactPerson = $row['contactPerson'];
    $contactPersonNumber = $row['contactPersonNumber'];
    $hiredDate = $row['hiredDate'];
    $resignDate = $row['resignDate'];
    $departmentId = $row['departmentId'];
    $position = $row['position'];
    $shiftId = $row['shiftId'];
    $status = $row['status'];
    $sssNumber = $row['sssNumber'];
    $philHealthNumber = $row['philHealthNumber'];
    $pagibigNumber = $row['pagibigNumber'];
    $tinNumber = $row['tinNumber'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="shortcut icon" href="RGEM.png" type="image/x-icon">
    <script src="../login/js/navigation.js" defer></script>
    <link rel="stylesheet" href="info.css">
    <title>Employee Info</title>
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
                    <a href="../admin/mj_adminPanel.php" class="navLink">Admin</a>
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

    <div class="containers">
        <!-- header title -->
        <div class="adminHeaderContainer">
            <span class="back" onclick="window.location.href='mj_data.php'"><i class="fa-solid fa-backward"></i></span>
            <span class="title">Employee Data Management</span>
        </div>


        <div class="personalInfo">
            <p>Personal Information</p>
        </div>


        <?php $idNumber = $_GET['idNumber']; ?>
        <div class="employeeProfile">
            <img src="../img/<?php echo $picture; ?>" alt="">
            <p>Employee Number : <?php echo $idNumber ?></p>
            <button class="edit"
                onclick="window.location.href='mj_updateInfo.php?idNumber=<?php echo $idNumber ?>'">Update<i
                    class="fa-solid fa-pen-nib"></i></button>
        </div>

        <div class="employeeInfo">
            <div class="category">
                <h4 class="title">Name</h4>
                <div class="fullName">
                    <div class="name">
                        <label for="">First Name</label>
                        <input type="text" name="firstName" id="" class="textbox" disabled
                            value="<?php echo $firstName ?>">
                    </div>
                    <div class="name">
                        <label for="">Last Name</label>
                        <input type="text" name="lastName" id="" class="textbox" disabled
                            value="<?php echo $lastName ?>">
                    </div>
                    <div class="name">
                        <label for="">Middle Name</label>
                        <input type="text" name="middleName" id="" class="textbox" disabled
                            value="<?php echo $middleName ?>">
                    </div>
                    <div class="name">
                        <label for="">Suffix Name</label>
                        <input type="text" name="suffixName" id="" class="textbox" disabled
                            value="<?php echo $suffixName ?>">
                    </div>
                    <div class="name">
                        <label for="">Gender</label>
                        <select name="gender" id="" class="textbox" disabled>
                            <option value="" selected>
                                <?php

                                if ($gender == 0) {
                                    echo "Male";
                                } else {
                                    echo "Female";
                                }

                                ?>
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                            </option>
                        </select>
                    </div>
                    <div class="name">
                        <label for="">Birthdate</label>
                        <input type="date" name="birthDate" id="" class="textbox" disabled
                            value="<?php echo $birthDate ?>">
                    </div>
                    <div class="name">
                        <label for="">Place of Birth</label>
                        <input type="text" name="birthPlace" id="" class="textbox" disabled
                            value="<?php echo $birthPlace ?>">
                    </div>
                    <div class="name">
                        <label for="">Civil Status</label>
                        <select name="status" id="" class="textbox" disabled>
                            <option value="" selected>
                                <?php

                                if ($civilStatus == 0) {
                                    echo "Single";
                                } else if ($civilStatus == 1) {
                                    echo "Married";
                                } else if ($civilStatus == 2) {
                                    echo "Divorced";
                                } else {
                                    echo "Widowed";
                                }

                                ?>
                            </option>
                            <option value="0">Single</option>
                            <option value="1">Married</option>
                            <option value="2">Divorce</option>
                            <option value="3">Widowed</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="category">
                <h4 class="title">Address</h4>
                <div class="fullAddress">
                    <div class="address">
                        <label for="">Permanent Address</label>
                        <input type="text" name="permanentAddress" id="" class="textbox" disabled
                            value="<?php echo $permanentAddress ?>">
                    </div>
                    <div class="address">
                        <label for="">Present Address</label>
                        <input type="text" name="presentAddress" id="" class="textbox" disabled
                            value="<?php echo $presentAddress ?>">
                    </div>
                </div>
            </div>

            <div class="category">
                <h4 class="title">Additional Info</h4>
                <div class="fullName">
                    <div class="name">
                        <label for="">Nationality</label>
                        <input type="text" name="nationality" id="" class="textbox" disabled
                            value="<?php echo $nationality ?>">
                    </div>
                    <div class="name">
                        <label for="">Telophone Number</label>
                        <input type="text" name="telephone" id="" class="textbox" disabled
                            value="<?php echo $telephone ?>">
                    </div>
                    <div class="name">
                        <label for="">Contact Number</label>
                        <input type="text" name="contactNumber" id="" class="textbox" disabled
                            value="<?php echo $contactNumber ?>">
                    </div>
                    <div class="name">
                        <label for="">Email Address</label>
                        <input type="text" name="email" id="" class="textbox" disabled value="<?php echo $email ?>">
                    </div>
                    <div class="name">
                        <label for="">Emergency Contact Person</label>
                        <input type="text" name="contactPerson" id="" class="textbox" disabled
                            value="<?php echo $contactPerson ?>">
                    </div>
                    <div class="name">
                        <label for="">Emergency Contact Number</label>
                        <input type="number" name="contactPersonNumber" id="" class="textbox" disabled
                            value="<?php echo $contactPersonNumber ?>">
                    </div>
                </div>
            </div>


            <div class="category">
                <h4 class="title">Log In Credentials</h4>
                <div class="fullAddress">
                    <div class="address">
                        <label for="">UserName</label>
                        <input type="text" name="userName" id="" class="textbox" value="<?php echo $userName ?>"
                            disabled>
                    </div>
                    <div class="address">
                        <label for="">Password</label>
                        <input type="text" name="password" id="" class="textbox" value="<?php echo $password ?>"
                            disabled>
                    </div>
                </div>
            </div>

            <div class="category">
                <h4 class="title">Employee Info</h4>
                <div class="fullName">
                    <div class="name">
                        <label for="">ID Number</label>
                        <input type="text" name="idNumber" id="" class="textbox" value="<?php echo $idNumber ?>"
                            disabled>
                    </div>
                    <div class="name">
                        <?php
                        if ($picture == "noProfile.jpg") {
                            $picture = "";
                        }

                        ?>
                        <label for="">Profile Picture</label>
                        <input type="text" name="picture" id="" class="textbox" value="<?php echo $picture ?>" disabled>
                    </div>
                    <div class="name">
                        <label for="">Hired Date</label>
                        <input type="date" name="hiredDate" id="" class="textbox" disabled
                            value="<?php echo $hiredDate ?>">
                    </div>
                    <div class="name">
                        <label for="">Resign Date</label>
                        <input type="date" name="resignDate" id="" class="textbox" disabled
                            value="<?php echo $resignDate ?>">
                    </div>
                    <div class="name">
                        <label for="">Default Shift</label>
                        <select name="shift" id="" class="textbox">
                            <option value="" selected>

                                <?php

                                if ($shiftId == 0) {
                                    echo "8:00:00AM - 5:00:00PM";
                                } else if ($shiftId == 2) {
                                    echo "7:00:00AM - 4:00:00PM";
                                } else {
                                    echo "6:00:00AM - 2:00:00PM";
                                }

                                ?>
                            <option value="0">8:00:00AM - 5:00:00PM</option>
                            <option value="1">7:00:00AM - 4:00:00PM</option>
                            <option value="2">6:00:00AM - 2:00:00PM</option>
                            </option>
                        </select>
                    </div>
                    <div class="name">
                        <label for="">Status</label>
                        <select name="status" id="" class="textbox">
                            <option value="" selected>

                                <?php echo $status == 0 ? "Inactive" : "Active"; ?>

                            </option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="name">
                        <label for="">Department</label>
                        <select name="department" id="" class="textbox">
                            <option value="" selected>

                                <?php

                                if ($departmentId == 1) {
                                    echo "Admin";
                                } else if ($departmentId == 2) {
                                    echo "Production";
                                } else {
                                    echo "Maintenance";
                                }

                                ?>
                            <option value="0">Admin</option>
                            <option value="1">Production</option>
                            <option value="2">Maintenance</option>
                            </option>
                        </select>
                    </div>
                    <div class="name">
                        <label for="">Position</label>
                        <input type="text" name="position" id="" class="textbox" disabled
                            value="<?php echo $position ?>">
                    </div>
                    <div class="name">
                        <label for="">SSS Number</label>
                        <input type="text" name="sssNumber" id="" class="textbox" disabled
                            value="<?php echo $sssNumber ?>">
                    </div>
                    <div class="name">
                        <label for="">PhilHealth Number</label>
                        <input type="text" name="philHealthNumber" id="" class="textbox" disabled
                            value="<?php echo $philHealthNumber ?>">
                    </div>
                    <div class="name">
                        <label for="">Pagibig Number</label>
                        <input type="text" name="pagibigNumber" id="" class="textbox" disabled
                            value="<?php echo $pagibigNumber ?>">
                    </div>
                    <div class="name">
                        <label for="">TIN Number</label>
                        <input type="text" name="tinNumber" id="" class="textbox" disabled
                            value="<?php echo $tinNumber ?>">
                    </div>
                </div>
            </div>

        </div>



    </div>

</body>

</html>