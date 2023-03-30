<?php
    
    require("connect_database.php");

    $No = $_POST['No'];
    $HIS_ID = $_POST['HIS_ID'];
    $Username = $_POST['username'];
    $check_pharmacy = $_POST['check_pharmacy'];
    $Password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $ID_card = $_POST['ID_card'];
    $Created = $_POST['comment'];

    if ($Password != $confirm_password)
    {
        echo "รหัสผ่านไม่ตรงกัน";
        require("Edit_Employee_page.php");
        return 0;
    }

    $filename_user_read = "C:/xampp/htdocs/Main_data/user.txt";
    // $filename_password_read = "C:/xampp/htdocs/Main_data/password.txt";


    $file_user_read = fopen( $filename_user_read, "r" );
    // $file_pass_read = fopen( $filename_password_read, "r");

    if( $file_user_read == false) {
        echo ( "Error in opening file" );
        exit();
    }
    
    $filesize = filesize( $filename_user_read );
    $user_io = fread( $file_user_read, $filesize );

    fclose( $file_user_read );

    if($user_io === $check_pharmacy)
    {
        $filename_user = "C:/xampp/htdocs/Main_data/user.txt";
        $file_user = fopen( $filename_user, "w+" );

        $filename_password = "C:/xampp/htdocs/Main_data/password.txt";
        $file_password = fopen( $filename_password, "w+" );

        if( $file_user == false || $file_password == false) {
            echo ( "Error in opening new file" );
            exit();
        }
        fwrite( $file_password, $Password);
        fwrite( $file_user, $Username);

        fclose( $file_password );
        fclose( $file_user );
    }

    

    $up_Employee = "UPDATE employee SET 
                                Emp_Name = '$fname',
                                Emp_Lname = '$lname',
                                Username = '$Username',
                                Created = '$Created',
                                Emp_Phone = '$phone',
                                Password = '$Password'
                                    WHERE No='$No'";

    $up_Employee_HIS = "UPDATE employee_history SET 
                                            Emp_Username = '$Username',
                                            Emp_name = '$fname',
                                            Emp_Lname = '$lname',
                                            Emp_Address = '$address',
                                            Emp_Phone = '$phone',
                                            EmpID_Card = '$ID_card',
                                            Created = '$Created'
                                                WHERE His_ID='$HIS_ID'";

    $Updata_Employee = $connect->query($up_Employee);
    $Updata_Employee_His = $connect->query($up_Employee_HIS);

    if($Updata_Employee)
    {
        if($Updata_Employee_His)
        {
            echo "Record updated successfully";
            require("main_page.php");
            return 0;
        }
    }else
    {
        echo "Error updating record: ".$connect->error;
    }

    $connect->close();

?>