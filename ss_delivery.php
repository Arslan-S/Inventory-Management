<style>
    <?php include "stylephp.css"; ?>
</style>

<?php
    include "db_connect.php";

    if(isset($_POST['store']))
    {
        $search_store = $_POST['store'];
    }
    if(isset($_POST['compare']))
    {
        $search_rating_compare = $_POST['compare'];
    }

    if($search_rating_compare == 'Y')
    {
        echo "<h2> Search inventory in store $search_store where they need delivery </h2>";
    }
    elseif($search_rating_compare == 'N')
    {
        echo "<h2> Search inventory in store $search_store where they don't need delivery </h2>";
    }
    $sql = "SELECT A.i_num, B.i_name, A.qty, B.max_qty from proj_quantity A JOIN proj_item B on A.i_num = B.i_num 
    AND A.i_dlvry = '$search_rating_compare' AND A.str = B.str WHERE A.str = $search_store ";
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
            </tr>";
            
    // output data of each row
    while($row = $result->fetch_assoc()) { //display it

            echo "<tr>";
            echo "<td>" . $row['i_num'] . "</td>";
            echo "<td>" . $row['i_name'] . "</td>";
            echo "<td>" . $row['qty'] . "</td>";
            echo "<td>" . $row['max_qty'] . "</td>";
            echo "</tr>";
    }
    } else {
    echo "No results";
    }
?>