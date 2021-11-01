<?php
include("include/connection.php");


?>
<html>

<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Display</title>
</head>

<body>
    <div id="wrapper">
        <?php
        include('include/header1.php');


        $sql = "SELECT * FROM tbl_property ORDER BY id DESC ";
        $result = $conn->query($sql);
        ?>
        <div id="content">
            <center>
                <table class="table table-bordered" cellpadding="6px" style="width:85%;font-size:14px">
                    <tr>
                        <th class="table-dark">SN</th>

                        <th class="table-dark">Name</th>
                        <th class="table-dark">Size (sq.ft)</th>
                        <th class="table-dark">O.Email</th>
                        <th class="table-dark">O.Phone</th>
                        <th class="table-dark">No of bathrooms</th>
                        <th class="table-dark">No of rooms</th>
                        <th class="table-dark">Location</th>
                        <th class="table-dark">Photo</th>
                        <th class="table-dark">Price (Rs.)/month</th>
                        <th class="table-dark">Action</th>

                    </tr>
                    <?php
                    $i = 1;
                    while ($rows = $result->fetch_assoc()) {

                        $id = $rows['id'];
                        $photo = $rows['photo'];
                        if ($photo != '') {
                            $display_image = 'images/' . $photo;
                        } else {
                            $display_image = 'images/noimage.png';
                        }
                    ?>



                    <tr>
                        <td><?php echo $i; ?></td>

                        <td><?php echo $rows['name']; ?></td>

                        <td><?php echo $rows['size']; ?></td>
                        <td><?php echo $rows['email']; ?></td>
                        <td><?php echo $rows['phone']; ?></td>
                        <td><?php echo $rows['bathrooms']; ?></td>
                        <td><?php echo $rows['rooms']; ?></td>
                        <td><?php echo $rows['location']; ?></td>
                        <td><img src="<?php echo $display_image; ?>" width="50" height="50" /></td>
                        <td><?php echo $rows['price']; ?></td>
                        <td style="width: 15%;">
                            <a href="editar.php?id=<?php echo $rows['id']; ?>"><button type="button"
                                    class="btn btn-primary btn-sm" style="color:white;margin:1px">Edit</button></a><a
                                href="delete.php?id=<?php echo $rows['id']; ?>"
                                onClick="return confirm_delete()"><button type="button" class="btn btn-danger btn-sm"
                                    style="color:white; margin:1px">Delete</button></a>

                        </td>
                    </tr>

                    <?php

                        $i++;
                    }

                    ?>



                </table>
            </center>
        </div>




    </div>

</body>

</html>
<script language="javascript">
function confirm_delete() {
    var $report = confirm("Are you sure you want to delete this record!!!");
    return $report;
}
</script>