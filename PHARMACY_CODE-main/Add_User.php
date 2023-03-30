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
<form action="menu_employee.php" method="POST">
        <input type="submit" value="Back">
</form>
<br/><br/>
<div class="container">
    <form action="check_Username.php" method="POST">

        <!-- <label for="start">Date: Sale</label>
        <input type="date" id="start" name="date_sale" value="2020-01-01" min="2020-01-01" max="2022-12-31"> -->

        <div class="row">
            <div class="col-25">
                <label for="tb_Username">Username</label>
            </div>
            <div class="col-75">
                <input type="text" id="tb_Username" name="username" placeholder="Username.....">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="tb_password">รหัสผ่าน</label>
            </div>
            <div class="col-75">
                <input type="text" id="tb_password" name="password" placeholder="รหัสผ่าน.....">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="tb_password">ยืนยันรหัสผ่าน</label>
            </div>
            <div class="col-75">
                <input type="text" id="tb_password" name="confirm_password" placeholder="ยืนยันรหัสผ่าน.....">
            </div>
        </div>
   
        <div class="row">
            <input type="submit" value="ตรวจสอบ Username">
        </div>
    </form>
</body>
</html>