<?php
    session_start();

    $_SESSION["username"] = $_POST["username"];
    $_SESSION["password"] = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    
    $check_user = 0;

    if($_SESSION["password"] != $confirm_password)
    {
        echo "รหัสผ่านไม่ถูกต้อง";
        require("Add_User.php");
    }else{
        require("connect_database.php");

        $sql = "SELECT * FROM `employee`";

        $result = $connect->query($sql);
    
        if ($result->num_rows > 0) {
            // output data of each row
            
            while($row = $result->fetch_assoc()) {

                $Username = $row["Username"];
                if($_SESSION["username"] == $Username){
                    echo "มีชื่อผู้ใช้อยู่แล้ว";
                    require("Add_User.php");
                    $check_user++;
                }
            }
            if($check_user == 0)
            {
                require("Add_personal_information.php");
            }
        } else {

            // echo "0 results";
            require("Add_personal_information.php");

        }

        // if(true)
        //     require("Add_personal_information.php");
    }
    
?>