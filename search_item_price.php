<style>
    <?php include "stylephp.css"; ?>
</style>

<?php
    include "db_connect.php";

    if(isset($_POST['price_input']))
    {
        $search_price = $_POST['price_input'];
    }
    if(isset($_POST['compare'])){
        $search_price_compare = $_POST['compare'];
    }
    
    if($search_price_compare == 'less')
    {
        echo "<h2> Search inventory with price less than $$search_price </h2>";
        //select statement
        $sql = "SELECT i_num, i_name, i_price, str from proj_item WHERE i_price < $search_price ";
    }
    elseif($search_price_compare == 'more')
    {
        echo "<h2> Search inventory with price greater than $$search_price </h2>";
        //select statement
        $sql = "SELECT i_num, i_name, i_price, str from proj_item WHERE i_price > $search_price ";
    }
    $result = $mysqli->query($sql); //hold in result

    echo "<a href = 'index.php'> Return to main page </a>";

    if ($result->num_rows > 0) { //if there's an answer
        echo "
            <table border = '3'>
            <tr class='title'>
            <th>Item Num</th>
            <th>Name</th>
            <th>Price</th>
            <th>Store Num</th>
            </tr>";
            
        while($row = $result->fetch_assoc())
        {

            echo "<tr>";
            echo "<td>" . $row['i_num'] . "</td>";
            echo "<td>" . $row['i_name'] . "</td>";
            echo "<td>" . $row['i_price'] . "</td>";
            echo "<td>" . $row['str'] . "</td>";
            echo "</tr>";
        }
    } else {
    echo "No results";
    }
?>