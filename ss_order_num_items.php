<style>
    <?php include "stylephp.css"; ?>
</style>

<?php
    include "db_connect.php";

    $search_order = $_GET["order_num"];
    
    echo "<h2> Order $search_order: Items being ordered </h2>";
    //select statement
    $sql = "SELECT A.i_num, C.i_name, A.qty_ordered from proj_shipment A 
    JOIN proj_order B on A.order_num = B.order_num AND A.i_num = B.i_num 
    JOIN proj_item C on C.i_num = A.i_num AND B.str = C.str WHERE A.order_num = $search_order ";
    $result = $mysqli->query($sql); //hold in result

    echo "<a href = 'index.php'> Return to main page </a>";

    if ($result->num_rows > 0) { //if there's an answer
        echo "
            <table border = '3'>
            <tr class='title'>
            <th>Item Num</th>
            <th>Item Name</th>
            <th>Quantity Ordered</th>
            </tr>";
            
    // output data of each row
    while($row = $result->fetch_assoc()) { //display it

            echo "<tr>";
            echo "<td>" . $row['i_num'] . "</td>";
            echo "<td>" . $row['i_name'] . "</td>";
            echo "<td>" . $row['qty_ordered'] . "</td>";
            echo "</tr>";
    }
    } else {
    echo "No results";
    }
?>