<?php

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
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    fclose( $file_user );
    fclose( $file_pass );
     
    $u_user = $_POST["user"];
    $u_pass = $_POST["password"];
    // echo ("$u_pass");

    $verify_password = password_verify($u_pass, $pass);

    if ( $user == $u_user )    
        if ( $verify_password )
            require("report.php");
        else
            // echo ("not");
            require ( "login.php" );
    else
        require ( "login.php" );

    
?>