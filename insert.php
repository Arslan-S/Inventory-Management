<style>
    <?php include "stylephp.css"; ?>
</style>

<?php
    include "db_connect.php";

    if(isset($_POST['num']))
    {
        $item_num = $_POST['num'];
    }
    if(isset($_POST['name']))
    {
        $item_name = $_POST['name'];
    }
    if(isset($_POST['max']))
    {
        $max_qty = $_POST['max'];
    }
    if(isset($_POST['price']))
    {
        $item_price = $_POST['price'];
    }
    if(isset($_POST['type']))
    {
        $item_type = $_POST['type'];
    }
    if(isset($_POST['store']))
    {
        $store_select = $_POST['store'];
    }
    
    if($store_select == '1' || $store_select == '2' || $store_select == '3')
    {
        //select statement
        $sql = "INSERT INTO proj_item (i_num, i_name, max_qty, i_price, i_type, str, id) VALUES ('$item_num', '$item_name', '$max_qty', '$item_price', '$item_type', '$store_select', NULL) ";
        $sql1 = "INSERT INTO proj_rating (i_num, str, id) VALUES ('$item_num', '$store_select', NULL) ";
        $sql2 = "INSERT INTO proj_quantity (i_num, qty, str, id) VALUES ('$item_num', '$max_qty', '$store_select', NULL) ";
        $result = $mysqli->query($sql); //hold in result
        $result1 = $mysqli->query($sql1); //hold in result
        $result2 = $mysqli->query($sql2); //hold in result
    }
    elseif($store_select == 'all')
    {
        //select statement
        $sql1 = "INSERT INTO proj_item (i_num, i_name, max_qty, i_price, i_type, str, id) VALUES ('$item_num', '$item_name', '$max_qty', '$item_price', '$item_type', '1', NULL) ";
        $sql2 = "INSERT INTO proj_rating (i_num, str, id) VALUES ('$item_num', '1', NULL) ";
        $sql3 = "INSERT INTO proj_quantity (i_num, qty, str, id) VALUES ('$item_num', '$max_qty', '1', NULL) ";

        $result1 = $mysqli->query($sql1); //hold in result
        $result2 = $mysqli->query($sql2); //hold in result
        $result3 = $mysqli->query($sql3); //hold in result

        $sql4 = "INSERT INTO proj_item (i_num, i_name, max_qty, i_price, i_type, str, id) VALUES ('$item_num', '$item_name', '$max_qty', '$item_price', '$item_type', '2', NULL) ";
        $sql5 = "INSERT INTO proj_rating (i_num, str, id) VALUES ('$item_num', '2', NULL) ";
        $sql6 = "INSERT INTO proj_quantity (i_num, qty, str, id) VALUES ('$item_num', '$max_qty', '2', NULL) ";

        $result4 = $mysqli->query($sql4); //hold in result
        $result5 = $mysqli->query($sql5); //hold in result
        $result6 = $mysqli->query($sql6); //hold in result

        $sql7 = "INSERT INTO proj_item (i_num, i_name, max_qty, i_price, i_type, str, id) VALUES ('$item_num', '$item_name', '$max_qty', '$item_price', '$item_type', '3', NULL) ";
        $sql8 = "INSERT INTO proj_rating (i_num, str, id) VALUES ('$item_num', '3', NULL) ";
        $sql9 = "INSERT INTO proj_quantity (i_num, qty, str, id) VALUES ('$item_num', '$max_qty', '3', NULL) ";

        $result7 = $mysqli->query($sql7); //hold in result
        $result8 = $mysqli->query($sql8); //hold in result
        $result9 = $mysqli->query($sql9); //hold in result
    }

    echo "<h2>Item inserted</h2><br>";
    echo "<a href = 'index.php'> Return to main page </a>";

?>