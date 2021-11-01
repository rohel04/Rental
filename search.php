<?php
session_start();
include("include/connection.php");
$search = $_POST['roll_no'];


// $sql1 = "select p.*,b.p_id from tbl_property p left join tbl_booking b on p.id=b.p_id";

?>
<html>

<head>
    <link rel="stylesheet" href="web_project/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Display</title>
</head>

<body>
    <?php
    include("include/header.php");
    ?>
    <div id="banner">
        <img class="myslide" src="design/banner3.jpg" style="height: 200px;"></a>
        <!-- <center> <a href="display.php"><button class="banbutton"><B>CHECK NOW</B></button></a></center> -->

    </div>
    <div id="wrapper">

        <div id="content">
            <center>
                <h2 style="color: #474747;font-size:22px"> List of Houses</h2>
            </center>
            <br>
            <div id="search" style="height: 120px;">
                <center>

                    <div class="container">
                        <form class="form-inline" method="post" action="search.php">
                            <input type="text" name="roll_no" class="form-control" placeholder="Search roll no..">
                            <button type="submit" name="save" class="btn btn-dark">Search</button>
                        </form>
                    </div>
                </center>

                <center>
                    <div id="sort" style="float:right; padding-right:10% ">

                        <span class="font-weight-bold sort-font">Sort by:</span>
                        <a href="h2l.php" class="sort-font">High to low</a>&nbsp;|
                        <a href="l2h.php" class="sort-font">Low to high</a>

                    </div>
                </center>
            </div>




            <!-- </center> -->

            <?php

            // $sql = "SELECT id,photo,name,status,price FROM tbl_property right join tbl_booking on tbl_booking.p_id=tbl_property.id ";
            $sql = "select * from tbl_property where name=$search";
            $result = $conn->query($sql);

            while ($rows = $result->fetch_assoc()) {

            ?>

            <div class="image">
                <img src=" <?php echo 'admin/images/' . $rows['photo']; ?>">

                <div id="description">
                    <br><br>
                    <h4 style="color: #474747;font-size:20px">Description &nbsp;<?php
                                                                                    if ($rows['p_id'] != NULL) {
                                                                                        echo  '<span style="color:#C92D0C">Sold Out</span>';
                                                                                    }
                                                                                    ?></h4><br>

                    <table class="table table-success table-striped table-bordered" cellspacing="2px" cellpadding="8px"
                        style="width:90%; font-size:15px; font-family:opensans-regular, sans-serif">
                        <tr>
                            <td> <b>Name :</b></td>
                            <td><?php echo $rows['name']; ?></td>
                        </tr>
                        <tr>
                            <td> <b>Status :</b> </td>
                            <td><?php echo $rows['status']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Price :</b></td>
                            <td><?php echo $rows['price']; ?>/per month</td>
                        </tr>

                    </table>
                    <br>
                    <a href="detail.php?id=<?php echo $rows['id']; ?>"><button type="button" class="btn btn-dark"
                            id="more" style="margin-right:3px;"><span>View
                                Detail</span></button></a>

                    <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 'login') {
                            if ($rows['p_id'] == "") {
                        ?>
                    <a href="detail.php?id=<?php echo $rows['id']; ?>"><button type="button" class="btn btn-dark"
                            id="more"><span>Book Now</span></button></a><br><br>
                    <?php
                            }
                        } ?>

                </div>

            </div>



            <?php
            }
            ?>
        </div>

    </div>
    <?php include("include/footer.php"); ?>
</body>

</html>
<script>
$(document).ready(function() {
    $("#sorting").change(function() {
        // var province_id = $(this).val();
        location.href = $(this).val();
    });
});
</script>