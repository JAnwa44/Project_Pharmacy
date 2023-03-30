<?php

    function Update_Quantity($Pro_ID, $quantity, $price)
    {
        require("connect_database.php");

        $up_product = "UPDATE product SET
                                    Quantity = '$quantity',
                                    Price = '$price'
                                        WHERE Pro_ID='$Pro_ID'";

        $Update_Product = $connect->query($up_product);

        if($Update_Product)
            return 0;
        else
            echo "Error updating record: ".$connect->error; 

        return 0;
    }

    require("connect_database.php");

    $Brand_name = $_POST["Brand_name"];
    $medicine_name = $_POST["medicine_name"];
    $ID_medicine = $_POST["ID_medicine"];
    $quantity = $_POST["quantity"];
    $Unit = $_POST["Unit"];
    $Cate_name = $_POST["Cate_name"];
    $price = $_POST["price"];
    $MFG = $_POST["MFG"];
    $EXP = $_POST["EXP"];
    $comment = $_POST["comment"];
    
    $Brand_ID = 0;
    $Unit_ID = 0;
    $Cate_ID = 0;

    $sql_Unit = "SELECT * FROM unit";
    $result_Unit = $connect->query($sql_Unit);

    if($result_Unit->num_rows > 0)
    {
        while($row_Unit = $result_Unit->fetch_assoc())
        {
            if($row_Unit["Unit_name"] == $Unit)
            {
                $Unit_ID = $row_Unit["Unit_ID"];
            }
            
        }
    }else{
        echo "0 results";
    }

    $sql_Brand = "INSERT 
                INTO brand (Brand_Name) 
                VALUES ('$Brand_name')";

    $insert_Brand = $connect->query($sql_Brand);

    if($insert_Brand === TRUE)
    {

    }else{
        echo "Error: ".$sql_Brand."<br>".$connect->error;
    }
    
    $sql_Brand = "SELECT * FROM brand";
    $result_Brand = $connect->query($sql_Brand);

    if($result_Brand->num_rows > 0)
    {
        while($row_Brand = $result_Brand->fetch_assoc())
        {
            $Brand_ID = $row_Brand["Brand_ID"];
            $Brand_name = $row_Brand["Brand_Name"];
        }
    }

    $sql_category = "SELECT * FROM category";
    $result_category = $connect->query($sql_category);

    if ($result_category->num_rows > 0) 
    {
        while ($row_category = $result_category->fetch_assoc())
        {
            if ($row_category["Cate_name"] == $Cate_name)
            {
                $Cate_ID = $row_category["Cate_ID"];
            }
        }
    } else {

    }
    
    $Selct_Product = "SELECT * FROM `product` ";
    $result_Product = $connect->query($Selct_Product);

    if ($result_Product->num_rows > 0)
    {
        while ($row_Product = $result_Product->fetch_assoc())
        {
            if($row_Product["Pro_ID"] === $ID_medicine)
            {
                $Amount = $row_Product["Quantity"];
                $quantity = $quantity + $Amount;

                Update_Quantity($ID_medicine, $quantity, $price);

                require("main_page.php");
                
                return 0;
            }
        }
    }
    
    $sql_Product = "INSERT INTO `product` (`Pro_ID`, 
                                    `Cate_ID`, 
                                    `Unit_ID`, 
                                    `Brand_ID`, 
                                    `Pro_name`, 
                                    `Brand_name`, 
                                    `Price`, 
                                    `Quantity`, 
                                    `Pro_EXP`, 
                                    `Pro_MFG`, 
                                    `comment`) 
                                VALUES ('$ID_medicine', 
                                    '$Cate_ID', 
                                    '$Unit_ID', 
                                    '$Brand_ID', 
                                    '$medicine_name', 
                                    '$Brand_name', 
                                    '$price', 
                                    '$quantity', 
                                    '$EXP', 
                                    '$MFG', 
                                    '$comment')";

    $insert_Product = $connect->query($sql_Product);

    if ($insert_Product === TRUE)
    {

    }else{
        echo "Error: ".$sql_Product."<br>".$connect->error;
    }


    $connect->close();


    require("Add_product.php");

?>