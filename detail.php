<?php
session_start();
include("include/connection.php");


$id = isset($_GET['id']) ? $_GET['id'] : 0;

if ($id == 0) {
    header("location:display.php");
}
$sql = "SELECT * FROM tbl_property WHERE id=$id";
$sql1 = "select p.*,b.p_id from tbl_property p left join tbl_booking b on p.id=b.p_id where p.id=$id";


$result = $conn->query($sql1);
// echo "<pre>"; print_r($result); die();

?>








<html>

<head>
    <title>Detail</title>
    <link rel="stylesheet" href="web_project/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include("include/header.php"); ?>
    <div id="wrapper">


        <div id="content">
            <div id="main" style="width: 65%; float:left;">
                <br><br>
                <?php if ($result->num_rows > 0) {

                    while ($rows = $result->fetch_assoc()) {
                ?>
                <center>
                    <h3 style="color:#000; font-size:20px"><?php echo $rows['name']; ?>&nbsp;For Rent in
                        <?php echo $rows['location']; ?></h3>
                </center>
                <div class="image1">
                    <img src=" <?php echo 'admin/images/' . $rows['photo']; ?> " height=400px width=700px style="
          box-shadow: 4px 4px 4px #787878;"><br><br>

                    <br><br>

                    <!-- <div id="description"> -->
                    <h3><u>House Detail:</u></h3><br><?php if ($rows['p_id'] != NULL) {
                                                                    echo '<span style="color:#C92D0C;font-size:18px">Sold Out</span>';
                                                                } ?>
                    <table class="table table-striped" cellspacing="1px" cellpadding="12px" style="width:70% ">
                        <tr>
                            <td> <b>Name:</b> </td>
                            <td><?php echo $rows['name']; ?></td>
                        </tr>

                        <tr>
                            <td><b> Size:</b></td>
                            <td> <?php echo $rows['size']; ?>sq.ft</td>
                        </tr>
                        <tr>
                            <td><b>No of Bathrooms:</b> </td>
                            <td><?php echo $rows['bathrooms']; ?></td>
                        </tr>
                        <tr>
                            <td><b>No of rooms:</b></td>
                            <td> <?php echo $rows['rooms']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Location:</b></td>
                            <td> <?php echo $rows['location']; ?></td>
                        </tr>

                        <tr>
                            <td><b>Owner email:</b> </td>
                            <td><?php echo $rows['email']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Owner phone:</b> </td>
                            <td><?php echo $rows['phone']; ?></td>
                        </tr>

                        <tr>
                            <td><b>Price:</b> </td>
                            <td> Rs.<?php echo $rows['price']; ?>/per month</td>
                        </tr>
                    </table><br>
                    <a href="display.php"><button class="btn btn-dark" id="more" style="margin-right:3px;">Go
                            Back</button></a>
                    <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 'login') {
                                if ($rows['p_id'] == "") { ?>
                    <a href="book.php?id=<?php echo $rows['id']; ?>"><button type="button" class="btn btn-dark"
                            id="more"><span>Book Now</span></button></a><br><br>
                    <?php }
                            }
                        }
                    } ?>

                </div>
            </div>

            <?php include("sidecontent.php"); ?>
        </div>
    </div>
    <?php include("include/footer.php"); ?>

</body>

</html>