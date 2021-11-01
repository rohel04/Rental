<?php
include("include/connection.php");

$id = isset($_GET['id']) ? $_GET['id'] : 0;
if ($id == 0) {
    header("location:message.php");
}
$sql = "SELECT * FROM tbl_contact WHERE id=$id";
$result = $conn->query($sql);
?>

<html>

<head>
    <title>
        Message
    </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="web_project/css/bootstrap.css">
</head>

<body>
    <div id="content" style="height:300px; width:50%;padding-left:20px; background-color:burlywood; top:50%">
        <?php
        while ($rows = $result->fetch_assoc()) {
        ?>
        <h3><?php echo $rows['name']; ?></h3>
        <table cellpadding=10px>
            <tr>
                <td>Email:</td>
                <td> <?php echo $rows['email']; ?></td>
            </tr>
            <tr>
                <td> Message:</td>
                <td><?php echo $rows['message']; ?></td>
            </tr>
        </table>
        <br><br>
        <a href="message.php"><button class="btn btn-dark">Go Back</button></a>
        <?php
        } ?>
    </div>

</body>

</html>