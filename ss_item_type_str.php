<style>
    <?php include "stylephp.css"; ?>
</style>

<?php
    include "db_connect.php";

    if(isset($_POST['store']))
    {
        $search_store = $_POST['store'];
    }
    if(isset($_POST['type']))
    {
        $search_i_type = $_POST['type'];
    }

    echo "<h2> Search inventory in store $search_store where the type is '$search_i_type' </h2>";

    $sql = "SELECT A.i_num, B.i_name, A.qty, A.max_qty, B.i_price, C.i_rating from proj_inventory A 
    JOIN proj_item B on A.i_num = B.i_num AND B.i_type = '$search_i_type' AND A.str = B.str 
    JOIN proj_rating C on C.i_num = A.i_num AND C.str = B.str WHERE A.str = $search_store ";
    
    $result = $mysqli->query($sql); //hold in result

    echo "<a href = 'index.php'> Return to main page </a>";

    //MAKE IF STATEMENT
    if ($result->num_rows > 0) { //if there's an answer
        echo "
            <table border = '3'>
            <tr class='title'>
            <th>Item Num</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Max Quantity</th>
            <th>Price</th>
            <th>Rating</th>
            </tr>";
            
    // output data of each row
    while($row = $result->fetch_assoc()) { //display it

            echo "<tr>";
            echo "<td>" . $row['i_num'] . "</td>";
            echo "<td>" . $row['i_name'] . "</td>";
            echo "<td>" . $row['qty'] . "</td>";
            echo "<td>" . $row['max_qty'] . "</td>";
            echo "<td>" . $row['i_price'] . "</td>";
            echo "<td>" . $row['i_rating'] . "</td>";
            echo "</tr>";
    }
    } else {
    echo "No results";
    }
?>