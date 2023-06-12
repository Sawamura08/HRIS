<?php
include("connection.php");
$idNumber = $_POST['idNumber'];
if (isset($_POST['idNumber'])) {


    $sql = "UPDATE hr_dtr SET timeOut = NOW() WHERE idNumber = " . $idNumber . " AND dateToday = CURRENT_DATE()";
    $query = $connectionString->query($sql);

    if ($query) {
        header("location: mj_welcome.php?idNumber=" . $idNumber);
    } else {
        echo "Error";
    }
}
