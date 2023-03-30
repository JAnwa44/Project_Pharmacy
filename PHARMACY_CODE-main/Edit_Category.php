<?php
    require("connect_database.php");

    $Cate_ID = $_POST['Cate_ID'];
    $Category_name = $_POST['Category_name'];

    $up_Category = "UPDATE category SET Cate_name = '$Category_name'
                            WHERE Cate_ID='$Cate_ID'";

    $Update_Category = $connect->query($up_Category);

    if($Update_Category)
    {
        echo "Record updated successfully";
        require("setting_Category.php");
        return 0;
    }
?>