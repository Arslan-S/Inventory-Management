<style>
    <?php include "stylephp.css"; ?>
</style>

<?php
    include "db_connect.php";

    $search_order_num = $_GET["order_num"];
    
    echo "<h2> Search inventory with order num $search_order_num </h2>";
    //select statement
    $sql = "SELECT distinct A.order_num, A.date_placed, A.arrival, B.str from proj_transport A 
    JOIN proj_order B on A.order_num = B.order_num WHERE A.order_num = $search_order_num ";
    $result = $mysqli->query($sql); //hold in result

    echo "<a href = 'index.php'> Return to main page </a>";

    if ($result->num_rows > 0) { //if there's an answer
        echo "
            <table border = '3'>
            <tr class='title'>
            <th>Order Num</th>
            <th>Date Placed</th>
            <th>Arrival Date</th>
            <th>Store Num</th>
            </tr>";
            
        while($row = $result->fetch_assoc())
        {

            echo "<tr>";
            echo "<td>" . $row['order_num'] . "</td>";
            echo "<td>" . $row['date_placed'] . "</td>";
            echo "<td>" . $row['arrival'] . "</td>";
            echo "<td>" . $row['str'] . "</td>";
            echo "</tr>";
        }
    } else {
    echo "No results";
    }
?>