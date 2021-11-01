<?php
include("include/connection.php");

if (isset($_POST["submit"])) {
    $name = $_POST["fname"];

    $size = $_POST["size"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $b_room = $_POST["broom"];
    $room = $_POST["room"];
    $location = $_POST["location"];
    $price = $_POST["price"];
    $photo = $_FILES['photo']['name'];
    $home = $_POST['home'];
    $side = $_POST['side'];


    move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $_FILES['photo']['name']);

    $sql = "INSERT INTO tbl_property (name,size,price,email,phone,bathrooms,rooms,location,photo,home,side) VALUES ('$name','$size','$price','$email','$phone','$b_room','$room','$location','$photo','$home','$side')";

    if ($conn->query($sql) == TRUE) {
        header('location: propertyset.php');
    } else {
        echo "not added";
    }
}
?>

<html>

<head>
    <title>Add Property</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="web_project/css/bootstrap.css">

    <script>
    function fvalidation() {

        var name = document.forms["add"]["fname"].value;
        var email = document.forms["add"]["email"].value;
        var size = document.forms["add"]["size"].value;
        var phone = document.forms["add"]["phone"].value;
        var price = document.forms["add"]["price"].value;
        var broom = document.forms["add"]["broom"].value;
        var room = document.forms["add"]["room"].value;
        var location = document.forms["add"]["location"].value;
        var photo = document.forms["add"]["photo"].value;
        var valemail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var valphone = /^([0-9]{10})$/;
        if (name == "") {
            alert("Name is empty");
            return false;
        }
        //----name----
        if (email == "") {
            alert("Email is empty");
            return false;
        }
        if (!email.match(valemail)) {

            alert("Please enter valid email");
            return false;
        }
        //-----email---
        if (isNaN(size)) { //is_nan in php
            alert("Enter size in number");
            return false;
        }
        if (size == "") {
            alert("Size is empty");
            return false;
        }
        //----size---
        if (phone == "") {
            alert("Phone is empty");
            return false;
        }
        if (!phone.match(valphone)) {
            alert("Enter valid phone number");
            return false;
        }
        //---phone----
        if (isNaN(price)) {
            alert("Enter price in number");
            return false;
        }
        if (price == "") {
            alert("Price is empty");
            return false;
        }
        //---price---
        if (broom == "") {
            alert("Bathroom number is empty");
            return false;
        }
        //----broom---
        if (room == "") {
            alert("Room number is empty");
            return false;
        }
        //----room---
        if (location == "") {
            alert("Location is empty");
            return false;
        }
        //---location--
        if (photo == "") {
            alert("Please upload photo");
            return false;
        }
        //--photo---




    }
    </script>
</head>

<body>
    <div id="wrapper">
        <?php include("include/header1.php"); ?>
        <div id="content" style="background-color: #AAAAAA;">
            <form id="form1" name="add" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return fvalidation()"
                method="post" enctype="multipart/form-data" style="font-size: 14px;">


                <p>
                    <label for="Name">Name: </label>
                    <input class="form-control" type="text" name="fname" id="fname">
                </p>

                <p>
                    <label for="Size">Size (in sq.ft):</label>
                    <input class="form-control" type="text" name="size" id="size">
                </p>
                <p>
                    <label for="O_email">Owner email:</label>
                    <input class="form-control" type="text" name="email" id="email">
                </p>
                <p>
                    <label for="O_phone">Owner mobile phone: </label>
                    <input class="form-control" type="text" name="phone" id="phone">
                </p>
                <p>
                    <label for="B_room">Bathrooms: </label>
                    <input class="form-control" type="number" name="broom" id="broom">
                </p>
                <p>
                    <label for="Room">Rooms: </label>
                    <input class="form-control" type="number" name="room" id="room">
                </p>
                <p>
                    <label for="Location">Location:</label>
                    <input class="form-control" type="text" name="location" id="location">
                </p>
                <p>
                    <label for="Price">Price (per month):</label>
                    <input class="form-control" type="text" name="price" id="price">
                </p>
                <p>
                    <label for="Photo">Upload photo</label>
                    <input class="form-control" type="file" name="photo">
                </p>
                <p>
                    <label for="home">Display in homepage</label>
                    <input type="radio" name="home" value="1">Yes
                    <input type="radio" name="home" value="0">No


                </p>
                <p>
                <p>
                    <label for="home">Display in sidebar</label>
                    <input type="radio" name="side" value="1">Yes
                    <input type="radio" name="side" value="0">No


                </p>
                <p>
                    <button name="submit" class="btn btn-dark" id="submit">Submit</button>
                    <button name="reset" class="btn btn-dark" id="reset">Reset</button>
                </p>


                </p>



            </form>
        </div>

    </div>

</body>

</html>