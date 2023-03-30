<?php 
  // Create connection
  require("connect_database.php");

  // Check Connection

  if ($connect->connect_error) {
    die("Something wrong.: " . $connect->connect_error);
  }

  $total_price = 0;
  $saleTem = "SELECT * FROM `temporary_sale`";
  $saleTem_data = $connect->query($saleTem);

  $Employee = "SELECT * FROM `employee`";
  $Employee_data = $connect->query($Employee);

  $Unit = "SELECT * FROM unit";
  $Unit_data = $connect->query($Unit);  

  $sql_category = "SELECT * FROM category";
  $category_data = $connect->query($sql_category);
  // $name_em = "SELECT * FROM main_pharmacy";
  // $em_data = $connect->query($name_em);
    
?>

<html>
<head>

  <title>PHAMACY</title>
    
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
  <link rel = "stylessheet" href= ""styles.css>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

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
        input[value=Sell]{
          background-color: #d42828;
          border: none;
          color: white;
          padding: 7px 15px;
          text-decoration: none;
          margin: 4px 2px;
          cursor: pointer;
          float: right;
        }
        input[value=DELETE]{
            background-color: #db0b0b;
            border: none;
            color: white;
            padding: 7px 15px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }
  </style>
<head>

<body>
    <nav class="navbar navbar-light bg-light justify-content-center">
        <a class="navbar-brand">PHAMACY DATABASE MANAGMENT</a>
        <form action="login.php" class="form-inline">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">LOGOUT</button>
        </form>
    </nav>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a  class="nav-link active" href="main_page.php">HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="report_page.php">REPORT</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="menu_product.php">PRODUCT</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="font-size:30px;cursor:pointer" href="#">SALE</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="menu_employee.php">EMPLOYEE</a>
        </li>
    </ul>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>



<div class="container">
  <form action="data_insert_saleTem.php" method="POST">
    <!-- <div class="row">
      <div class="col-25">
        <label for="tb_med">ชื่อยา</label>
      </div>
      <div class="col-75">
        <input type="text" id="tb_med" name="name_medicine" placeholder="ชื่อยา.....">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="tb_pd">เลขที่หรืออักษรของครั้งที่ผลิต</label>
      </div>
      <div class="col-75">
        <input type="text" id="tb_pd" name="ID_production" placeholder="เลขที่หรืออักษรของครั้งที่ผลิต.....">
      </div>
    </div> -->

    <div class="row">
      <div class="col-25">
        <label for="">ID</label>
      </div>
      <div class="col-75">
      <select name="ID_medicine" id="ID_medicine" class="form-control input-lg" data-live-search="true" title="ID medicine"></select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="tb_amount">จำนวน / ปริมาณ</label>
      </div>
      <div class="col-75">
        <input type="number" id="tb_amount" name="amount" placeholder="จำนวน / ปริมาณ.....">
      </div>
    </div>

    <!-- <div class="row">
      <div class="col-25">
        <label for="name">หน่วยยา</label>
      </div>
      <div class="col-75">
        <select id="name" name="Unit"> -->
          <?php
          // while($row_Unit = mysqli_fetch_array($Unit_data))
          // {
          ?>
            <!-- <option value="<?php echo $row_Unit['Unit_name']; ?>"><?php echo $row_Unit['Unit_name']; ?></option> -->
          <?php
          // }
          ?>
        <!-- </select>
      </div>
    </div> -->
    
    <!-- <div class="row">
      <div class="col-25">
        <label for="name">ประเภทของยา</label>
      </div>
      <div class="col-75">
        <select id="name" name="Cate_name"> -->
          <?php
          // while($row_category = mysqli_fetch_array($category_data))
          // {
          ?>
            <!-- <option value="<?php echo $row_category['Cate_name']; ?>"><?php echo $row_category['Cate_name']; ?></option> -->
          <?php
          // }
          ?>
        <!-- </select>
      </div>
    </div> -->

    <div class="row">
      <div class="col-25">
        <label for="subject">หมายเหตุ</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="comment" placeholder="หมายเหตุ....." style="height:100px"></textarea>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="name">ชื่อผู้ขาย</label>
      </div>
      <div class="col-75">
        <select id="name" name="seler">
          <?php 
            while($row_em = mysqli_fetch_array($Employee_data))
            {
          ?>  
              <option value="<?php echo $row_em['Username']; ?>"><?php echo $row_em['Username']; ?></option>
          <?php
            }
          ?> 
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="tb_sign">ลงชื่อผู้ขาย</label>
      </div>
      <div class="col-75">
        <input type="text" id="tb_sign" name="sign" placeholder="ลงชื่อผู้ขาย.....">
      </div>
    </div>
    <!-- <div class="row">
      <div class="col-25">
        
      </div>
      <div class="col-75">
        
      </div>
    </div> -->
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>
  <div class="container">
    <h1>ยาที่จะจำหน่าย</h1>
      <table>
        <thead>
          <tr>
            <td width="3%">NO.</td>
            <td width="7%">ชื่อผู้ขาย</td>
            <td width="8%">ชื่อยา</td>
            <td width="10%">เลขที่หรืออักษรของครั้งที่ผลิต</td>
            <td width="5%">จำนวน / ปริมาณ</td>
            <td width="7%">ลงชื่อผู้ขาย</td>
            <td width="10%">หมายเหตุ</td>
            <td width="5%">ขาย</td>
            <td width="5%">ลบการขาย</td>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php while($row = $saleTem_data->fetch_assoc()){ ?>
          <tr>
            <td><?php echo $i++; ?></td>
            <td class="name"><?php echo $row['Name_seler'];?></td>
            <td><?php echo $row['Name_medicine'];?></td>
            <td><?php echo $row['ID_production']; ?></td>
            <td><?php echo $row['Amount']; ?></td>
            <td><?php echo $row['List_seler']; ?></td>
            <td><?php echo $row['comment']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <?php $total_price = $total_price + $row['price']; ?>
            <form action="Delete_SaleTem.php" method="POST">
              <input type="hidden" name="No" value="<?php echo $row['No']; ?>">
              <th> <input type="submit" name="delect" value="DELETE"></th>
            </form>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    <h2>Total Price --> <?php echo $total_price; ?></h2>
  </div>
  <form action="data_insert_salemain.php" method="POST">
    <input type="submit" value="Sell">
  </form>
</body>

</html>

<script>

$(document).ready(function(){

  $('#ID_medicine').selectpicker();

  load_data('ID_medicine_data');

  function load_data(type, category_id = '')
  {
    $.ajax({
      url:"load_product_data.php",
      method:"POST",
      data:{type:type, category_id:category_id},
      dataType:"json",
      success:function(data)
      {
        var html = '';
        for(var count = 0; count < data.length; count++)
        {
          html += '<option value="'+data[count].name+'">'+data[count].name+'</option>';
        }
        if(type == 'ID_medicine_data')
        {
          $('#ID_medicine').html(html);
          $('#ID_medicine').selectpicker('refresh');
        }
      }
    })
  }

  $(document).on('change', '#ID_medicine', function(){
    var category_id = $('#ID_medicine').val();
  });
  
});



</script>