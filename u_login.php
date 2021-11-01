<?php

session_start();
include("include/connection.php");

if (isset($_POST['submit']) && $_POST['submit'] == '1') {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    $sql = "SELECT * FROM tbl_user where username='$user' and password='$pass'";

    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    if ($result->num_rows > 0) {
        // $id = $_GET['id'];

        $_SESSION['login'] = 'login';
        $_SESSION['user'] = $row['username'];
        $_SESSION['name'] = $row['fname'];
        $_SESSION['user_id'] = $row['id'];
        header("Location: index.php");
        //echo "<script>window.location.href = 'index.php';</script>";
    } else {
        echo '<script language="javascript">';
        echo 'alert("Invalid password or username. Try again")';
        echo '</script>';
    }
}

?>




<html>

<head>
    <title>LogIn</title>
    <link rel="stylesheet" href="css/style.css">
    <ink rel="stylesheet" href="web_project/css/bootstrap.css">
</head>

<body>
    <?php include("include/header.php"); ?>
    <div id="banner">
        <!-- <img class="myslide" src="design/booking2.jpg" style="height: 350px;"></a> -->
        <!-- <center> <a href="display.php"><button class="banbutton"><B>CHECK NOW</B></button></a></center> -->

    </div>
    <div id="wrapper">
        <div id=" content"
            style="background-image: url('design/log12.jpg'); padding-left:30px; padding-top:50px; padding-bottom:30px;height:600px;width:1349px;margin:auto">


            <br>


            <!-- <div id="login" style="height: auto; padding-top:3%"> -->
            <fieldset>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"
                    style="font-size:16px;height:400px;width:900px;padding-left:4%;padding-top:3%;background-color:black;opacity:0.8;margin:auto">
                    <h2 style="color:white">Login</h2><br>
                    <p>
                        <label for="username" style="color:white" sty>Username: </label><br>
                        <input class="form-control" type="text" name="username" placeholder="Username"
                            style="width:250px">
                    </p>
                    <p>
                        <label for="password" style="color:white">Password:</label><br>
                        <input class="form-control" type="password" name="password" placeholder="password"
                            style="width:250px">
                    </p>

                    <button class="btn btn-light" name="submit" id="submit">LOGIN</button></a>
                    <input type="hidden" name="submit" value="1">
            </fieldset>






            </form>
            <!-- </div> -->

        </div>

    </div>
    <?php include("include/footer.php"); ?>

</body>


</html>