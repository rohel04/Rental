<?php
session_start();
if (isset($_SESSION['login1']) && $_SESSION['login1'] == 'login1') {
    $welcome_msg = ($_SESSION['username'] != '') ? 'Welcome, ' . $_SESSION['username'] : '';
    $log_in_out = '<a href="index.php">[ LogOut ]</a>';
} else {
    $welcome_msg = '';
    $log_in_out = '<a href="index.php">[ Login ]</a>';
}
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="web_project/css/bootstrap.css">
</head>


<nav class="navbar navbar-dark bg-dark" id="nav">
    <center>
        <ul>
            <li><a href="propertyset.php">View</a></li>
            <li><a href="add.php">Add Houses</a></li>
            <li><a href="message.php">Messages</a></li>
            <li><a href="user.php">Users</a></li>
            <li><a href="bookinglist.php">Booking</a></li>

            <li class="logintext">&nbsp;<?php echo $log_in_out; ?></li>



            <!-- <li id="login"><a href="signup.php">[Sign up]</a></li> -->


        </ul>
    </center>

</nav>