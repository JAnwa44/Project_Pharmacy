<?php

    require("connect_database.php");

    $Cate_ID = $_POST['Cate_ID'];

    $sql_Category = "SELECT * FROM `category` WHERE Cate_ID='$Cate_ID'";
    $Category_data = $connect->query($sql_Category);

    while($row_Category = mysqli_fetch_array($Category_data))
    {
        $Category_name = $row_Category['Cate_name'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
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

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>

<body>
<form action="setting_Category.php" method="POST">
        <input type="submit" value="Back">
</form>
<br/><br/>
<div class="container">
    <form action="Edit_Category.php" method="POST">
        <div class="row">
            <div class="col-25">
                <label for="tb_Username">Category Name</label>
            </div>
            <div class="col-75">
                <input type="text" id="tb_Username" name="Category_name" value="<?php echo $Category_name; ?>">
            </div>
        </div>

        <input type="hidden" name="Cate_ID" value="<?php echo $Cate_ID; ?>">

        <div class="row">
            <input type="submit" value="ยืนยันการเปลี่ยนแปลง">
        </div>
    </form>
</body>
</html>


