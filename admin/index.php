<?php
session_start();
include("include/connection.php");

if (isset($_POST['submit']) && $_POST['submit'] == '1') {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    $sql = "SELECT * FROM tbl_admin where username='$user' and password='$pass'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);


    if ($count == 1) {
        $_SESSION['login1'] = 'login1';
        $_SESSION['username'] = $row['username'];
        $_SESSION['fname'] = $row['fname'];
        header('location:propertyset.php');
    } else {
        echo '<script language="javascript">';
        echo 'alert("Invalid password or username. Try again")';
        echo '</script>';
        unset($_SESSION['login']);
        session_destroy();
    }
}

?>




<html>

<head>
    <title>LogIn</title>
    <link rel="stylesheet" href="css/style1.css">
    <ink rel="stylesheet" href="web_project/css/bootstrap.css">
</head>

<body style="background-color:black" ;>

    <div id=" content">
        <div id="login">
            <fieldset>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                    <center>
                        <div id="logo">
                            <img src="design/profile1.jpg" width=100px height=100px>
                        </div>
                    </center><br><br>
                    <p>
                        <label for="username">Username: </label><br>
                        <input class="form-control" type="text" name="username" placeholder="Username">
                    </p>
                    <p>
                        <label for="password">Password:</label><br>
                        <input type="password" name="password" placeholder="password">
                    </p>

                    <input type="submit" name="submit" value="LOGIN">
                    <input type="hidden" name="submit" value="1">
            </fieldset>

        </div>

    </div>
</body>



</form>


</body>


</html>