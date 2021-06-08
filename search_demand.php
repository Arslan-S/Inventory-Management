<style>
    <?php include "stylephp.css"; ?>
</style>

<?php
    include "db_connect.php";

    $search_demand = $_GET["demand"];
    
    echo "<h2> Search inventory with demand $search_demand </h2>";
    //select statement
    $sql = "SELECT A.i_num, B.i_name, A.i_rating, A.i_dmnd, A.str from proj_rating A 
    JOIN proj_item B on A.i_num = B.i_num AND A.str = B.str WHERE A.i_dmnd = '$search_demand' ";
    $result = $mysqli->query($sql); //hold in result

    echo "<a href = 'index.php'> Return to main page </a>";

    if ($result->num_rows > 0) { //if there's an answer
        echo "
            <table border = '3'>
            <tr class='title'>
            <th>Item Num</th>
            <th>Name</th>
            <th>Rating</th>
            <th>Demand</th>
            <th>Store Num</th>
            </tr>";
            
    // output data of each row
    while($row = $result->fetch_assoc()) { //display it

            echo "<tr>";
            echo "<td>" . $row['i_num'] . "</td>";
            echo "<td>" . $row['i_name'] . "</td>";
            echo "<td>" . $row['i_rating'] . "</td>";
            echo "<td>" . $row['i_dmnd'] . "</td>";
            echo "<td>" . $row['str'] . "</td>";
            echo "</tr>";
    }
    } else {
    echo "No results";
    }
?>