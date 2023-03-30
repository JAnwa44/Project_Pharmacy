<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chang password</title>
</head>
<body>
    <form method="POST">
        <input type="password" name="password" placeholder="Password" required="required" /><br>
        <input type="submit" value="ยืนยันรหัสผ่าน"></br>
    </form>

    <?php
        echo ("นี่คือรหัสของคุณใช่หรือไหม");
        $new_password = $_POST["password"];
        echo ("$new_password");
    ?>

    <form action="chang_admin.php">
        <input type="submit" value="กรอกรหัสผ่านใหม่">
    </form>

    <form action="main_page.php">
        <?php
            $handle = fopen("password.txt", "w+");

            if ($handle) {

                $new_password = $_POST["password"];
                echo ("$new_password");
                fwrite($handle, "$new_password");

            
                fclose($handle);
            } else {
                echo "Error opening file.\n";   
            }
        ?>
        <input type="submit" value="ยืนยันรหัสผ่าน">
    </form>

</body>
</html>