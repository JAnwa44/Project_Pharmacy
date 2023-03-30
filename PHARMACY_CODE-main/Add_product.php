<?php 
  // Create connection
  require("connect_database.php");

  // Check Connection

  if ($connect->connect_error) {
    die("Something wrong.: " . $connect->connect_error);
  }

  $Unit = "SELECT * FROM unit";
  $Unit_data = $connect->query($Unit);  

  $sql_category = "SELECT * FROM category";
  $category_data = $connect->query($sql_category);
  // $Employee = "SELECT * FROM `employee`";
  // $Employee_data = $connect->query($Employee);
  // $name_em = "SELECT * FROM main_pharmacy";
  // $em_data = $connect->query($name_em);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>
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

<form action="menu_product.php" method="POST">
  <input type="submit" value="Back">
</form>
<br/><br/>
  <div class="container">
    <form action="data_Add_Product.php" method="POST">

        <!-- <label for="start">Date: Sale</label>
        <input type="date" id="start" name="date_sale" value="2020-01-01" min="2020-01-01" max="2022-12-31"> -->

        <div class="row">
            <div class="col-25">
                <label for="tb_name">Brand</label>
            </div>
            <div class="col-75">
                <input type="text" id="tb_name" name="Brand_name" placeholder="Brand.....">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="tb_last_naem">ชื่อยา</label>
            </div>
            <div class="col-75">
                <input type="text" id="tb_last_name" name="medicine_name" placeholder="ชื่อยา.....">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="tb_last_naem">ID ประจำตัวยา</label>
            </div>
            <div class="col-75">
                <input type="text" id="tb_last_name" name="ID_medicine" placeholder="ID.....">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="tb_last_naem">จำนวน</label>
            </div>
            <div class="col-75">
                <input type="number" id="tb_last_name" name="quantity" placeholder="จำนวน.....">
                
            </div>
        </div>

      <div class="row">
        <div class="col-25">
          <label for="name">หน่วยยา</label>
        </div>
        <div class="col-75">
          <select id="name" name="Unit">
            <?php
            while($row_Unit = mysqli_fetch_array($Unit_data))
            {
            ?>
              <option value="<?php echo $row_Unit['Unit_name']; ?>"><?php echo $row_Unit['Unit_name']; ?></option>
            <?php
            }
            ?>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="name">ประเภทของยา</label>
        </div>
        <div class="col-75">
          <select id="name" name="Cate_name">
            <?php
            while($row_category = mysqli_fetch_array($category_data))
            {
            ?>
              <option value="<?php echo $row_category['Cate_name']; ?>"><?php echo $row_category['Cate_name']; ?></option>
            <?php
            }
            ?>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="tb_last_naem">ราคาขาย</label>
        </div>
        <div class="col-75">
          <input type="number" id="tb_last_name" name="price" placeholder="ราคาขาย.....">
        </div>
      </div>

        <label for="start">MFG / MFD</label>
        <input type="date" id="start" name="MFG" min="2020-01-01" max="2030-12-31">
        <label for="start">EXP / EXD</label>
        <input type="date" id="start" name="EXP" min="2020-01-01" max="2030-12-31">

        <div class="row">
          <div class="col-25">
            <label for="subject">หมายเหตุ</label>
          </div>
          <div class="col-75">
                <textarea id="subject" name="comment" placeholder="หมายเหตุ....." style="height:100px"></textarea>
          </div>
        </div>

        <div class="row">
            <input type="submit" value="Add">
        </div>
    </form>
  </div>
</body>

</html>