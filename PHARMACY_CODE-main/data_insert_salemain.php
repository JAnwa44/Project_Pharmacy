<?php
    
    function Update_Quantity_Product($Pro_ID, $quantity)
    {
        require("connect_database.php");


        $up_product = "UPDATE product SET
                                    Quantity = '$quantity'
                                        WHERE Pro_ID='$Pro_ID'";

        $Update_Product = $connect->query($up_product);

        if($Update_Product)
        {
            if($quantity == 0 )
            {
                $De_Product = "DELETE FROM product WHERE Pro_ID='$Pro_ID'";
                $Delete_Product = $connect->query($De_Product);
                
                if($Delete_Product)
                {

                    echo 'ยาหมดแล้ว';
                    return 0;
                    
                }else{
                    echo 'Data Not Deleted';
                }

            }

            return 0;

        }else
            echo "Error updating record: ".$connect->error; 

        return 0;
    }
    // require("connect_database.php");
    $connect = mysqli_connect("localhost", "root", "","main_pharmacy") or die("ขณะนี้ระบบกำลังมีปัญหา");

    $select_saletem = "SELECT * FROM `temporary_sale`";
    $result_Tem = $connect->query($select_saletem);

    $Quantity = 0;

    if($result_Tem->num_rows > 0)
    {
        
        while($row = $result_Tem->fetch_assoc())
        {
            $Date_sale = $row["Date_sale"];
            $Time_sale = $row["Time_sale"];
            $Name_seler = $row["Name_seler"];
            $Name_medicine = $row["Name_medicine"];
            $ID_production = $row["ID_production"];
            $Amount = $row["Amount"];
            $Unit_name = $row["Unit_name"];
            $Cate_name = $row["Category_name"];
            $List_seler = $row["List_seler"];
            $comment = $row["comment"];
            $price = $row["price"];

            $select_product = "SELECT * FROM `product` WHERE Pro_ID='$ID_production'";
            $result_Product = $connect->query($select_product);

            while($row_product = $result_Product->fetch_assoc())
            {   
                $Quantity = $row_product["Quantity"];
            }

            $Quantity = $Quantity - $Amount;
            Update_Quantity_Product($ID_production, $Quantity);
            
            $insert_salemain = "INSERT INTO sale_data (
                Date_sale,
                Time_sale,
                Name_seler,
                Name_medicine,
                ID_production,
                Amount,
                Unit_name,
                Category_name,
                List_seler,
                comment,
                price
            ) VALUES (
                '$Date_sale',
                '$Time_sale',
                '$Name_seler',
                '$Name_medicine',
                '$ID_production',
                '$Amount',
                '$Unit_name',
                '$Cate_name',
                '$List_seler',
                '$comment',
                '$price'
            )";



            if ($connect->multi_query($insert_salemain) === TRUE) {
                echo "New records created successfully";
            } else {
                echo "Error: " . $insert_salemain . "<br>" . $connect->error;
            }

        }

        
    }else {
        echo "0 results";
    }

    if ($connect->query("Drop Table temporary_sale")) {
        echo ("Table temporary_sale dropped successfully.");
    }
    if ($connect->errno) {
        echo ("Could not drop table: ");
    }

    $create_table = "CREATE TABLE `temporary_sale` (
        `No` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `Date_sale` date NOT NULL,
        `Time_sale` time NOT NULL,
        `Name_seler` varchar(255) NOT NULL,
        `Name_medicine` varchar(255) NOT NULL,
        `ID_production` varchar(255) NOT NULL,
        `Amount` int(11) NOT NULL,
        `Unit_name` varchar(255) NOT NULL,
        `Category_name` varchar(255) NOT NULL,
        `List_seler` varchar(255) NOT NULL,
        `comment` text NOT NULL,
        `price` int(11) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
    // echo "เชื่อมต่อสำเร็จ" 
    
    if ($connect->query($create_table) === TRUE){
        echo "Table MyGuests created successfully";
    }else {
        echo "Error creating table: " . $connect->error;
    }

    require("main_page.php");

?>