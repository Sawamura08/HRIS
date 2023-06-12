<?php

include('../connection.php'); // to connect to database

?>

<?php
ob_start();


if (isset($_POST['save'])) {
    $idNumber = $_POST['idNumber'];
    $newFirstName = $_POST['firstName'];
    $newlastName = $_POST['lastName'];
    $newmiddleName = $_POST['middleName'];
    $newsuffixName = $_POST['suffixName'];
    $newbirthDate = $_POST['birthDate'];
    $newbirthPlace = $_POST['birthPlace'];
    $newcivilStatus = $_POST['civilStatus'];
    $newgender = $_POST['gender'];
    $picture = $_POST['picture'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $newpresentAddress = $_POST['presentAddress'];
    $newpermanentAddress = $_POST['permanentAddress'];
    $newnationality = $_POST['nationality'];
    $newtelephone = $_POST['telephone'];
    $newcontactNumber = $_POST['contactNumber'];
    $newemail = $_POST['email'];
    $newcontactPerson = $_POST['contactPerson'];
    $newcontactPersonNumber = $_POST['contactPersonNumber'];
    $newhiredDate = $_POST['hiredDate'];
    $newresignDate = $_POST['resignDate'];
    $newdepartmentId = $_POST['department'];
    $newposition = $_POST['position'];
    $newshiftId = $_POST['shift'];
    $newstatus = $_POST['status'];
    $newsssNumber = $_POST['sssNumber'];
    $newphilHealthNumber = $_POST['philHealthNumber'];
    $newpagibigNumber = $_POST['pagibigNumber'];
    $newtinNumber = $_POST['tinNumber'];

    echo $sql = "INSERT INTO hr_employeeinfo (idNumber,firstName, lastName, middleName, suffixName, birthDate, birthPlace, civilStatus, gender,picture, presentAddress,permanentAddress,nationality,telephone,contactNumber,email,contactPerson,contactPersonNumber,hiredDate,resignDate,departmentId,position,shiftId,status,sssNumber,philHealthNumber,pagibigNumber,tinNumber,userName,password) VALUES (" . $idNumber . ",'" . $newFirstName . "','" . $newlastName . "','" . $newmiddleName . "','" . $newsuffixName . "'," . ($newbirthDate ? "'" . $newbirthDate . "'" : "NULL") . ",'" . $newbirthPlace . "','" . $newcivilStatus . "','" . $newgender . "','" . $picture . "','" . $newpresentAddress . "','" . $newpermanentAddress . "','" . $newnationality . "','" . $newtelephone . "','" . $newcontactNumber . "','" . $newemail . "','" . $newcontactPerson . "'," . $newcontactPersonNumber . "," . ($newhiredDate ? "'" . $newhiredDate . "'" : "NULL") . "," . ($newresignDate ? "'" . $newresignDate . "'" : "NULL") . ",'" . $newdepartmentId . "','" . $newposition . "','" . $newshiftId . "','" . $newstatus . "','" . $newsssNumber . "','" . $newphilHealthNumber . "','" . $newpagibigNumber . "','" . $newtinNumber . "','" . $userName . "','" . $password . "')";

    $query = $connectionString->query($sql);
    if ($query) {
        header("location: mj_data.php");
    }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
        <!-- header title -->
        <div class="adminHeaderContainer">
            <p class="title">Employee Data Management</p>
        </div>


        <div class="personalInfo">
            <p>Personal Information</p>
        </div>



        <form action="" method="post" id="add"></form>
        <div class="employeeInfo">
            <div class="category">
                <h4 class="title">Name</h4>
                <div class="fullName">
                    <div class="name">
                        <label for="">First Name</label>
                        <input type="text" name="firstName" id="" class="textbox" value="" form="add">
                    </div>
                    <div class="name">
                        <label for="">Last Name</label>
                        <input type="text" name="lastName" id="" class="textbox" value="" form="add">
                    </div>
                    <div class="name">
                        <label for="">Middle Name</label>
                        <input type="text" name="middleName" id="" class="textbox" value="" form="add">
                    </div>
                    <div class="name">
                        <label for="">Suffix Name</label>
                        <input type="text" name="suffixName" id="" class="textbox" value="" form="add">
                    </div>
                    <div class="name">
                        <label for="">Gender</label>
                        <select name="gender" id="" class="textbox" form="add">
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                            </option>
                        </select>
                    </div>
                    <div class="name">
                        <label for="">Birthdate</label>
                        <input type="date" name="birthDate" id="" class="textbox" value="" form="add">
                    </div>
                    <div class="name">
                        <label for="">Place of Birth</label>
                        <input type="text" name="birthPlace" id="" class="textbox" value="" form="add">
                    </div>
                    <div class="name">
                        <label for="">Civil Status</label>
                        <select name="civilStatus" id="" class="textbox" form="add">
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
                        <input type="text" name="permanentAddress" id="" class="textbox" value="" form="add">
                    </div>
                    <div class="address">
                        <label for="">Present Address</label>
                        <input type="text" name="presentAddress" id="" class="textbox" value="" form="add">
                    </div>
                </div>
            </div>

            <div class="category">
                <h4 class="title">Additional Info</h4>
                <div class="fullName">
                    <div class="name">
                        <label for="">Nationality</label>
                        <input type="text" name="nationality" id="" class="textbox" value="" form="add">
                    </div>
                    <div class="name">
                        <label for="">Telophone Number</label>
                        <input type="text" name="telephone" id="" class="textbox" value="" form="add">
                    </div>
                    <div class="name">
                        <label for="">Contact Number</label>
                        <input type="text" name="contactNumber" id="" class="textbox" value="" form="add">
                    </div>
                    <div class="name">
                        <label for="">Email Address</label>
                        <input type="text" name="email" id="" class="textbox" value="" form="add">
                    </div>
                    <div class="name">
                        <label for="">Emergency Contact Person</label>
                        <input type="text" name="contactPerson" id="" class="textbox" value="" form="add">
                    </div>
                    <div class="name">
                        <label for="">Emergency Contact Number</label>
                        <input type="number" name="contactPersonNumber" id="" class="textbox" value="" form="add">
                    </div>
                </div>
            </div>

            <div class="category">
                <h4 class="title">Log In Credentials</h4>
                <div class="fullAddress">
                    <div class="address">
                        <label for="">UserName</label>
                        <input type="text" name="userName" id="" class="textbox" value="" form="add">
                    </div>
                    <div class="address">
                        <label for="">Password</label>
                        <input type="text" name="password" id="" class="textbox" value="" form="add">
                    </div>
                </div>
            </div>

            <div class="category">
                <h4 class="title">Employee Info</h4>
                <div class="fullName">
                    <div class="name">
                        <label for="">ID Number</label>
                        <input type="text" name="idNumber" id="" class="textbox" value="" form="add">
                    </div>
                    <div class="name">
                        <label for="">Profile Picture</label>
                        <input type="text" name="picture" id="" class="textbox" value="" form="add">
                    </div>
                    <div class="name">
                        <label for="">Hired Date</label>
                        <input type="date" name="hiredDate" id="" class="textbox" value="" form="add">
                    </div>
                    <div class="name">
                        <label for="">Resign Date</label>
                        <input type="date" name="resignDate" id="" class="textbox" value="" form="add">
                    </div>
                    <div class="name">
                        <label for="">Default Shift</label>
                        <select name="shift" id="" class="textbox" form="add">
                            <option value="0">8:00:00AM - 5:00:00PM</option>
                            <option value="1">7:00:00AM - 4:00:00PM</option>
                            <option value="2">6:00:00AM - 2:00:00PM</option>
                            </option>
                        </select>
                    </div>
                    <div class="name">
                        <label for="">Status</label>
                        <select name="status" id="" class="textbox" form="add">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="name">
                        <label for="">Department</label>
                        <select name="department" id="" class="textbox" form="add">
                            <option value="0">Admin</option>
                            <option value="1">Production</option>
                            <option value="2">Maintenance</option>
                            </option>
                        </select>
                    </div>
                    <div class="name">
                        <label for="">Position</label>
                        <input type="text" name="position" id="" class="textbox" value="" form="add">
                    </div>
                    <div class="name">
                        <label for="">SSS Number</label>
                        <input type="text" name="sssNumber" id="" class="textbox" value="" form="add">
                    </div>
                    <div class="name">
                        <label for="">PhilHealth Number</label>
                        <input type="text" name="philHealthNumber" id="" class="textbox" value="" form="add">
                    </div>
                    <div class="name">
                        <label for="">Pagibig Number</label>
                        <input type="text" name="pagibigNumber" id="" class="textbox" value="" form="add">
                    </div>
                    <div class="name">
                        <label for="">TIN Number</label>
                        <input type="text" name="tinNumber" id="" class="textbox" value="" form="add">
                    </div>
                </div>
            </div>

            <div class="employeeProfile">
                <input class="edit save" type="submit" form="add" name="save" value="Save"></input>
                <button class="edit cancel" onclick="window.location.href='mj_data.php'">Cancel</button>
            </div>

        </div>



    </div>

</body>

</html>