<?php
//ob_start();
include("include/connection.php");



$id = $_REQUEST['id'];
if (empty($id)) {
    header("location:propertyset.php");
}

$sql = "SELECT * FROM tbl_property WHERE id='$id'";
$result = $conn->query($sql);
// $rs = $result->fetch_assoc();
// echo "<pre>";
// print_r($rs); 
if ($result->num_rows > 0) {
    while ($rs = $result->fetch_assoc()) {
        $name = $rs["name"];

        $size = $rs["size"];
        $email = $rs["email"];
        $phone = $rs["phone"];
        $b_room = $rs["bathrooms"];
        $room = $rs["rooms"];
        $location = $rs["location"];
        $price = $rs["price"];
        $photo = $rs["photo"];
        $home = $rs['home'];
        $side = $rs['side'];
    }
}


if (isset($_POST["submit"])) {
    $name = $_POST["fname"];

    $size = $_POST["size"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $b_room = $_POST["broom"];
    $room = $_POST["room"];
    $location = $_POST["location"];
    $price = $_POST["price"];
    $uploadedphoto = $_FILES['photo']['name'];
    $home = $_POST['home'];
    $side = $_POST['side'];
    if ($uploadedphoto == '') {
        $newphoto =  $photo;
    } else {
        $newphoto = $uploadedphoto;
        //upload photo
        $tpath = "images/";
        $tpath = $tpath . basename($_FILES["photo"]["name"]);
        move_uploaded_file($_FILES['photo']['tmp_name'], $tpath);
        // @unlink($photo);
    }




    $sql = "UPDATE tbl_property SET name='$name',size='$size',email='$email',phone='$phone',bathrooms='$b_room',rooms='$room',location='$location',price='$price',photo='$newphoto',home='$home',side='$side' where id='$id'";

    if ($conn->query($sql) == TRUE) {
        echo "<script type= 'text/javascript'>alert('Record updated successfully');</script>";
        header('location:propertyset.php');
    } else {
        echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }
    // echo "<script>
    //                     window.location = 'display.php';
    //           </script>";

}
?>


<html>

<head>

    <head>
        <title>Edit </title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="web_project/css/bootstrap.css">

    </head>
</head>

<body>
    <div id="wrapper">
        <?php include("include/header1.php"); ?>
        <div id="content" style="background-color: #AAAAAA;">
            <form id="form1" name="editproperty" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"
                enctype="multipart/form-data" style="font-size: 14px;">
                <fieldset>
                    <input type="text" name="id" value="<?php echo $id; ?>">
                    <p>
                        <label for="Name">Name: </label>
                        <input class="form-control" type="text" name="fname" id="fname" value="<?php echo $name; ?>">
                    </p>

                    <p>
                        <label for="Size">Size (in sq.ft):</label>
                        <input class="form-control" type="text" name="size" id="size" value="<?php echo $size; ?>">
                    </p>
                    <p>
                        <label for=" O_email">Owner email:</label>
                        <input class="form-control" type="email" name="email" id="email" value="<?php echo $email; ?>">
                    </p>
                    <p>
                        <label for=" O_phone">Owner phone: </label>
                        <input class="form-control" type="text" name="phone" id="phone" value="<?php echo $phone; ?>">
                    </p>
                    <p>
                        <label for=" B_room">Bathrooms: </label>
                        <input class="form-control" type="number" name="broom" id="broom"
                            value="<?php echo $b_room; ?>">
                    </p>
                    <p>
                        <label for=" Room">Rooms: </label>
                        <input class="form-control" type="number" name="room" id="room" value="<?php echo $room; ?>">
                    </p>
                    <p>
                        <label for=" Location">location:</label>
                        <input class="form-control" type="text" name="location" id="location"
                            value="<?php echo $location; ?>">
                    </p>
                    <p>
                        <label for=" Price">Price:</label>
                        <input class="form-control" type="text" name="price" id="price" value="<?php echo $price; ?>">
                    </p>
                    <p>
                        <label for=" Photo">Upload photo</label>
                        <input class="form-control" type="file" name="photo">
                        <?php
                        if ($photo != '') { ?>
                        <img src="<?php echo 'images/' . $photo; ?>" width="100" height="100">
                        <?php
                        }
                        ?>
                    </p>
                    <p>
                        <label for="home">Display in homepage</label>
                        <input type="radio" name="home" value="1" <?php if ($home == 1) { ?> checked <?php } ?>>Yes
                        <input type="radio" name="home" value="0" <?php if ($home == 0) { ?> checked <?php } ?>>No


                    </p>
                    <p>
                        <label for="home">Display in sidebar</label>
                        <input type="radio" name="side" value="1" <?php if ($side == 1) { ?> checked <?php } ?>>Yes
                        <input type="radio" name="side" value="0" <?php if ($side == 0) { ?> checked <?php } ?>>No


                    </p>
                    <p>
                        <button class="btn btn-dark" type=" submit" name="submit" value="Submit">Submit</button>
                        <button class="btn btn-dark" type=" reset" name="reset" value="Reset">Reset</button>
                    </p>

                </fieldset>
            </form>
        </div>
    </div>
</body>

</html>