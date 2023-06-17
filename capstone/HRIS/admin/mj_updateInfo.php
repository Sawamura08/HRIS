<?php

include('../connection.php'); // to connect to database


$idNumber = $_GET['idNumber'];
session_start();
$idNumbers = $_SESSION['idNumber'];

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


        <?php


        if (isset($_POST['save'])) {

            $newidNumber = $_POST['idNumber'];
            $newuserName = $_POST['userName'];
            $newpassword = $_POST['password'];
            $newpicture = $_POST['picture'];
            $newFirstName = $_POST['firstName'];
            $newlastName = $_POST['lastName'];
            $newmiddleName = $_POST['middleName'];
            $newsuffixName = $_POST['suffixName'];
            $newbirthDate = $_POST['birthDate'];
            $newbirthPlace = $_POST['birthPlace'];
            $newcivilStatus = $_POST['civilStatus'];
            $newgender = $_POST['gender'];
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


            echo $sql = "UPDATE hr_employeeinfo SET firstName = '" . $newFirstName . "' , lastName = '" . $newlastName . "' , suffixName = '" . $newsuffixName . "' , birthDate = " . ($newbirthDate ? "'" . $newbirthDate . "'" : "NULL") . " , birthPlace = '" . $newbirthPlace . "' , civilStatus = '" . $newcivilStatus . "' , gender = '" . $newgender . "' , presentAddress = '" . $newpresentAddress . "' , permanentAddress = '" . $newpermanentAddress . "' , nationality = '" . $newnationality . "' , telephone = '" . $newtelephone . "' , contactNumber = '" . $newcontactNumber . "' , email = '" . $newemail . "' , contactPerson = '" . $newcontactPerson . "' , contactPersonNumber = '" . $contactPersonNumber . "' , hiredDate = " . ($newhiredDate ? "'" . $newhiredDate . "'" : "NULL") . " , resignDate = " . ($newresignDate ? "'" . $newresignDate . "'" : "NULL") . " , departmentId = '" . $newdepartmentId . "' , position = '" . $position . "' , shiftId = '" . $newshiftId . "' , status = '" . $status . "' , sssNumber = '" . $newsssNumber . "' , philHealthNumber = '" . $newphilHealthNumber . "' ,  pagibigNumber = '" . $newpagibigNumber . "' , tinNumber = '" . $newtinNumber . "', idNumber = '" . $newidNumber . "', userName = '" . $newuserName . "', password = '" . $newpassword . "' WHERE idNumber = $idNumber";


            $query = $connectionString->query($sql);

            if (!$query) {
                header("location: mj_info.php?idNumber=$idNumber");
                echo '<script>alert("Error Occured");</script>';
            } else {
                header("location: mj_info.php?idNumber=$idNumber");
                echo '<script>alert("Record Updated Succesfully");</script>';
            }
        }


        ?>
        <div class="employeeProfile">
            <img src="../img/<?php echo $picture; ?>" alt="">
            <button class="edit" name="save" form="update" type="submit">Update<i
                    class="fa-solid fa-pen-nib"></i></button>
            <button class="edit cancel"
                onclick="window.location.href='mj_info.php?idNumber=<?php echo $idNumber; ?>'">Cancel
            </button>
        </div>

        <div class="employeeInfo">
            <div class="category">
                <h4 class="title">Name</h4>
                <div class="fullName">
                    <div class="name">
                        <form action="" method="post" id="update"></form>
                        <label for="">First Name</label>
                        <input type="text" name="firstName" id="" class="textbox" form="update"
                            value="<?php echo $firstName ?>">
                    </div>
                    <div class="name">
                        <label for="">Last Name</label>
                        <input type="text" name="lastName" id="" class="textbox" form="update"
                            value="<?php echo $lastName ?>">
                    </div>
                    <div class="name">
                        <label for="">Middle Name</label>
                        <input type="text" name="middleName" id="" class="textbox" form="update"
                            value="<?php echo $middleName ?>">
                    </div>
                    <div class="name">
                        <label for="">Suffix Name</label>
                        <input type="text" name="suffixName" id="" class="textbox" form="update"
                            value="<?php echo $suffixName ?>">
                    </div>
                    <div class="name">
                        <label for="">Gender</label>
                        <select name="gender" id="" form="update" class="textbox">

                            <option value="0" <?php echo $gender == 0 ? "selected" : "";  ?>>Male</option>
                            <option value="1" <?php echo $gender == 1 ? "selected" : ""; ?>>Female</option>
                        </select>
                    </div>
                    <div class="name">
                        <label for="">Birthdate</label>
                        <input type="date" name="birthDate" id="" class="textbox" form="update"
                            value="<?php echo $birthDate ?>">
                    </div>
                    <div class="name">
                        <label for="">Place of Birth</label>
                        <input type="text" name="birthPlace" id="" class="textbox" form="update"
                            value="<?php echo $birthPlace ?>">
                    </div>
                    <div class="name">
                        <label for="">Civil Status</label>
                        <select name="civilStatus" id="" form="update" class="textbox">
                            <option value="" selected hidden>
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
                            <option value="0" <?php echo $civilStatus == 0 ? "selected" : ""; ?>>Single</option>
                            <option value="1" <?php echo $civilStatus == 1 ? "selected" : ""; ?>>Married</option>
                            <option value="2" <?php echo $civilStatus == 2 ? "selected" : ""; ?>>Divorce</option>
                            <option value="3" <?php echo $civilStatus == 3 ? "selected" : ""; ?>>Widowed</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="category">
                <h4 class="title">Address</h4>
                <div class="fullAddress">
                    <div class="address">
                        <label for="">Permanent Address</label>
                        <input type="text" name="permanentAddress" id="" class="textbox" form="update"
                            value="<?php echo $permanentAddress ?>">
                    </div>
                    <div class="address">
                        <label for="">Present Address</label>
                        <input type="text" name="presentAddress" id="" class="textbox" form="update"
                            value="<?php echo $presentAddress ?>">
                    </div>
                </div>
            </div>

            <div class="category">
                <h4 class="title">Additional Info</h4>
                <div class="fullName">
                    <div class="name">
                        <label for="">Nationality</label>
                        <input type="text" name="nationality" id="" class="textbox" form="update"
                            value="<?php echo $nationality ?>">
                    </div>
                    <div class="name">
                        <label for="">Telophone Number</label>
                        <input type="text" name="telephone" id="" class="textbox" form="update"
                            value="<?php echo $telephone ?>">
                    </div>
                    <div class="name">
                        <label for="">Contact Number</label>
                        <input type="text" name="contactNumber" id="" class="textbox" form="update"
                            value="<?php echo $contactNumber ?>">
                    </div>
                    <div class="name">
                        <label for="">Email Address</label>
                        <input type="text" name="email" id="" class="textbox" form="update"
                            value="<?php echo $email ?>">
                    </div>
                    <div class="name">
                        <label for="">Emergency Contact Person</label>
                        <input type="text" name="contactPerson" id="" class="textbox" form="update"
                            value="<?php echo $contactPerson ?>">
                    </div>
                    <div class="name">
                        <label for="">Emergency Contact Number</label>
                        <input type="number" name="contactPersonNumber" id="" class="textbox" form="update"
                            value="<?php echo $contactPersonNumber ?>">
                    </div>
                </div>
            </div>


            <div class="category">
                <h4 class="title">Log In Credentials</h4>
                <div class="fullAddress">
                    <div class="address">
                        <label for="">UserName</label>
                        <input type="text" name="userName" id="" form="update" class="textbox"
                            value="<?php echo $userName ?>">

                    </div>
                    <div class="address">
                        <label for="">Password</label>
                        <input type="text" name="password" id="" form="update" class="textbox"
                            value="<?php echo $password ?>">

                    </div>
                </div>
            </div>

            <div class="category">
                <h4 class="title">Employee Info</h4>
                <div class="fullName">
                    <div class="name">
                        <label for="">ID Number</label>
                        <input type="text" name="idNumber" id="" form="update" class="textbox"
                            value="<?php echo $idNumber ?>">
                    </div>
                    <div class="name">
                        <?php
                        if ($picture == "noProfile.jpg") {
                            $picture = "";
                        }

                        ?>
                        <label for="">Profile Picture</label>
                        <input type="text" name="picture" id="" form="update" class="textbox"
                            value="<?php echo $picture ?>">
                    </div>
                    <div class="name">
                        <label for="">Hired Date</label>
                        <input type="date" name="hiredDate" id="" class="textbox" form="update"
                            value="<?php echo $hiredDate ?>">
                    </div>
                    <div class="name">
                        <label for="">Resign Date</label>
                        <input type="date" name="resignDate" id="" class="textbox" form="update"
                            value="<?php echo $resignDate ?>">
                    </div>

                    <div class=" name">
                        <label for="">Default Shift</label>
                        <select name="shift" id="" form="update" class="textbox">
                            <option value="" selected hidden>

                                <?php

                                if ($shiftId == 0) {
                                    echo "8:00:00AM - 5:00:00PM";
                                } else if ($shiftId == 2) {
                                    echo "7:00:00AM - 4:00:00PM";
                                } else {
                                    echo "6:00:00AM - 2:00:00PM";
                                }

                                ?>
                            <option value=" 0" <?php echo $shiftId  == 0 ? "selected" : ""; ?>>8:00:00AM - 5:00:00PM
                            </option>
                            <option value="1" <?php echo $shiftId  == 1 ? "selected" : ""; ?>>7:00:00AM - 4:00:00PM
                            </option>
                            <option value="2" <?php echo $shiftId  == 2 ? "selected" : ""; ?>>6:00:00AM - 2:00:00PM
                            </option>
                            </option>
                        </select>
                    </div>
                    <div class="name">
                        <label for="">Status</label>
                        <select name="status" id="" form="update" class="textbox">
                            <option value="" selected hidden>

                                <?php echo $status == 0 ? "Inactive" : "Active"; ?>

                            </option>
                            <option value="1" <?php echo $status == 0 ? "selected" : ""; ?>>Active</option>
                            <option value="0" <?php echo $status == 1 ? "selected" : ""; ?>>Inactive</option>
                        </select>
                    </div>
                    <div class="name">
                        <label for="">Department</label>
                        <select name="department" id="" form="update" class="textbox">
                            <option value="" selected hidden>

                                <?php

                                if ($departmentId == 1) {
                                    echo "Admin";
                                } else if ($departmentId == 2) {
                                    echo "Production";
                                } else {
                                    echo "Maintenance";
                                }

                                ?>
                            <option value="0" <?php echo $departmentId == 0 ? "selected" : ""; ?>>Admin</option>
                            <option value="1" <?php echo $departmentId == 1 ? "selected" : ""; ?>>Production
                            </option>
                            <option value="2" <?php echo $departmentId == 2 ? "selected" : ""; ?>>Maintenance
                            </option>
                            </option>
                        </select>
                    </div>
                    <div class="name">
                        <label for="">Position</label>
                        <input type="text" name="position" id="" form="update" class="textbox"
                            value="<?php echo $position ?>">
                    </div>
                    <div class="name">
                        <label for="">SSS Number</label>
                        <input type="text" name="sssNumber" id="" form="update" class="textbox"
                            value="<?php echo $sssNumber ?>">
                    </div>
                    <div class="name">
                        <label for="">PhilHealth Number</label>
                        <input type="text" name="philHealthNumber" id="" form="update" class="textbox"
                            value="<?php echo $philHealthNumber ?>">
                    </div>
                    <div class="name">
                        <label for="">Pagibig Number</label>
                        <input type="text" name="pagibigNumber" id="" form="update" class="textbox"
                            value="<?php echo $pagibigNumber ?>">
                    </div>
                    <div class="name">
                        <label for="">TIN Number</label>
                        <input type="text" name="tinNumber" id="" form="update" class="textbox"
                            value="<?php echo $tinNumber ?>">
                    </div>
                </div>
            </div>

        </div>

</body>

</html>