<style>
    <?php include "stylephp.css"; ?>
</style>

<?php
    include "db_connect.php";

    $search_item_name = $_GET["item_name"];
    
    echo "<h2> Search inventory with item name $search_item_name </h2>";
    //select statement
    $sql = "SELECT A.i_num, A.i_name, B.qty, A.max_qty, B.i_dlvry, C.i_rating, 
    C.i_dmnd, A.i_price, A.i_type, A.str from proj_item A JOIN proj_quantity B on 
    A.i_num = B.i_num AND A.str = B.str JOIN proj_rating C on A.i_num = C.i_num AND A.str = C.str where A.i_name = '$search_item_name' ";
    $result = $mysqli->query($sql); //hold in result

    echo "<a href = 'index.php'> Return to main page </a>";

    if ($result->num_rows > 0) { //if there's an answer
        echo "
            <table border = '3'>
            <tr class='title'>
            <th>Item Num</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Max Quantity</th>
            <th>Price</th>
            <th>Delivery</th>
            <th>Demand</th>
            <th>Rating</th>
            <th>Type</th>
            <th>Store Num</th>
            </tr>";
        while($row = $result->fetch_assoc())
        {

            echo "<tr>";
            echo "<td>" . $row['i_num'] . "</td>";
            echo "<td>" . $row['i_name'] . "</td>";
            echo "<td>" . $row['qty'] . "</td>";
            echo "<td>" . $row['max_qty'] . "</td>";
            echo "<td>" . $row['i_price'] . "</td>";
            echo "<td>" . $row['i_dlvry'] . "</td>";
            echo "<td>" . $row['i_dmnd'] . "</td>";
            echo "<td>" . $row['i_rating'] . "</td>";
            echo "<td>" . $row['i_type'] . "</td>";
            echo "<td>" . $row['str'] . "</td>";
            echo "</tr>";
        }
    } else {
    echo "No results";
    }
?>