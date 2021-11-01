<?php
session_start();
?>
<html>

<head>
    <title>Contact Us</title>
    <script>
    function fun_validation() {

        var name = document.forms["contact"]["fname"].value;
        var email = document.forms["contact"]["email"].value;
        var message = document.forms["contact"]["content"].value;
        var valemail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (name == "") {
            alert("Name is empty");
            return false;
        }

        if (!email.match(valemail)) {
            alert("Invalid email address");
            return false;
        }
        if (email == "") {
            alert("Email is empty");
            return false;
        }
        if (message == "") {
            alert("Message is empty");
            return false;
        }
    }
    </script>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="web_project/css/bootstrap.css">

</head>

<body>
    <?php include("include/header.php"); ?>
    <div id="wrapper">
        <div id="content"
            style="background-image: url('design/contact.jpg'); height:auto; padding-left:30px; padding-top:50px; padding-bottom:30px">
            <H3 style="color:#000">Contact Us</H3>
            <p style="color:#000">Please fill out the quick form and we will be in touch.</p><br>
            <form id="form" name="contact" action="thankyou.php" onsubmit="return fun_validation()" method="post"
                style="font-size: 14px; height:auto; opacity:0.9">


                <p>
                    <label for="Name">Name: </label>
                    <input class="form-control" type="text" name="fname" id="fname">
                </p>


                <p>
                    <label for="email">Email:</label>
                    <input class="form-control" type="text" name="email" id="email">
                </p>
                <p>
                    <label for="message"> Message: </label><br>
                    <textarea name="content" rows="4" cols="6" style="width: 50%"></textarea>
                </p>
                <br><br>
                <p>
                    <button name="submit" class="btn btn-dark" id="submit">Submit</button>
                    <button name="reset" class="btn btn-dark" id="reset">Reset</button>
                </p>


                </p>



            </form>
            <br><br>


        </div>
        <?php include("include/footer.php"); ?>

</body>

</html>