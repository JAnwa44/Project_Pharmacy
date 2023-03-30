<?php
include_once 'connect_database.php';
$result = mysqli_query($connect,"SELECT * FROM `category`");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Setting</title>
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
        input[value=DELETE]{
            background-color: #db0b0b;
            border: none;
            color: white;
            padding: 7px 15px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }input[value=Edit]{
            background-color: #00e649;
            border: none;
            color: white;
            padding: 7px 15px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }
        input[value=Add]{
            background-color: #00e649;
            border: none;
            color: white;
            padding: 7px 15px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
            float: right;
        }
    </style>
</head>
<body>
    <form action="menu_product.php" method="POST">
        <input type="submit" value="Back">
    </form>
    <form action="Add_Category.php" method="POST">
        <input type="submit" value="Add">
    </form>
<table>
	<tr>
        <td>No</td>
        <td>Category</td>
        <td>Edit</td>
        <td>DELETE</td>
    </tr>
	<?php
	$i=1;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
        <td><?php echo $i; ?></td>
        <td><?php echo $row["Cate_name"]; ?></td>
        <form action="Edit_Category_page.php" method="POST">
            <input type="hidden" name="Cate_ID" value="<?php echo $row['Cate_ID']; ?>">
            <th> <input type="submit" name="Edit" value="Edit"></th>
        </form>
        <form action="Delete_Category.php" method="POST">
            <input type="hidden" name="Cate_ID" value="<?php echo $row['Cate_ID']; ?>">
            <th> <input type="submit" name="delect" value="DELETE"></th>
        </form>
        
    </tr>
	<?php
	$i++;
	}
	?>
</table>
</body>
</html>