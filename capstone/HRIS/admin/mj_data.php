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
    <link rel="stylesheet" href="data.css">


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">



    <link rel="shortcut icon" href="RGEM.png" type="image/x-icon">
    <script src="../login/js/navigation.js" defer></script>
    <title>Admin</title>
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



    <!-- header title -->
    <div class="adminHeaderContainer">
        <span class="back" onclick="window.location.href='mj_adminPanel.php'"><i
                class="fa-solid fa-backward"></i></span>
        <p class="title">Employee Data Management</p>
    </div>


    <div class="containers">
        <div class="filter">
            <div class="searchContainer">
                <form action="" method="post" id="searched"></form>
                <div class="search">
                    <input type="text" name="search" id="" form="searched" placeholder="Search..." value="<?php if (isset($_POST['search'])) {
                                                                                                                echo $_POST['search'];
                                                                                                            } ?>">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <button class="refresh" onclick="window.location.href ='mj_data.php'"><i
                        class="fa-solid fa-arrows-rotate"></i></button>
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
                    <button class="apply add" onclick='window.location.href="mj_add.php"'><i
                            class="fa-solid fa-user-plus"></i></button>
                </div>
            </div>
        </div>

        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sql = "SELECT idNumber, firstName, lastName, position, departmentName, hr_employeeinfo.departmentId FROM `hr_employeeinfo` INNER JOIN hr_department ON hr_employeeinfo.departmentId = hr_department.departmentId WHERE status = 1";
            $searchKey = isset($_POST['search']) ? $_POST['search'] : "";

            $searchKeys = explode(" ", $searchKey);

            foreach ($searchKeys as $key) {
                $addSql = " AND ( idNumber LIKE '%" . $key . "%' OR firstName LIKE '%" . $key . "%' OR lastName LIKE '%" . $key . "%' OR position LIKE '%" . $key . "%') ";
                $sql .=  $addSql;
            }

            /* for drop down filter */

            $departmentName = isset($_POST['departmentName']) ? $_POST['departmentName'] : "";

            $formFilter = "";

            if ($departmentName != "") $formFilter = " AND hr_employeeinfo.departmentId LIKE '%" . $departmentName . "%'";
            if ($formFilter != "") {

                $sql .= $formFilter;
            }
            $query = $connectionString->query($sql);
            $totalRecords = $query->num_rows;
            if ($query->num_rows > 0) {
                echo '

                <table id="userTable" class="table table-info table-striped caption-top table-hover" style="width:100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID Number</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Department Name</th>
                        <th>Position</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                </table>
                
                
                ';
            } else {
                echo '<div class="noData"><img src="../admin//noData.jpg" alt=""></div>';
            }
        } else {

            $sql = "SELECT idNumber, firstName, lastName, position, departmentName, hr_employeeinfo.departmentId FROM `hr_employeeinfo` INNER JOIN hr_department ON hr_employeeinfo.departmentId = hr_department.departmentId WHERE status = 1";
            $query = $connectionString->query($sql);
            $totalRecords = $query->num_rows;
            echo '
                
            <table id="userTable" class="table table-info table-striped caption-top table-hover" style="width:100%;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Department Name</th>
                    <th>Position</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <tr>
            </tr>
            </tbody>
            </table>
            
            
            ';
        }

        ?>

    </div>

    <script>
    let sql = "<?php echo $sql; ?>";
    let totalRecords = <?php echo $totalRecords; ?>;
    console.log(sql);
    $(document).ready(function() {
        $('#userTable').DataTable({
            "bLengthChange": false,
            "ServerSide": true,
            "processing": true,
            "searching": true,
            "ordering": false,
            "paging": false,
            "info": false,
            "sDom": "lrti",
            "createdRow": function(row, data, dataIndex) {
                // Add CSS class to alternate rows
                if (dataIndex % 2 === 0) {
                    $(row).css("background-color", "red");
                } else {
                    $(row).css("background-color", "blue");
                }
            },
            "ajax": {
                url: "../admin/mj_dataAjax.php", // json datasource (another file)
                type: "POST", // method, the default is GET
                data: {
                    query: sql,
                    totalData: totalRecords,
                },
                error: function(data) { // error handling
                    console.log(data);
                }
            },
            paging: true,
            deferRender: true,
            scrollY: 450,
            scrollcollapse: false,
            scroller: true,
            scrollX: true,
        });

    });
    </script>
</body>

</html>