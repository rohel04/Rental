<?php
//session_start();
$Host = "localhost";
$User = "root";
$Pass = "";
$Db = "rental";
$conn = new mysqli($Host, $User, $Pass, $Db);
try {
    if ($conn->connect_error) {

        throw new Exception("connection failed:" . $conn->connect_error);
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
//To display Errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);