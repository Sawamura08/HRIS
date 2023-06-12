<?php

include("../connection.php");


$idNumber = $_POST['idNumber']; //  using the GET method
$leaveType = $_POST['leaveType'];
$requestType = $_POST['requestType'];
$leaveStart = $_POST['leaveStart'];
$leaveEnd = $_POST['leaveEnd'];
$reason = $_POST['reason'];


$sql = "INSERT INTO hr_leavehistory (idNumber,leaveType,requestType,startDate,endDate,purpose,dateRequest) VALUES ('" . $idNumber . "', '" . $leaveType . "','" . $requestType . "', '" . $leaveStart . "', '" . $leaveEnd . "', '" . $reason . "', CURDATE())";

$query = $connectionString->query($sql);
