<?php 
    require("connect_database.php");

    $Unit_ID = $_POST['Unit_ID'];


    $De_Unit = "DELETE FROM unit WHERE Unit_ID='$Unit_ID'";
    $Delete_Unit = $connect->query($De_Unit);
    
    if($Delete_Unit)
    {
        echo 'Data Deleted';
        require("setting_Unit.php");
        return 0;
    }else
        echo 'Data Not Deleted';

    $connect->close();

?>