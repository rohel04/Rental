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


        $sql = "SELECT * FROM tbl_booking LEFT JOIN tbl_user ON tbl_booking.user_id=tbl_user.id LEFT JOIN tbl_property ON tbl_booking.p_id=tbl_property.id ";
        $result = $conn->query($sql);
        ?>
        <div id="content">
            <center>
                <table class="table table-bordered" cellpadding="6px" style="width:84%;font-size:14px">
                    <tr>
                        <th class="table-dark">SN</th>
                        <th class="table-dark">User</th>
                        <th class="table-dark">Full Name</th>
                        <th class="table-dark">Email</th>
                        <th class="table-dark">Property</th>
                        <th class="table-dark">Booking date</th>



                        <th class="table-dark">Action</th>
                    </tr>
                    <?php
                    $i = 1;
                    while ($rows = $result->fetch_assoc()) {


                    ?>



                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $rows['username']; ?></td>
                        <td><?php echo $rows['fname']; ?></td>
                        <td><?php echo $rows['p_name']; ?></td>
                        <td><?php echo $rows['name']; ?></td>
                        <td><?php echo $rows['date']; ?></td>





                        <td>
                            <a href="delete_booking.php?b_id=<?php echo $rows['b_id']; ?>"
                                onClick="return confirm_delete()"><button type="button"
                                    class="btn btn-danger btn-sm">Delete</button></a>

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
    var $report = confirm("Are you sure you want to delete this Booking!!!");
    return $report;
}
</script>