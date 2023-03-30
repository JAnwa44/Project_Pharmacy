<?php 
    // Create connection
    require("connect_database.php");

    // Check Connection

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }

    $sql = "SELECT * FROM `employee_history`";
    $result = $connect->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Employee</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: 0;
        }

        body {
            font-size: 16px;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #F2F3F4;
            color: #273746;
        }

        .container {
            margin: 20px auto;
            padding: 0;
            width: 980px;
        }

        h1 {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            /* ผสาน border ระหว่าง table กับ td  */
            border-collapse: collapse;
        }

        table,
        td {
            border: 1px solid #5D6D7E;
            text-align: center;
        }

        thead {
            background-color: #273746;
            color: #BDC3C7;
        }

        /* Striped Tables: ทำไฮไล์ในการแบ่ง row  */
        tr:nth-child(even) {
            background-color: #BDC3C7;
        }

        td {
            height: 30px;
            vertical-align: center;
        }

        .name {
            text-align: left;
            padding-left: 16px;
        }
        input[value=Back]{
            background-color: #d99414;
            border: none;
            color: white;
            padding: 7px 15px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
            float: left;
        }
    </style>
</head>

<body>
    <form action="menu_employee.php" method="POST">
        <input type="submit" value="Back">
    </form>
    <div class="container">
        <h1>ประวัติพนังงาน</h1>
        <table>
            <thead>
                <tr>
                    <td width="3%">No.</td>
                    <td width="12%">name</td>
                    <td width="12%">Last Name</td>
                    <td width="15%">ที่อยู่</td>
                    <td width="10%">เบอร์โทรศัพท์</td>
                    <td width="12%">เลขประจำตัวประชาขน</td>
                    <td width="10%">เข้าทำงาน</td>
                    <td width="10%">ออกจากที่ทำงาน</td>
                    <td width="15%">หมายเหตุ</td>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td class="name"><?php echo $row['Emp_name'];?></td>
                        <td><?php echo $row['Emp_Lname']; ?></td>
                        <td><?php echo $row['Emp_Address']; ?></td>
                        <td><?php echo $row['Emp_Phone']; ?></td>
                        <td><?php echo $row['EmpID_Card']; ?></td>
                        <td><?php echo $row['Emp_Date_Start']; ?></td>
                        <td><?php echo $row['Emp_Date_Off']; ?></td>
                        <td><?php echo $row['Created']; ?></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>

    </div>

</body>

</html>