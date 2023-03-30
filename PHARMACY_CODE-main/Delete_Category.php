<?php 
    require("connect_database.php");

    $Cate_ID = $_POST['Cate_ID'];


    $De_Category = "DELETE FROM category WHERE Cate_ID='$Cate_ID'";
    $Delete_Category = $connect->query($De_Category);
    
    if($Delete_Category)
    {
        echo 'Data Deleted';
        require("setting_Category.php");
        return 0;
    }else
        echo 'Data Not Deleted';

    $connect->close();

?>