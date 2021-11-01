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


        $sql = "SELECT * FROM tbl_user ";
        $result = $conn->query($sql);
        ?>
        <div id="content">
            <center>
                <table class="table table-bordered" cellpadding="6px" style="width:80%;font-size:14px">
                    <tr>
                        <th class="table-dark">SN</th>
                        <th class="table-dark">ID</th>
                        <th class="table-dark">Username</th>
                        <th class="table-dark">Password</th>
                        <th class="table-dark">Name</th>
                        <th class="table-dark">Email</th>
                        <th class="table-dark">Action</th>

                    </tr>
                    <?php
                    $i = 1;
                    while ($rows = $result->fetch_assoc()) {


                    ?>



                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $rows['id']; ?></td>
                        <td><?php echo $rows['username']; ?></td>
                        <td><?php echo $rows['md5pass']; ?></td>
                        <td><?php echo $rows['fname']; ?></td>
                        <td><?php echo $rows['email']; ?></td>

                        <td>
                            <a href="delete_user.php?id=<?php echo $rows['id']; ?>"
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
    var $report = confirm("Are you sure you want to delete this user!!!");
    return $report;
}
</script>