<?php

$host = "localhost";
$userName = "root";
$password = "Sawamura08";
$database = "hr_employee";

$connectionString = mysqli_connect($host, $userName, $password, $database);

if (!$connectionString) {
    die("Connection failed: " . mysqli_connect_error());
}
