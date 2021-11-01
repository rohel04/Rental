<?php
include("include/connection.php");

?>
<html>

<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Message</title>
</head>

<body>
    <div id="wrapper">
        <?php
        include("include/header1.php");


        $sql = "SELECT * FROM tbl_contact ORDER BY id DESC";
        $result = $conn->query($sql);
        ?>
        <div id="content">
            <center>
                <table class="table table-bordered" cellpadding="2px" style="width:80%;font-size:15px">
                    <tr>
                        <th class="table-dark">SN</th>
                        <th class="table-dark">ID</th>
                        <th class="table-dark">Name</th>
                        <th class="table-dark">Email</th>
                        <th class="table-dark">Message</th>
                        <th class="table-dark">Action</th>

                    </tr>
                    <?php
                    $i = 1;
                    while ($rows = $result->fetch_assoc()) {

                        $id = $rows['id'];

                    ?>



                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $rows['id']; ?></td>
                        <td><?php echo $rows['name']; ?></td>
                        <td><?php echo $rows['email']; ?></td>
                        <td><?php echo $rows['message']; ?></td>
                        <td>
                            <a href="view_message.php?id=<?php echo $rows['id']; ?>"><button type="button"
                                    class="btn btn-primary btn-sm" style="color:white">View</button></a>

                            <a href="delete_message.php?id=<?php echo $rows['id']; ?>"
                                onClick="return confirm_delete()"><button type="button" class="btn btn-danger btn-sm" ">Delete</button></a>



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
<script language=" javascript">
                                    function confirm_delete() {
                                    var $report = confirm("Are you sure you want to delete this message!!!");
                                    return $report;
                                    }
                                    </script>