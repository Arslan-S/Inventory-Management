<style>
    <?php include "stylephp.css"; ?>
</style>

<?php
    include "db_connect.php";

    $search_i_type = $_GET["item_type"];
    
    echo "<h2> Search inventory with item type $search_i_type </h2>";
    //select statement
    $sql = "SELECT distinct i_num, i_name, i_type FROM proj_item WHERE i_type = '$search_i_type' ";
    $result = $mysqli->query($sql); //hold in result

    echo "<a href = 'index.php'> Return to main page </a>";

    if ($result->num_rows > 0) { //if there's an answer
        echo "
            <table border = '3'>
            <tr class='title'>
            <th>Item Num</th>
            <th>Name</th>
            <th>Type</th>
            </tr>";
            
    // output data of each row
    while($row = $result->fetch_assoc()) { //display it

            echo "<tr>";
            echo "<td>" . $row['i_num'] . "</td>";
            echo "<td>" . $row['i_name'] . "</td>";
            echo "<td>" . $row['i_type'] . "</td>";
            echo "</tr>";
    }
    } else {
    echo "No results";
    }
?>