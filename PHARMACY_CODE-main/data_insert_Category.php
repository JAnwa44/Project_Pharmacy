<?php 

    require("connect_database.php");
    $Category = $_POST['Category'];

    $insert_Category = "INSERT INTO category(Cate_name) VALUES ('$Category')";

    if($connect->multi_query($insert_Category) === TRUE)
    {
        echo "New records created successfully";
        require("setting_Category.php");
        return 0;
    }
    else
        echo "Error: " . $insert_Category . "<br>" . $connect->error;

    
?>