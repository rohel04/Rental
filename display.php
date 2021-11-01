<?php
session_start();
include("include/connection.php");
$result = $conn->query("select * from tbl_poperty");

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
        <img class="myslide" src="design/bannerdis2.jpg"
            style="height: 260px;background-color: rgba(251, 251, 251, 0.2)"></a>
        <!-- <center> <a href="display.php"><button class="banbutton"><B>CHECK NOW</B></button></a></center> -->

    </div>
    <div id="wrapper">

        <div id="content">

            <center>
                <h2 style="color: #474747;font-size:22px"> List of Houses</h2>
            </center><br>

            <div id="search" style="height: 120px;background-color:#F5F2F1">
                <div class="container-fluid" style="width:100%;  padding-left:40%">

                    <form class="d-flex" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input class="form-control me-2" type="search" placeholder="Search name, location"
                            aria-label="Search" name="search" style="width:31%">
                        <button class="btn btn-outline-dark btn-sm" type="submit" name="bsearch">Search</button>
                    </form>

                </div>


                <center>
                    <div id="sort" style="float:right; padding-right:7%;">
                        <span class="font-weight-bold sort-font">Sort by Price:</span>
                        <span><select class="form-select" id="s1" aria-label="Default select example"
                                onchange="redirect()">
                                <option selected>Price</option>
                                <option value="one">High-Low</option>
                                <option value="two">Low-High</option>

                            </select></span>

                        <!-- <span class="font-weight-bold sort-font">Sort by Price:</span>
                        <a href="h2l.php" class="sort-font">High to low</a>&nbsp;|
                        <a href="l2h.php" class="sort-font">Low to high</a> -->

                    </div>
                </center>
            </div>




            <!-- </center> -->

            <?php

            // $sql = "SELECT id,photo,name,status,price FROM tbl_property right join tbl_booking on tbl_booking.p_id=tbl_property.id ";
            if (isset($_POST['bsearch'])) {
                $hname = $_POST['search'];

                $sql = "select p.*,b.p_id from tbl_property p left join tbl_booking b on p.id=b.p_id  where name like '%$hname%' OR location like '%$hname%' order by id DESC ";
                // $result = $conn->query($sql);
                // if (mysqli_num_rows($result) < 0) {
                //     echo 'No data';
                // }
            } else {
                $sql = "select p.*,b.p_id from tbl_property p left join tbl_booking b on p.id=b.p_id order by id DESC";
            }
            $result = $conn->query($sql);

            if ($result->num_rows <= 0) {
                echo "<center>No Match Found</center>";
            }
            while ($rows = $result->fetch_assoc()) {

            ?>

            <div class="image">
                <a href="<?php echo 'admin/images/' . $rows['photo']; ?> "><img
                        src=" <?php echo 'admin/images/' . $rows['photo']; ?>" style="
          box-shadow: 4px 4px 4px #787878;"></a>

                <div id="description">
                    <br><br>
                    <h4 style="color: #474747;font-size:20px">Description &nbsp;<?php
                                                                                    if ($rows['p_id'] != NULL) {
                                                                                        echo  '<span style="color:#B72507">Rented Out</span></button>';
                                                                                    }
                                                                                    ?></h4><br>

                    <table class="table table-success table-striped table-bordered" cellspacing="2px" cellpadding="8px"
                        style="width:90%; font-size:15px; font-family:opensans-regular, sans-serif">
                        <tr>
                            <td> <b>Name :</b></td>
                            <td><?php echo $rows['name']; ?></td>
                        </tr>
                        <tr>
                            <td> <b>Location :</b> </td>
                            <td><?php echo $rows['location']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Price :</b></td>
                            <td><?php echo $rows['price']; ?>/per month</td>
                        </tr>

                    </table>

                    <a href="detail.php?id=<?php echo $rows['id']; ?>"><button type="button" class="btn btn-dark"
                            id="more" style="margin-right:3px;"><span>View
                                Detail</span></button></a>

                    <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 'login') {

                        ?>
                    <?php if ($rows['p_id'] == NULL) { ?>
                    <a href="book.php?id=<?php echo $rows['id']; ?>"><button type="button" class="btn btn-dark"
                            id="more"><span>Book Now</span></button></a><br><br>
                    <?php } else { ?>
                    <a href="book.php?id=<?php echo $rows['id']; ?>"><button type="button" class="btn btn-dark"
                            id="more" disabled><span>Book Now</span></button></a><br><br>

                    <?php
                            }
                        }
                        ?>



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
function redirect() {
    switch (document.getElementById('s1').value) {
        case "one":
            window.location = "h2l.php";
            break;

        case "two":
            window.location = "l2h.php";
            break;
    }
}
</script>