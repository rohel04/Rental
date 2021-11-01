<?php
session_start();
ob_start();
include("include/connection.php");



$id = $_REQUEST['b_id'];
$sql = "delete from tbl_booking where b_id=$id";
if ($conn->query($sql) == TRUE) {
    $message = "Data Deleted Successfully.";
} else {
    $message = "Something went Wrong";
}
header("Location: bookinglist.php?message=$message");