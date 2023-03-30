<?php
    $No = $_POST['No'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin : 0;
            padding: 0;
            box-sizing:border-box;
            font-family: 'Roboto', sans-serif;
        }
        body{
            height: 100vh;
            width: 100%;
            background-image:linear-gradient(130deg,#bdc3c7,rgba(52, 152, 219,1.0));
            display:flex;
            justify-content:center;
            align-items:center;
        }
        form.container{
            display:flex;
            flex-direction:column;
            align-items: center;
        }
        h1{
            margin:20px;
            color:#fff;
            font-weight:300;
            justify-content:center;
        }
        input{
            border:none;
            height:50px;
            width:250px;
            margin:10px 0;
            font-size:1rem;
            outline:none;
            text-align:center;
            border-radius : 5px;
            transition:.5s;
            cursor:pointer;
        }
        .textbox{
            color:#fff;
            background: rgba(255,255,255,0.2);
            border:1px solid rgba(255,255,255,0.4);
        }
        .textbox::placeholder{
            color:#fff;
        }
        .textbox:hover,
        .textbox:focus{
            background:#fff;
            width:350px;
            color:#1abc9c;
        }
        .btn-submit{
            background:#fff;
            color: #1abc9c;
        }
        .btn-submit{
            color: #fff;
            background: #1abc9c;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
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
    <form action="setting_employee.php" method="POST">
        <input type="submit" value="Back">
    </form>
 <div class="login">
    <h1>Verify</h1>
        <form action="Delete_Employee.php" method="POST">
            <input type="hidden" name="No" value="<?php echo $No; ?>">
            <input class="textbox" name="verify" type="password" placeholder="Password" required="required" /><br>
            <input class="btn-submit" type="submit" value="Verify">
        </form>
    </div>
</body>
</html>