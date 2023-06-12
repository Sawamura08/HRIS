<?php
include('../connection.php'); // to connect to database

ini_set("display_errors", "on");

$requestData = $_REQUEST;
$totalData = $_POST['totalData'];
$sqlData = isset($requestData['query']) ? $requestData['query'] : "";
$totalRecords = (isset($requestData['totalRecords'])) ? $requestData['totalRecords'] : 0;
$totalFiltered = $totalRecords;
$totalData = $totalFiltered;


$data = array();
$i = 1;
$sql = $sqlData;
$queryResult = $connectionString->query($sqlData);

if ($queryResult and $queryResult->num_rows > 0) {
    while ($requestData = $queryResult->fetch_assoc()) {
        $idNumber = $requestData['idNumber'];
        $firstName = $requestData['firstName'];
        $lastName = $requestData['lastName'];
        $position = $requestData['position'];
        $departmentName  = $requestData['departmentName'];
        $view = '<i class="fa-solid fa-eye" style="font-size: 2rem;" onclick="window.location.href=\'mj_info.php?idNumber=' . $idNumber . '\'"></i>';

        $nestedData = array();

        $nestedData[] = $i++;
        $nestedData[] = $idNumber;
        $nestedData[] = $firstName;
        $nestedData[] = $lastName;
        $nestedData[] = $departmentName;
        $nestedData[] = $position;
        $nestedData[] = $view;

        $data[] = $nestedData;
    }
} else {
    echo "Error";
}

$json_data = array(
    // "draw" => intval($requestData['draw']), // for every request/draw by clientside , they send a number as a parameter,
    // when they recieve a response/data they first check the draw number, so we are sending same number in draw
    "recordsTotal" => intval($totalData), // total number of records
    "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then
    // totalFiltered = totalData
    "data" => $data // total data array
);

echo json_encode($json_data); // send data as json format