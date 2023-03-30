<?php 
    // Create connection
    $connect = new mysqli('localhost', 'root', '', 'main_pharmacy');

    // Check Connection

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }
    

    $sql_brand = "SELECT DISTINCT Brand_Name FROM `brand` ";
    $result_Brand = $connect->query($sql_brand);

    

    $i = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Only Brand</title>
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
    <form action="menu_product.php" method="POST">
        <input type="submit" value="Back">
    </form>

    <div class="container">
        <h1>Brand ที่เคยขายในร้านค้า</h1>
        <table>
            <thead>
                <tr>
                    <td width="3%">NO.</td>
                    <!-- <td width="15%">Brand ID</td> -->
                    <td width="15%">ชื่อ Brand</td>
                    <!-- <td width="13%">ประเภท</td>
                    <td width="7%">หน่วย</td>
                    <td width="13%">Brand</td>
                    <td width="4%">ราคา</td>
                    <td width="5%">จำนวน</td>
                    <td width="7%">วันหมดอายุ</td>
                    <td width="7%">วันผลิต</td>
                    <td width="13%">Comment</td> -->
                </tr>
            </thead>
            <tbody>
                <?php while($row_Brand = $result_Brand->fetch_assoc())
                { 
                    
                ?>

                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row_Brand['Brand_Name'];?></td>
                    </tr>
                <?php 
                    
                    $i++;    
                }
                
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>

