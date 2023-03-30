<?php

    function correct($name_admin, $Cate_ID, $Unit_ID)
    {
        $connect = mysqli_connect("localhost", "root", "","main_pharmacy") or die("ขณะนี้ระบบกำลังมีปัญหา");

        $ID_medicine = $_POST["ID_medicine"];
        $amount = $_POST["amount"];
        // $Unit = $_POST["Unit"];
        $comment = $_POST["comment"];
        $seler = $_POST["seler"];
        $sign = $_POST["sign"];

        $Cate_name = "";
        $Unit_name = "";
        $name_medicine = "";
        $sale_price = 0;

        $sql_product = "SELECT * FROM `product`";
        $product_data = $connect->query($sql_product);
        while($row_product = mysqli_fetch_array($product_data))
        {
            if($row_product['Pro_ID'] === $ID_medicine)
            {
                $name_medicine = $row_product['Pro_name'];
                $sale_price = $row_product['Price'];
                break;
            }
        } 

        $sql_cate = "SELECT * FROM `category` WHERE Cate_ID='$Cate_ID'";
        $cate_data = $connect->query($sql_cate);
        while($row_cate = mysqli_fetch_array($cate_data))
        {
            $Cate_name = $row_cate['Cate_name'];
        }

        $sql_Unit = "SELECT * FROM `unit` WHERE Unit_ID='$Unit_ID'";
        $Unit_data = $connect->query($sql_Unit);
        while($row_Unit = mysqli_fetch_array($Unit_data))
        {
            $Unit_name = $row_Unit['Unit_name'];
        }

        $price = $sale_price * $amount;

        date_default_timezone_set("Asia/Bangkok");

        $date = date('Y-m-d');
        $Time_sale = date('H:i:s');

        $insert_product_tem = "INSERT INTO temporary_sale(Date_sale,
                                        Time_sale,
                                        Name_seler, 
                                        Name_medicine, 
                                        ID_production, 
                                        Amount, 
                                        Unit_name,
                                        Category_name,
                                        List_seler, 
                                        comment,
                                        price) 
                                VALUES ('$date',
                                        '$Time_sale',
                                        '$name_admin', 
                                        '$name_medicine', 
                                        '$ID_medicine', 
                                        '$amount',
                                        '$Unit_name',
                                        '$Cate_name', 
                                        '$seler', 
                                        '$comment',
                                        '$price')";

        $insert_product_data = mysqli_query($connect, $insert_product_tem);

        if($insert_product_data)
        {
            // echo "บันทึกข้อมูลเรียบร้อย";
            require('sale_data.php');
        }else{
            // echo_myqli_errors($concect);
            echo "เข้าม่ายด้ายยยยยยยยยยยย";
        }

    }

    // Function ************************************************************************************ Function

    // Main ************************************************************************************ Main
    
    require('connect_database.php');


    $ID_Product = $_POST['ID_medicine'];
    $seler = $_POST["seler"];
    $sign = $_POST["sign"];

    $Cate_ID = 0;
    $Unit_ID = 0;

    $sql_product = "SELECT * FROM `product` WHERE Pro_ID='$ID_Product'";
    $product_data = $connect->query($sql_product);
    while($row_product = mysqli_fetch_array($product_data))
    {

        $Cate_ID = $row_product['Cate_ID'];
        $Unit_ID = $row_product['Unit_ID'];

        // if($row_product['Pro_ID'] === $ID_medicine)
        // {
        //     $name_medicine = $row_product['Pro_name'];
        //     $sale_price = $row_product['Price'];
        //     break;
        // }
    } 
    
    // $sql_cate = "SELECT * FROM `category` WHERE Cate_ID='$Cate_ID'";
    // $cate_data = $connect->query($sql_cate);
    // while($row_cate = mysqli_fetch_array($cate_data))
    // {
    //     $Cate_name = $row_cate['Cate_name'];
    // }

    // $sql_Unit = "SELECT * FROM `unit` WHERE Unit_ID='$Unit_ID'";
    // $Unit_data = $concect->query($sql_Unit);
    // while($row_Unit = mysqli_fetch_array($Unit_data))
    // {
    //     $Unit_name = $row_Unit['Unit_name'];
    // }

    $user = "SELECT * FROM `employee`";
    $user_data = $connect->query($user);
    while($row_user = mysqli_fetch_array($user_data))
    {
        if($row_user['Username'] === $seler)
        {
            $password_ck = $row_user['Password'];
            $name_admin = $row_user['Emp_Name'];
            break;
        }
    }    

    if($password_ck === $sign)
    {

        if($seler === "phmc")
        {
            correct($name_admin, $Cate_ID, $Unit_ID);
        }else{

            if($Cate_ID < 3 || 4 < $Cate_ID)
            {
                correct($name_admin, $Cate_ID, $Unit_ID);
            }else{
                
                echo "คุณไม่สามารถขายยาชนิคนี้ได้";
                require("sale_data.php");
                return 0;
            }
        }

    }else
    {
        echo "รหัสผ่านไม่ถูกต้อง โปรดกรอกใหม่";
        require('sale_data.php');
    }
    














    
    
?>
