<?php
// if (isset($_REQUEST['logout']) && $_SESSION['login']) {
//     unset($_SESSION['login']);
//     session_destroy();
// }
if (isset($_SESSION['login']) && $_SESSION['login'] == 'login') {
    $welcome_msg = ($_SESSION['name'] != '') ? 'Welcome, ' . $_SESSION['name'] : '';
    $log_in_out = '<a href="logout.php">[ LogOut ]</a>';
} else {
    $welcome_msg = '';
    $log_in_out = '<a href="register.php">Register Now</a><a href="u_login.php">[ Login ]</a>';
}
?>



<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="web_project/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<div id="header">
    <div id="logo">
        <a href="index.php"><img src="design/logosm3.jpg" style="height: 100px; width:200px"></a>

    </div>
    <!--logo-->

    <nav class="navbar  navbar-dark bg-dark" id="nav">
        <center>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li><a href="index.php">Home</a></li>
                <li><a href="display.php">All Properties</a></li>
                <li><a href="about.php">About Us</a></li>

                <li><a href="contact.php">Contact Us</a></li>



                <li> <?php echo $log_in_out; ?></li>







                <!-- <li id="login"><a href="signup.php">[Sign up]</a></li> -->


            </ul>

        </center>
        <ul>
            <li style="color:white;float:right;padding-right:6px"> <?php echo $welcome_msg; ?></li>
        </ul>

    </nav>
    <!--nav-->


    <!--banner-->
</div>
<!--header-->