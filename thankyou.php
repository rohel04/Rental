<?php
include("include/connection.php");

if (isset($_POST['submit'])) {
    $name = $_POST['fname'];
    $email = $_POST['email'];
    $message = $_POST['content'];

    $sql = "INSERT INTO tbl_contact(name,email,message) VALUE ('$name','$email','$message')";
    if ($conn->query($sql) == FALSE) {
        echo ("Not Saved");
    }
}

?>

<html>

<head>
    <title>Thank You</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="web_project/css/bootstrap.css">

</head>

<body>
    <div id="wrapper">
        <div id="content" style="height:auto; width:50%; margin:auto; background-color:burlywood">
            <center>
                <p>Thank you for your specious time to communicate with us.</p>
                <p> We will response your Feedback soon.
                    <br />Thank
                    you
                    once again.
                </p>
            </center>
            <center> <button class="btn btn-dark"><a href="index.php" style="color:white; text-decoration:none">Go
                        Back</a></button></center>
        </div>
    </div>

</body>

</html>