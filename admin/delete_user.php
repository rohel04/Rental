<?php
session_start();
ob_start();
include("include/connection.php");



$id = $_REQUEST['id'];
$sql = "delete from tbl_user where id=$id";
if ($conn->query($sql) == TRUE) {
    $message = "Data Deleted Successfully.";
} else {
    $message = "Something went Wrong";
}
header("Location: user.php?message=$message");
