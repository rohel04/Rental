<?php
// session_start();
include("include/connection.php");



if (isset($_REQUEST['logout']) && $_SESSION['login']) {
    unset($_SESSION['login']);
    session_destroy();
}

if (isset($_SESSION['login']) && $_SESSION['login'] == 'login') {

    $log_in_out = '<a href="index.php?logout">[ LogOut ]</a>';
} else {

    $log_in_out = '<a href="login.php">[ Login ]</a>';
}

?>




<html>

<head>
    <title>Dash</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="wrapper">
        <?php include("include/header1.php"); ?>
        <!-- <div id="content"> -->
        <div id="dashmenu">
            <center>
                <div id="dash">


                    <h3>Dashboard/My Dashboard</h3><br><Br>
                    <ul>
                        <p>

                            <li><a href="add.php">Add House</a>
                            </li>

                            <br>
                        </p>

                        <p>
                            <li><a href="edit1.php">Edit House detail</a></li>
                            <br>
                        </p>
                        <p>
                            <li><a href="delete1.php">Delete House</a><br>
                            </li><br>
                        </p>


                    </ul>
                    <!-- </div> -->


                </div><br><br>

                <li class="logintext">&nbsp;<?php echo $log_in_out; ?></li>


            </center>


        </div>
        <?php include("include/footer.php"); ?>


</body>

</html>