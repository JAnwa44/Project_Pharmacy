<?php
    
    $database = "main_pharmacy";
    // require("connect_database.php");
    $connect = mysqli_connect("localhost", "root", "",$database) or die("ขณะนี้ระบบกำลังมีปัญหา");
    // mysqli_select_db($database, $connection);

    // $exists = mysqli_query("report");
    // $result = $connect->query("SHOW TABLES LIKE '{report}'");
    // if( $result->num_rows == 1 )
	// {
    //     echo "tu";
	//     return TRUE;
	// }
	// else
	// {
	//         return FALSE;
	// }
	// $result->free();
    // echo "check";

    // if ($result = $connect->query("SHOW TABLES LIKE 'report'")) {
    //     if($result->num_rows == 1) {
    //         echo "Table exists";
    //     }
    // }
    // else {
    //     echo "Table does not exist";
    // }
    // echo "check 2";

    if ($connect->query("Drop Table report")) {
        // echo ("Table temporary_sale dropped successfully.");
    }else if ($connect->errno) {
        echo ("Could not drop table: ");
    }

    $TB_report = "CREATE TABLE `report` (
        `No` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `Date_sale` date NOT NULL,
        `Name_seler` varchar(255) NOT NULL,
        `Name_medicine` varchar(255) NOT NULL,
        `ID_production` varchar(255) NOT NULL,
        `Amount` int(11) NOT NULL,
        `List_seler` varchar(255) NOT NULL,
        `comment` text NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
    // echo "เชื่อมต่อสำเร็จ" 
    
    if ($connect->query($TB_report) === TRUE){
        // echo "Table MyGuests created successfully";
    }else {
        echo "Error creating table: " . $connect->error;
    }

    $connect -> close();

    require("main_page.php");

?>