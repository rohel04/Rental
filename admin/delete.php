<?php
session_start();
ob_start();
include("include/connection.php");



$id = $_REQUEST['id'];
$sql = "delete from tbl_property where id=$id";
if ($conn->query($sql) == TRUE) {
    $message = "Data Deleted Successfully.";
} else {
    $message = "Something went Wrong";
}
header("Location: propertyset.php?message=$message");