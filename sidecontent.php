<div id="sidecontent" style="width:25%;height:auto;padding-right:8px">
    <h4> Top Listings:</h4>
    <hr>
    <?php

    $sql = "SELECT id,photo,name,price FROM tbl_property where side=1";
    $result = $conn->query($sql);

    while ($rows = $result->fetch_assoc()) {

    ?>


    <div class="sideimage" style="padding-left: 5px;">

        <a href="<?php echo 'admin/images/' . $rows['photo']; ?> "><img
                src=" <?php echo 'admin/images/' . $rows['photo']; ?>" style="width:300px;height:200px"></a>
        <br>
        <b>Price :</b>
        <?php echo $rows['price']; ?>/per month<br><br>

        <a href="detail.php?id=<?php echo $rows['id']; ?>"><button type="button" class="btn btn-dark"
                id="more"><span>View
                    Detail</span></button></a><br>
    </div>





    <?php
    }
    ?>
</div>