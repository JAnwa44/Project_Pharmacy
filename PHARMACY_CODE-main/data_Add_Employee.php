<?php
    session_start();

    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    // include("check_Username.php");
    require("connect_database.php");

    $name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $ID_card_source = $_POST["ID_card"];
    $comment = $_POST["comment"];

    if(strlen($phone) != 10)
    {
        echo "โปรดกรอกเบอร์โทรศัพท์ให้ครบด้วยครับ";
        require("Add_personal_information.php");
        return 0;

    }

    

    $ID_card = str_split(str_replace('-', '', $ID_card_source));
    $sum = 0;
    $digi = 13;

    foreach($ID_card as $key)
    {
        $digi > 1 ? $sum += $digi * intval($key) : null;
        $digi--;
    }

    $x = $sum % 11;
    $n13 = $x <= 1 ? 1 - $x : 11 - $x;
    
    if($n13 != $ID_card[12])
    {
        echo "หมายเลขบัตรประชาชนไม่ถูกต้อง";
        require("Add_personal_information.php");
        return 0;

    }


    date_default_timezone_set("Asia/Bangkok");

    $date_on = date('Y-m-d');

    $inseert_hisEmp = "INSERT INTO employee_history 
                                                (Emp_name, 
                                                Emp_Lname, 
                                                Emp_Address, 
                                                Emp_Phone, 
                                                EmpID_Card, 
                                                Emp_Date_Start, 
                                                Created) 
                                            VALUES ('$name', 
                                                '$last_name', 
                                                '$address', 
                                                '$phone', 
                                                '$ID_card', 
                                                '$date_on', 
                                                '$comment')";
    
    if ($connect->query($inseert_hisEmp) === TRUE)
    {
        
        $select_his = "SELECT * FROM `employee_history`";
        $result_his = $connect->query($select_his);
        if($result_his->num_rows > 0)
        {
            echo "check Add have";
            $i = 0;
            while($row = $result_his->fetch_assoc())
            {
                $his_id = $row["His_ID"];
                $i++;
            }

            $inseert_Emp = "INSERT INTO employee (Emp_Name, Emp_Lname, Username, Created, Emp_Phone, Password, His_ID) VALUES ('$name', '$last_name', '$username', '$comment', '$phone', '$password', '$his_id')";
            if($connect->query($inseert_Emp) === TRUE)
            {
                echo "New record created successfully";
                require("main_page.php");
            }
        }
        
    }else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }

    
?>