<?php

    require("connect_database.php");

// $sql = "DELETE FROM employee WHERE userid='" . $_GET["No"] . "'";
// $result = mysqli_query($connect, $sql);
// if ($result) {
//     echo "Record deleted successfully";
// } else {
//     echo "Error deleting record: " . mysqli_error($connect);
// }
// mysqli_close($connect);


    $No = $_POST['No'];

    $query = "DELETE FROM temporary_sale WHERE No='$No' ";
    $query_run = mysqli_query($connect, $query);

    if($query_run)
    {
        echo 'Data Deleted';
        require("sale_data.php");
    }else
    {
        echo 'Data Not Deleted';
    }


?>