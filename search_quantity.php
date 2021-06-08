<style>
    <?php include "stylephp.css"; ?>
</style>

<?php
    include "db_connect.php";

    if(isset($_POST['qty'])){
        $search_percent = $_POST['qty'];
    }
    if(isset($_POST['compare'])){
        $search_compare = $_POST['compare'];
    }
    
    if($search_compare == 'equal' && $search_percent == 100)
    {
        echo "<h2> Search inventory with quantity equal to $search_percent% </h2>";
        //select statement
        $sql = "SELECT A.i_num, B.i_name, A.qty, A.max_qty, A.str from proj_inventory A 
        JOIN proj_item B on A.i_num = B.i_num AND A.str = B.str WHERE A.qty = A.max_qty ";
    }
    elseif($search_compare == 'equal' && $search_percent == 75)
    {
        echo "<h2> Search inventory with quantity equal to $search_percent% </h2>";
        //select statement
        $sql = "SELECT A.i_num, B.i_name, A.qty, A.max_qty, A.str from proj_inventory A 
        JOIN proj_item B on A.i_num = B.i_num AND A.str = B.str WHERE A.qty = 3*(A.max_qty/4) ";
    }
    elseif($search_compare == 'equal' && $search_percent == 50)
    {
        echo "<h2> Search inventory with quantity equal to $search_percent% </h2>";
        //select statement
        $sql = "SELECT A.i_num, B.i_name, A.qty, A.max_qty, A.str from proj_inventory A 
        JOIN proj_item B on A.i_num = B.i_num AND A.str = B.str WHERE A.qty = (A.max_qty/2) ";
    }
    elseif($search_compare == 'equal' && $search_percent == 25)
    {
        echo "<h2> Search inventory with quantity equal to $search_percent% </h2>";
        //select statement
        $sql = "SELECT A.i_num, B.i_name, A.qty, A.max_qty, A.str from proj_inventory A 
        JOIN proj_item B on A.i_num = B.i_num AND A.str = B.str WHERE A.qty = (A.max_qty/4) ";
    }
    elseif($search_compare == 'less' && $search_percent == 100)
    {
        echo "<h2> Search inventory with quantity less than $search_percent% </h2>";
        //select statement
        $sql = "SELECT A.i_num, B.i_name, A.qty, A.max_qty, A.str from proj_inventory A 
        JOIN proj_item B on A.i_num = B.i_num AND A.str = B.str WHERE A.qty < A.max_qty ";
    }
    elseif($search_compare == 'less' && $search_percent == 75)
    {
        echo "<h2> Search inventory with quantity less than $search_percent% of the max</h2>";
        //select statement
        $sql = "SELECT A.i_num, B.i_name, A.qty, A.max_qty, A.str from proj_inventory A 
        JOIN proj_item B on A.i_num = B.i_num AND A.str = B.str WHERE A.qty < 3*(A.max_qty/4) ";
    }
    elseif($search_compare == 'less' && $search_percent == 50)
    {
        echo "<h2> Search inventory with quantity less than $search_percent% of the max </h2>";
        //select statement
        $sql = "SELECT A.i_num, B.i_name, A.qty, A.max_qty, A.str from proj_inventory A 
        JOIN proj_item B on A.i_num = B.i_num AND A.str = B.str WHERE A.qty < (A.max_qty/2) ";
    }
    elseif($search_compare == 'less' && $search_percent == 25)
    {
        echo "<h2> Search inventory with quantity less than $search_percent% of the max</h2>";
        //select statement
        $sql = "SELECT A.i_num, B.i_name, A.qty, A.max_qty, A.str from proj_inventory A 
        JOIN proj_item B on A.i_num = B.i_num AND A.str = B.str WHERE A.qty < (A.max_qty/4) ";
    }
    elseif($search_compare == 'more' && $search_percent == 100)
    {
        echo "<h2> Search inventory with quantity more than $search_percent% </h2>";
        //select statement
        $sql = "SELECT A.i_num, B.i_name, A.qty, A.max_qty, A.str from proj_inventory A 
        JOIN proj_item B on A.i_num = B.i_num AND A.str = B.str WHERE A.qty > A.max_qty ";
    }
    elseif($search_compare == 'more' && $search_percent == 75)
    {
        echo "<h2> Search inventory with quantity more than $search_percent% of the max</h2>";
        //select statement
        $sql = "SELECT A.i_num, B.i_name, A.qty, A.max_qty, A.str from proj_inventory A 
        JOIN proj_item B on A.i_num = B.i_num AND A.str = B.str WHERE A.qty > 3*(A.max_qty/4) ";
    }
    elseif($search_compare == 'more' && $search_percent == 50)
    {
        echo "<h2> Search inventory with quantity more than $search_percent% of the max</h2>";
        //select statement
        $sql = "SELECT A.i_num, B.i_name, A.qty, A.max_qty, A.str from proj_inventory A 
        JOIN proj_item B on A.i_num = B.i_num AND A.str = B.str WHERE A.qty > (A.max_qty/2) ";
    }
    elseif($search_compare == 'more' && $search_percent == 25)
    {
        echo "<h2> Search inventory with quantity more than $search_percent% of the max</h2>";
        //select statement
        $sql = "SELECT A.i_num, B.i_name, A.qty, A.max_qty, A.str from proj_inventory A 
        JOIN proj_item B on A.i_num = B.i_num AND A.str = B.str WHERE A.qty > (A.max_qty/4) ";
    }
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
            <th>Store Num</th>
            </tr>";
            
        while($row = $result->fetch_assoc())
        {

            echo "<tr>";
            echo "<td>" . $row['i_num'] . "</td>";
            echo "<td>" . $row['i_name'] . "</td>";
            echo "<td>" . $row['qty'] . "</td>";
            echo "<td>" . $row['max_qty'] . "</td>";
            echo "<td>" . $row['str'] . "</td>";
            echo "</tr>";
        }
    } else {
    echo "No results";
    }
?>