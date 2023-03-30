<?php

    require("connect_database.php");

// $sql = "DELETE FROM employee WHERE userid='" . $_GET["No"] . "'";
// $result = mysqli_query($connect, $sql);
// if ($result) {
//     echo "Record deleted successfully";
// } else {
//     echo "Error deleting record: " . mysqli_error($connect);
// }
// mysqli_close($connect);

    date_default_timezone_set("Asia/Bangkok");
    $date_off = date('Y-m-d');

    $No = $_POST['No'];
    $Verify = $_POST['verify'];
    // echo $No;

    $filename_user = "user.txt";
    $filename_password = "password.txt";

    $file_user = fopen( $filename_user, "r" );
    $file_pass = fopen( $filename_password, "r");

    if( $file_user == false ) {
        echo ( "Error in opening file" );
        exit();
    }

    if( $file_pass == false ) {
        echo ( "Error in opening file" );
        exit();
    }
     
    $filesize = filesize( $filename_user );
    $user = fread( $file_user, $filesize );

    $filesize = filesize( $filename_password );
    $pass = fread( $file_pass, $filesize );
    // echo ("$pass");     
    // $pass = password_hash($pass, PASSWORD_DEFAULT);

    fclose( $file_user );
    fclose( $file_pass );

    $sql_Emp = "SELECT * FROM employee WHERE No='$No'";
    $result_Emp = $connect->query($sql_Emp);

    if($result_Emp->num_rows > 0)
    {
        while($row_Emp = $result_Emp->fetch_assoc())
        {
            if($row_Emp['No'] = $No)
            {
                $Password = $row_Emp['Password'];
                $His_ID = $row_Emp['His_ID'];
            }
            
        }
    }else{
        echo "0 results";
    }

    if($Verify != $pass)
    {
        echo "รหัสผ่านไม่ถูกต้อง";
        require("setting_employee.php");
        return 0;
    }

    $up_Emp = "UPDATE employee_history SET
                                    Emp_Date_Off = '$date_off'
                                        WHERE His_ID='$His_ID'";
    
    $Update_Emp = $connect->query($up_Emp);
    
    if($Update_Emp)
    {

    }else{
        echo "Error updating record: ".$connect->error;
    }

    $query = "DELETE FROM employee WHERE No='$No' ";
    $query_run = mysqli_query($connect, $query);

    if($query_run)
    {
        echo 'Data Deleted';
        require('setting_employee.php');
    }else
    {
        echo 'Data Not Deleted';
    }

    $connect->close();
    
?>