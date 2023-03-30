<?php 

    require("connect_database.php");
    $Unit = $_POST['unit'];

    $insert_unit = "INSERT INTO unit(Unit_name) VALUES ('$Unit')";

    if($connect->multi_query($insert_unit) === TRUE)
    {
        echo "New records created successfully";
        require("setting_Unit.php");
        return 0;
    }
    else
        echo "Error: " . $insert_unit . "<br>" . $connect->error;

    
?>