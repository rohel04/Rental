<?php
session_start();
include("include/connection.php");
$date = date("y-m-d");
//------user id---
$user_id = $_SESSION['user_id'];
//-----property id----
$id = isset($_GET['id']) ? $_GET['id'] : 0;

if ($id == 0) {
    header("location:sorry.php");
}



// $sql1 = "select p.*,b.p_id from tbl_property p left join tbl_booking b on p.id=b.p_id where p.id=$id";
// if ($result->num_rows > 0) {
//     $id = $_GET['id'];
//--property----//
$sql = "SELECT * FROM tbl_property WHERE id=$id";
$result = $conn->query($sql);
while ($rows = $result->fetch_assoc()) {
    $name = $rows['name'];
    $id = $rows['id'];
    $photo = $rows['photo'];
    // echo $name;
    // echo $id;
}
//------user info---
$sql1 = "SELECT * FROM tbl_user WHERE id=$user_id";
$result2 = $conn->query($sql1);
while ($rs = $result2->fetch_assoc()) {
    $fname = $rs['fname'];
    $email = $rs['email'];
}

//---insert in booking--
if (isset($_POST["submit"])) {
    $name = $_POST["fullname"];
    $email = $_POST["email"];
    $id = $_POST['hname'];

    // $sql4 = "SELECT * FROM tbl_booking WHERE p_name='$email'";
    // $result3 = $conn->query($sql4);
    // if ($result3->num_rows > 0) {
    //     echo '<script language="javascript">';
    //     echo 'alert("Invalid password or username. Try again")';
    //     echo '</script>';
    //     header("location:sorry.php");
    // } else {



    $sql3 = "INSERT INTO tbl_booking (user_id,p_id,p_name,date) VALUES('$user_id','$id','$email','$date')";
    // $result3 = $conn->query($sql3);
    if ($conn->query($sql3) == TRUE) {
        header("location:thankbook.php");
    }
}

?>







<html>

<head>
    <title>Detail</title>
    <link rel="stylesheet" href="web_project/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include("include/header.php"); ?>
    <div id="banner">
        <!-- <img class="myslide" src="design/booking2.jpg" style="height: 350px;"></a> -->
        <!-- <center> <a href="display.php"><button class="banbutton"><B>CHECK NOW</B></button></a></center> -->

    </div>
    <div id="wrapper">


        <div id="content"
            style="background-image: url('design/book.jpg'); height:auto; padding-left:30px; padding-top:50px; padding-bottom:30px">
            <fieldset style="width:900px; margin:auto">
                <h4 style="color:chocolate">Booking Now</h4>


                <form name="add" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"
                    style="height:400px;padding-left:4%;padding-top:3%; background-color:#EEECEC; font-size:16px;opacity:0.9">
                    <p>
                        <img src="<?php echo 'admin/images/' . $photo; ?>" width="300" height="300"
                            style="float:right;padding-right:3%;padding-bottom:20px">
                    </p>
                    <p>
                    <h4> <label for="hname">House Name:</label>
                        <input class="form-control" type="text" name="hname" id="hname" value="<?php echo $id; ?>"
                            hidden>
                        <?php echo $name; ?>
                    </h4>
                    </p><br>

                    <p>
                        <label for="name">Full Name:</label>
                        <input class="form-control" type="text" name="fullname" id="fname"
                            value="<?php echo $fname; ?>">
                    </p>

                    <p>
                        <label for="email">Email:</label>
                        <input class="form-control" type="text" name="email" id="email" value="<?php echo $email; ?>">
                    </p>
                    <p>
                        <label for="date">Date:</label>
                        <input class="form-control" type="text" name="date" id="date" value="<?php echo $date; ?>"
                            readonly>
                    </p>
                    <p>
                        <button name="submit" class="btn btn-dark" id="submit">Book Now</button>

                    </p>


                </form>
            </fieldset>
        </div>


    </div>
    <?php include("include/footer.php"); ?>

</body>

</html>