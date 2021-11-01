<?php
include("include/connection.php");

if (isset($_POST["submit"])) {
    $name = $_POST['fname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password1 = $password;
    $md5pass = md5($password);
    $cpassword = $_POST['cpassword'];
    $sql4 = "SELECT * FROM tbl_user WHERE username='$username'";
    $result3 = $conn->query($sql4);
    if ($result3->num_rows > 0) {
        echo '<script language="javascript">';
        echo 'alert("Username already taken. Try another")';
        echo '</script>';
        header("location:sorryreg.php");
    } else {

        $sql = "INSERT INTO tbl_user(username,password,md5pass,fname,email) Values ('$username','$password1','$md5pass','$name','$email')";
        if ($conn->query($sql) == TRUE) {
            header('location: u_login.php');
        }
    }
}



?>

<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="admin/css/style.css">
    <link rel="stylesheet" href="web_project/css/bootstrap.css">
    <script>
    function fvalid() {

        var name = document.forms["add"]["fname"].value;
        var email = document.forms["add"]["email"].value;
        var username = document.forms["add"]["username"].value;
        var password = document.forms["add"]["password"].value;
        var cpassword = document.forms["add"]["cpassword"].value;
        var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
        var valemail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (name == "") {
            alert("Name is empty");
            return false;
        }
        if (email == "") {
            alert("Email is empty");
            return false;
        }
        if (!email.match(valemail)) {
            alert("Email is invalid");
            return false;
        }
        if (username == "") {
            alert("Username is empty");
            return false;
        }

        if (password == "") {
            alert("Password is empty");
            return false;
        }
        if (cpassword == "") {
            alert("Please confirm password");
            return false;
        }
        // if (password.length != 8) {
        //     alert("Password must be 8 digit");
        //     return false;
        // }
        if (!password.match(passw)) {
            alert("Password format incorrect");
            return false;
        }
        if (!password.match(cpassword)) {
            alert("Password not matched");
            return false;
        }


    }
    </script>
</head>

<body>

    <?php include("include/header.php"); ?>

    <div id="wrapper">
        <div id=" content"
            style="background-image: url('design/log12.jpg'); padding-left:30px; padding-top:50px; padding-bottom:30px;height:700px;width:1349px;margin:auto">
            <div id="register">

                <form name="add" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return fvalid()"
                    style="padding-left: 5%; padding-top:3%; padding-bottom:2%; font-size:16px; background-color: black; width:1000px;opacity:0.8;margin:auto">
                    <fieldset>
                        <h3 style="color: white;"> Register for booking </h3><br>
                        <p>
                            <label for="Name" style="color: white;">Full name:</label>
                            <input class="form-control" type="text" name="fname" style="width:250px">
                        </p>
                        <p>
                            <label for="email" style="color: white;">Email:</label>
                            <input class="form-control" type="text" name="email" style="width:250px">
                        </p>
                        <p>
                            <label for="username" style="color: white;">Username</label>
                            <input class="form-control" type="text" name="username" style="width:250px">
                        </p>
                        <p>
                            <label for="password" style="color: white;">Password: </label>
                            <input class="form-control" type="password" name="password" style="width:250px">
                        <h5 style="color:tomato; font-size:10px"><i>*password must be 6-20 character, at least one
                                numeric digit, one uppercase and one
                                lowercase*</i>
                            <h5>
                                </p>

                                <p>
                                    <label for="c_password" style="color: white;font-size:14px">Confirm
                                        Password:</label>
                                    <input class="form-control" type="password" name="cpassword" style="width:250px">
                                </p>


                                <button class="btn btn-light" name="submit" id="submit">Register</button></a>



                    </fieldset>



                </form>
            </div>
        </div>
    </div>
    <?php include("include/footer.php") ?>

</body>

</html>