<?php 

    
    // Create connection
    require("connect_database.php");

    // Check Connection

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
    }

    $No = $_POST['No'];
    $verify = $_POST['verify'];

    $sql_Employee = "SELECT * FROM `employee` WHERE No='$No'";
    $Employee_data = $connect->query($sql_Employee);

    while($row_em = mysqli_fetch_array($Employee_data))
    {
        $No = $row_em['No'];
        $Emp_Name = $row_em['Emp_Name'];
        $Emp_Lname = $row_em['Emp_Lname'];
        $Username = $row_em['Username'];
        $commect = $row_em['Created'];
        $Emp_Phone = $row_em['Emp_Phone'];
        $Password = $row_em['Password'];
        $His_ID = $row_em['His_ID'];
    }

    if($verify != $Password)
    {
        echo "รหัสผ่านไม่ถูกต้อง";
        require("setting_employee.php");
        return 0;
    }

    $sql_Employee_History = "SELECT * FROM `employee_history` WHERE His_ID='$His_ID'";
    $Employee_History_data = $connect->query($sql_Employee_History);

    while($row_em_his = mysqli_fetch_array($Employee_History_data))
    {
        $Emp_Address = $row_em_his['Emp_Address'];
        $EmpID_Card = $row_em_his['EmpID_Card'];
    }

    // echo $EmpID_Card;
    // $Unit = "SELECT * FROM unit";
    // $Unit_data = $connect->query($Unit);  

    // $sql_category = "SELECT * FROM category";
    // $category_data = $connect->query($sql_category);
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
    <title>Edit Employee</title>
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
    <form action="Edit_Employee.php" method="POST">

        <!-- <label for="start">Date: Sale</label>
        <input type="date" id="start" name="date_sale" value="2020-01-01" min="2020-01-01" max="2022-12-31"> --> 

        <div class="row">
            <div class="col-25">
                <label for="tb_Username">Username</label>
            </div>
            <div class="col-75">
                <input type="text" id="tb_Username" name="username" placeholder="Username....." value="<?php echo $Username; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="tb_password">รหัสผ่าน</label>
            </div>
            <div class="col-75">
                <input type="text" id="tb_password" name="password" placeholder="รหัสผ่าน....." value="<?php echo $Password; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="tb_password">ยืนยันรหัสผ่าน</label>
            </div>
            <div class="col-75">
                <input type="text" id="tb_password" name="confirm_password" placeholder="ยืนยันรหัสผ่าน....." value="<?php echo $Password; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="tb_name">ชื่อ</label>
            </div>
            <div class="col-75">
                <input type="text" id="tb_name" name="fname" placeholder="ชื่อ....." value="<?php echo $Emp_Name; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="tb_last_naem">นามสกุล</label>
            </div>
            <div class="col-75">
                <input type="text" id="tb_last_name" name="lname" placeholder="นามสกุล....." value="<?php echo $Emp_Lname; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="tb_address">ที่อยู่</label>
            </div>
            <div class="col-75">
                <input id="tb_address" name="address" placeholder="ที่อยู่....." value="<?php echo $Emp_Address; ?>" style="height:100px; width: 533px;">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="tb_phone">เบอร์โทร</label>
            </div>
            <div class="col-75">
                <input type="number" id="tb_phone" name="phone" placeholder="0123456789" value="<?php echo "0".$Emp_Phone; ?>" required>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="tb_ID_card">เลขประจำตัวประชาขน</label>
            </div>
            <div class="col-75">
                <input type="number" id="tb_ID_card" name="ID_card" placeholder="1234567891234 (ป้อนโดยไม่ต้องวรรณ)" value="<?php echo $EmpID_Card; ?>" required>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="subject">หมายเหตุ</label>
            </div>
            <div class="col-75">
                <input id="subject" name="comment" placeholder="หมายเหตุ....." value="<?php echo $commect ?>" style="height:100px">
            </div>
        </div>
        <!-- No HIS_ID use in update database -->
        <input type="hidden" name="check_pharmacy" value="<?php echo $Username; ?>">
        <input type="hidden" name="No" value="<?php echo $No; ?>">
        <input type="hidden" name="HIS_ID" value="<?php echo $His_ID; ?>">

        <div class="row">
            <input type="submit" value="ยืนยันการเปลี่ยนแปลง">
        </div>

        
    </form>

</body>
</html>


