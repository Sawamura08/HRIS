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


    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.1.2/css/searchPanes.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.6.2/css/select.dataTables.min.css">


    <link rel="stylesheet" href="../login/css/navigation.css">
    <link rel="stylesheet" href="edit.css">


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">



    <link rel="shortcut icon" href="RGEM.png" type="image/x-icon">
    <script src="../login/js/navigation.js" defer></script>
    <title>Annoucement Software</title>
</head>

<body>

    <header class="headers" style="width:100%;">
        <nav class="navbars">
            <a href="#" class="navLogo">RGEM</a>
            <ul class="navMenu">
                <li class="navItem">
                    <a href="../login/mj_mainPage.php?idNumber=<?php echo $idNumber; ?>" class="navLink">Home</a>
                </li>
                <li class="navItem">
                    <a href="../attendance/mj_attendance.php?idNumber=<?php echo $idNumber; ?>"
                        class="navLink">Attendance</a>
                </li>
                <li class="navItem">
                    <a href="../leave/mj_leave.php?idNumber=<?php echo $idNumber; ?>" class="navLink">Leave</a>
                </li>
                <li class="navItem">
                    <a href="#" class="navLink">Profile</a>
                </li>
                <li class="navItem">
                    <a href="../admin/mj_adminPanel.php?idNumber=<?php echo $idNumber; ?>" class="navLink">Admin</a>
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
        <span class="back" onclick="window.location.href='mj_adminPanel.php'"><i
                class="fa-solid fa-backward"></i></span>
        <p class="title">Annoucement Software</p>
    </div>


    <main class="containers">
        <div class="tableContainer">
            <table id="userTable" class="table table-striped caption-top table-hover" style="width:100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Scheduled Date</th>
                        <th>Scheduled Time</th>
                        <th>Purpose</th>
                        <th>Venue</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT * FROM  hr_annoucement WHERE scheduledDate >= CURDATE()";
                    $query = $connectionString->query($sql);
                    $i = 1;
                    if ($query && $query->num_rows > 0) {
                        while ($row = $query->fetch_assoc()) {
                            $announcementId = $row['announcementId'];
                            $scheduledDate = $row['scheduledDate'];
                            $scheduledTime = $row['scheduledTime'];
                            $newTime = date('h:i:s', strtotime($scheduledTime));
                            $purpose = $row['purpose'];
                            $venue = $row['venue'];
                            $type = $row['type'] == 0  ? "Meeting" : "General";

                            echo "
                                <tr>
                                <td   td  class='align-middle'>" . $i++ . "</td>
                                <td   td  class='align-middle'>$scheduledDate</td>
                                <td   td  class='align-middle'>$newTime</td>
                                <td   td  class='align-middle'>$purpose</td>
                                <td   td  class='align-middle'>$venue</td>
                                <td   td  class='align-middle'>$type</td>
                                <td   td  class='align-middle' style='text-align:center;'><i class='fa-solid fa-pen-to-square' id ='button' data-value = '$announcementId'></i></td>
                                <tr>
                            
                            ";
                        }
                    }


                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php
    $value = $_GET['announcementId'];

    if (isset($_POST['apply'])) {
        $scheduledDate = $_POST['scheduledDate'];
        $scheduledTime = $_POST['scheduledTime'];
        $purpose = $_POST['purpose'];
        $venue = $_POST['venue'];
        $type = $_POST['type'] == "Meeting" ? 0 : 1;

        $update = "UPDATE hr_annoucement SET scheduledDate = '$scheduledDate', scheduledTime = '$scheduledTime', purpose = '$purpose', venue = '$venue', type = $type WHERE announcementId = '$value'";
        $updateQuery = $connectionString->query($update);
        if ($updateQuery && $updateQuery) {
            header("location: mj_announcement.php");
        } else {
            header("location: mj_announcement.php");
        }
    }

    if ($value) {
        $sql = "SELECT * FROM  hr_annoucement WHERE scheduledDate >= CURDATE() AND announcementId = $value";
        $query = $connectionString->query($sql);

        if ($query && $query->num_rows > 0) {
            $row = $query->fetch_assoc();
            $scheduledDate = $row['scheduledDate'];
            $scheduledTime = $row['scheduledTime'];
            $newTime = date('h:i:s', strtotime($scheduledTime));
            $purpose = $row['purpose'];
            $venue = $row['venue'];
            $type = $row['type'];
        }


        echo '<div id="myModal" class="modal">
        <div class="modal-content">
            <h1 class="text">Annoucement</h1>
    <div class="data">
        <form method="POST" id="announcement"> </form>
        <input type="hidden" name="value" value="' . $value . '">
    <input type="date" name="scheduledDate" id="" form="announcement" value="' . $scheduledDate . '"
    class="inputs">
    <input type="text" name="scheduledTime" id="time" form="announcement" value="' . $scheduledTime . '"
    class="inputs">
    <input type="text" name="purpose" id="" form="announcement" value="' . $purpose . '" class="inputs
    purpose">
    <input type="text" name="venue" id="" form="announcement" value="' . $venue . '" class="inputs">
    <select name="type" id="" class="inputs" form="announcement">
        <option value="" selected disabled hidden>';


        echo $type == 0 ? "Meeting" : "General";
        echo '   
    </option>
    <option value="0">Meeting</option>
    <option value="1">General</option>
    </select>
    </div>
    <div class="buttonContainer">
        <input type="submit" value="Apply" id="go" form="announcement" name="apply">

        <input type="button" value="Cancel" id="close">
    </div>

    </div>
    </div>';
    }

    ?>






</body>

</html>
<script>
// $(document).ready(function() {
//     $("i#button").click(function() {
//         var value = $(this).attr("data-value");
//         console.log(value);

//         $.ajax({
//             url: 'mj_announcementAjax.php',
//             method: 'POST',
//             data: {
//                 value: value
//             },
//             success: function(response) {

//                 /*            $("#myModal").remove(); */
//                 $("#result").html(response);
//                 $("#myModal").show();
//             }
//         })
//     });


//     $(document).on("click", "#close", function() {
//         $("#myModal").hide(); // Close the modal
//     });



// });
</script>