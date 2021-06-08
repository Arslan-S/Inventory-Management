<style>
    <?php include "stylephp.css"; ?>
</style>

<?php
    include "db_connect.php";

    $search_delivery = $_GET["delivery"];
    
    echo "<h2> Search inventory with delivery $search_delivery </h2>";
    //select statement
    $sql = "SELECT A.i_num, B.i_name, A.qty,  B.max_qty, A.i_dlvry, A.str from proj_quantity A 
    JOIN proj_item B on A.i_num = B.i_num AND A.str = B.str WHERE A.i_dlvry = '$search_delivery' ";
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
            <th>Delivery</th>
            <th>Store Num</th>
            </tr>";
            
    // output data of each row
    while($row = $result->fetch_assoc()) { //display it

            echo "<tr>";
            echo "<td>" . $row['i_num'] . "</td>";
            echo "<td>" . $row['i_name'] . "</td>";
            echo "<td>" . $row['qty'] . "</td>";
            echo "<td>" . $row['max_qty'] . "</td>";
            echo "<td>" . $row['i_dlvry'] . "</td>";
            echo "<td>" . $row['str'] . "</td>";
            echo "</tr>";
    }
    } else {
    echo "No results";
    }
?>