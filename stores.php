<style>
    <?php include "stylephp.css"; ?>
</style>

<?php
    include "db_connect.php";
    
    echo "<h2> All stores in our inventory </h2>";
    //select statement
    $sql = "SELECT A.str, B.city, A.zipcode, B.street, B.addr, B.state from proj_str A NATURAL JOIN proj_str_locate B ";
    
    $result = $mysqli->query($sql); //hold in result

    echo "<a href = 'index.php'> Return to main page </a>";

    if ($result->num_rows > 0) { //if there's an answer
        echo "
            <table border = '3'>
            <tr class='title'>
            <th>Store Num</th>
            <th>City</th>
            <th>Zipcode</th>
            <th>Street</th>
            <th>Address Num</th>
            <th>State</th>
            </tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) { //display it
        
            echo "<tr>";
            echo "<td>" . $row['str'] . "</td>";
            echo "<td>" . $row['city'] . "</td>";
            echo "<td>" . $row['zipcode'] . "</td>";
            echo "<td>" . $row['street'] . "</td>";
            echo "<td>" . $row['addr'] . "</td>";
            echo "<td>" . $row['state'] . "</td>";
            echo "</tr>";
    }
    } else {
    echo "No results";
    }
?>