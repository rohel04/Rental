<?php
session_start();
include("include/connection.php");


?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KTM House Rental</title>
    <link rel="icon" href="/your_path_to_image/favicon.jpg">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="web_project/css/bootstrap.css">

</head>

<body>
    <?php include("include/header.php"); ?>
    <div id="banner">
        <img class="myslide" src="design/banner10.png">
        <!-- <center> <a href="display.php"><button class="banbutton"><B>CHECK NOW</B></button></a></center> -->

    </div>
    <div id="wrapper">

        <div id="content">



            <center>
                <h2 style="color: #474747;font-size:22px">Latest available houses</h2><br>

            </center>
            <div class="container-fluid" style="width:100%;  padding-left:38%">

                <form class="d-flex" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Search name, location"
                        aria-label="Search" name="search" style="width:35%">
                    <button class="btn  btn-outline-dark btn-sm" type="submit" name="bsearch">Search</button>
                </form>

            </div>



            <?php
            if (isset($_POST['bsearch'])) {
                $hname = $_POST['search'];

                $sql = "select p.*,b.p_id from tbl_property p left join tbl_booking b on p.id=b.p_id  where name like '%$hname%' OR location like '%$hname%' order by id DESC ";
            } else {
                $sql = "select p.*,b.p_id from tbl_property p left join tbl_booking b on p.id=b.p_id where home=1 order by id DESC";
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
                <br><br>

                <div id="description">
                    <h4 style="color: #474747;font-size:20px">Description &nbsp;<?php
                                                                                    if ($rows['p_id'] != NULL) {
                                                                                        echo  '<span style="color:#B72507;font-size:16px">Rented Out</span></button>';
                                                                                    }
                                                                                    ?></h4>


                    <table class="table table-success table-striped table-bordered" cellspacing="0px" cellpadding="10px"
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
            <!-- <br><Br><br><br><br><br>
            <a href="display.php"><button id="more"><span>View more</span>
                </button></a><br><br> -->
        </div>


    </div>

    <?php include("include/footer.php"); ?>
</body>

</html>