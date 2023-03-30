<?php
    require("connect_database.php");

    $Unit_ID = $_POST['Unit_ID'];
    $unit = $_POST['unit'];

    $up_Unit = "UPDATE unit SET Unit_name = '$unit'
                            WHERE Unit_ID='$Unit_ID'";

    $Update_Unit = $connect->query($up_Unit);

    if($Update_Unit)
    {
        echo "Record updated successfully";
        require("setting_Unit.php");
        return 0;
    }
?>