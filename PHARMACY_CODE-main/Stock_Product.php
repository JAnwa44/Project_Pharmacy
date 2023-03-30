<?php 
    // Create connection
    $connect = new mysqli('localhost', 'root', '', 'main_pharmacy');

    // Check Connection

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }
    

    $sql_product = "SELECT * FROM `product` ";
    $result_product = $connect->query($sql_product);

    

    $i = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Product</title>
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
        <h1>Stock สินค้าทั้งหมด</h1>
        <table>
            <thead>
                <tr>
                    <td width="3%">NO.</td>
                    <td width="7%">Product ID</td>
                    <td width="7%">ชื่อยา</td>
                    <td width="13%">ประเภท</td>
                    <td width="7%">หน่วย</td>
                    <td width="13%">Brand</td>
                    <td width="4%">ราคา</td>
                    <td width="5%">จำนวน</td>
                    <td width="7%">วันหมดอายุ</td>
                    <td width="7%">วันผลิต</td>
                    <td width="13%">Comment</td>
                </tr>
            </thead>
            <tbody>
                <?php while($row_product = $result_product->fetch_assoc())
                { 
                    $Brand_ID = $row_product['Brand_ID'];
                    $Unit_ID = $row_product['Unit_ID'];
                    $Cate_ID = $row_product['Cate_ID'];

                    $sql_brand = "SELECT * FROM `brand` WHERE Brand_ID='$Brand_ID'";
                    $result_brand = $connect->query($sql_brand);
                    
                    while($row_brand = $result_brand->fetch_assoc())
                        $brand_name = $row_brand['Brand_Name'];
                    

                    $sql_unit = "SELECT * FROM `unit` WHERE Unit_ID='$Unit_ID'";
                    $result_unit = $connect->query($sql_unit);

                    while($row_unit = $result_unit->fetch_assoc())
                        $Unit_name = $row_unit['Unit_name'];


                    $sql_categery = "SELECT * FROM `category` WHERE Cate_ID='$Cate_ID'";
                    $result_categery = $connect->query($sql_categery);

                    while($row_category = $result_categery->fetch_assoc())
                        $Cate_name = $row_category['Cate_name'];
                    
                ?>

                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row_product['Pro_ID'];?></td>
                        <td><?php echo $row_product['Pro_name'];?></td>
                        <td><?php echo $Cate_name; ?></td>
                        <td><?php echo $Unit_name; ?></td>
                        <td><?php echo $brand_name; ?></td>
                        <td><?php echo $row_product['Price']; ?></td>
                        <td><?php echo $row_product['Quantity']; ?></td>
                        <td><?php echo $row_product['Pro_EXP']; ?></td>
                        <td><?php echo $row_product['Pro_MFG']; ?></td>
                        <td><?php echo $row_product['comment']; ?></td>
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

