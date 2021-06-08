<style>
    <?php include "stylephp.css"; ?>
</style>

<?php
    include "db_connect.php";

    if(isset($_POST['rating_input']))
    {
        $search_rating = $_POST['rating_input'];
    }
    if(isset($_POST['compare']))
    {
        $search_rating_compare = $_POST['compare'];
    }

    if($search_rating_compare == 'equal')
    {
        echo "<h2> Search inventory with rating $search_rating </h2>";
        //select statement
        $sql = "SELECT A.i_num, B.i_name, A.i_rating, A.i_dmnd, A.str from proj_rating A 
        JOIN proj_item B on A.i_num = B.i_num AND A.str = B.str WHERE A.i_rating = $search_rating ";
    }
    elseif($search_rating_compare == 'less')
    {
        echo "<h2> Search inventory with rating less than $search_rating </h2>";
        //select statement
        $sql = "SELECT A.i_num, B.i_name, A.i_rating, A.i_dmnd, A.str from proj_rating A 
        JOIN proj_item B on A.i_num = B.i_num AND A.str = B.str WHERE A.i_rating < $search_rating ";
    }
    elseif($search_rating_compare == 'more')
    {
        echo "<h2> Search inventory with rating greater than $search_rating </h2>";
        //select statement
        $sql = "SELECT A.i_num, B.i_name, A.i_rating, A.i_dmnd, A.str from proj_rating A 
        JOIN proj_item B on A.i_num = B.i_num AND A.str = B.str WHERE A.i_rating > $search_rating ";
    }
    $result = $mysqli->query($sql); //hold in result

    echo "<a href = 'index.php'> Return to main page </a>";

    //MAKE IF STATEMENT
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