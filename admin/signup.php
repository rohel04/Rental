<?php
include("include/connection.php");

if (isset($_POST["submit"])) {
    $name = $_POST['fname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $dob = $_POST['dob'];

    if ($password != $cpassword) {
        echo '<script language="javascript">';
        echo 'alert("Password not matched.")';
        echo '</script>';
    } else {


        $sql = "INSERT INTO tbl_admin(username,password,fname,email,dob,city,country) Values ('$username','$password','$name','$email','$dob','$city','$country')";
        if ($conn->query($sql) == TRUE) {
            header('location: login.php');
        }
    }
}


?>

<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="admin/css/style1.css">
</head>

<body style="background-image: url('design/login.jpg');">


    <div id=" content">
        <div id="signup">

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <h3> SIGN UP </h3>
                    <p>
                        <label for="Name">Full name:</label>
                        <input type="text" name="fname">
                    </p>
                    <p>
                        <label for="country">Country:</label>
                        <input type="text" name="country">
                    </p>
                    <p>
                        <label for="city">City: </label>
                        <input type="text" name="city">
                    </p>
                    <p>
                        <label for="dob">Date of Birth: </label>
                        <input type="date" name="dob">
                    </p>

                    <p>
                        <label for="email">Email:</label>
                        <input type="email" name="email">
                    </p>
                    <p>
                        <label for="username">Username:</label>
                        <input type="text" name="username">
                    </p>

                    <p>
                        <label for="password"> Password: </label>
                        <input type="password" name="password">
                    </p>
                    <p>
                        <label for="cpassword">Confirm Password: </label>
                        <input type="password" name="cpassword">
                    </p>

                    <input type="submit" name="submit" value="Sign Up">



                </fieldset>



            </form>
        </div>
    </div>

</body>

</html>