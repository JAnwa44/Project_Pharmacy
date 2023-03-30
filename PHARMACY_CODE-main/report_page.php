<?php 
    // Create connection
    $connect = new mysqli('localhost', 'root', '', 'main_pharmacy');

    // Check Connection

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
    }

    $Total_price = 0;
    $date = $_POST["date_sale"];
    $date = date('Y-m-d', strtotime($date));  
    $sql = "SELECT * FROM sale_data WHERE Date_sale='$date' ";
    $result = $connect->query($sql);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REPORT</title>
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
        h2 {
            margin-top: 20px;
            margin-bottom: 20px;
            float: right;
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
    <form action="main_page.php" method="POST">
        <input type="submit" value="Back">
    </form>

    <form action="report_page.php" method="POST">
        <label for="start">Date: Sale</label>
        <input type="date" id="start" name="date_sale">
        <input type="submit" value="submit">
    </form>
    <div class="container">
        <h1>ข้อมูลการขายสำหรับวันนี้ <?php echo date('d-m-Y', strtotime($date)); ?></h1>
        <table>
            <thead>
                <tr>
                    <td width="3%">No.</td>
                    <td width="7%">ชื่อผู้ขาย</td>
                    <td width="8%">ชื่อยา</td>
                    <td width="5%">เลขที่หรืออักษรของครั้งที่ผลิต</td>
                    <td width="5%">จำนวน / ปริมาณ</td>
                    <td width="5%">หน่วยยา</td>
                    <td width="5%">ประเภทของยา</td>
                    <td width="7%">ลงชื่อผู้ขาย</td>
                    <td width="7%">เวลา</td>
                    <td width="10%">หมายเหตุ</td>
                    <td width="5%">ขาย</td>
                </tr>
            </thead>
            <tbody><?php $i=1; ?>
                <?php while($row = $result->fetch_assoc()){ ?>
                    <tr>    
                        <td><?php echo $i++; ?></td>
                        <td class="name"><?php echo $row['Name_seler'];?></td>
                        <td><?php echo $row['Name_medicine'];?></td>
                        <td><?php echo $row['ID_production']; ?></td>
                        <td><?php echo $row['Amount']; ?></td>
                        <td><?php echo $row['Unit_name']; ?></td>
                        <td><?php echo $row['Category_name']; ?></td>
                        <td><?php echo $row['List_seler']; ?></td>
                        <td><?php echo $row['Time_sale']; ?></td>
                        <td><?php echo $row['comment']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <?php $Total_price = $Total_price + $row['price']; ?>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
        <h2>รวมราคาขายสำหรับวันนี้ <?php echo $Total_price ?></h2>
    </div>
</body>
</html>

