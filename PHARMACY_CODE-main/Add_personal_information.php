<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
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

<form action="Add_User.php" method="POST">
        <input type="submit" value="Back">
</form>
<br/><br/>
<div class="container">
    <form action="data_Add_Employee.php" method="POST">

        <!-- <label for="start">Date: Sale</label>
        <input type="date" id="start" name="date_sale" value="2020-01-01" min="2020-01-01" max="2022-12-31"> -->

        <div class="row">
            <div class="col-25">
                <label for="tb_name">ชื่อ</label>
            </div>
            <div class="col-75">
                <input type="text" id="tb_name" name="fname" placeholder="ชื่อ.....">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="tb_last_naem">นามสกุล</label>
            </div>
            <div class="col-75">
                <input type="text" id="tb_last_name" name="lname" placeholder="นามสกุล.....">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="tb_address">ที่อยู่</label>
            </div>
            <div class="col-75">
                <textarea id="tb_address" name="address" placeholder="ที่อยู่....." style="height:100px"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="tb_phone">เบอร์โทร</label>
            </div>
            <div class="col-75">
                <input type="text" id="tb_phone" name="phone" placeholder="0123456789"  required>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="tb_ID_card">เลขประจำตัวประชาขน</label>
            </div>
            <div class="col-75">
                <input type="text" id="tb_ID_card" name="ID_card" placeholder="1234567891234 (ป้อนโดยไม่ต้องวรรณ)" >
            </div>
        </div>

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
</body>

</html>