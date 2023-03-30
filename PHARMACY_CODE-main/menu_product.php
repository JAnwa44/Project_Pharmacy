<!DOCTYPE html>
<html>
<head>

<title>PHAMACY</title>
    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
   <link rel = "stylessheet" href= ""styles.css>
   <style>
       .container{
           position:relative;
           min-height : 100vh;
       }
       .bg{
           width: 100%;
           height:100%;
           position: relative;
       }
       .bg::after{
           content:"";
           position:absolute;
           top: 0;
           left: 0;
           width: 100%;
           height: 100%;
           background-image:url('https://pharmaceutical-journal.com/wp-content/uploads/2021/01/It-s-not-just-medicines-that-improve-health.jpg');
           z-index:-1;
           filter: brigthness(45%);
       }
       /*content*/
       .content .header{
           width:85%;
           margin: 0 auto;
           position:absolute;
           top:20%;
           left:50;
       }
       .content .header,.grid-card{
           width:50%;
           position: relative;
       }
       /* .content .grid-card{
           display:flex;
       } */
       .content .header{
           color: #fff;
           padding : 20px;
       }
       .content .header .h1{
           font-size:2.3rem;
       }
       .grid-card{
           display:grid;
           grid-template-columns:auto auto;
           grid-gap:25px;
       }
       .grid-card .box{
           width:100%;
           height: 230px;
           background-position:center;
           background-size:cover;
           border-radius:25px;
           position:relative;
           left:50px;
           transition:.4s;
       }
       
       .bg1{
           background-image:url('https://thailandbarcode.com/data/images/Program%20Stock%20(1).jpg');
       }
       .bg2{
           background-image:url('https://th.jobsdb.com/th-th/wp-content/uploads/sites/3/2014/09/%E0%B8%AB%E0%B8%A5%E0%B8%B1%E0%B8%81%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%84%E0%B8%B1%E0%B8%94%E0%B9%80%E0%B8%A5%E0%B8%B7%E0%B8%AD%E0%B8%81%E0%B8%9E%E0%B8%99%E0%B8%B1%E0%B8%81%E0%B8%87%E0%B8%B2%E0%B8%99%E0%B9%83%E0%B8%AB%E0%B8%A1%E0%B9%88.png');
       }
       .bg3{
           background-image:url('https://cdn.shopify.com/s/files/1/0474/2732/2017/files/3_a4af164c-a28a-4b20-9b7a-0dd61956eefd_480x480.jpg?v=1604739742');
       }
       .bg4{
           background-image:url('https://s.isanook.com/he/0/ud/0/589/drug_store_save.jpg');
       }
       .content .box h2{
           position:absolute;
           bottom:7px;
           left:15px;
           color:#fff;
       }
       .content .box:hover{
           transform:translate(-15px);
       }


   </style>
    
  <link rel = "stylessheet" href= ""styles.css>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body {
  font-family: 'Lato', sans-serif;
}

.overlay {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
  overflow-x: hidden;
  transition: 0.5s;
}

.overlay-content { /*windown*/
  position: relative;
  top: 25%;
  width: 50%;
  text-align: center;
  margin-top: 30px;
}

.overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color: #818181;
  display: block;
  transition: 0.3s all;
}

.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}

.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

@media screen and (max-height: 450px) {
  .overlay a {font-size: 20px}
  .overlay .closebtn {
  font-size: 40px;
  top: 15px;
  right: 35px;
  }
}
</style>
</head>
<body>
<!-- <?php
    require("main_page.php");
?> -->
<nav class="navbar navbar-light bg-light justify-content-center">
        <a class="navbar-brand">PHAMACY DATABASE MANAGMENT</a>
        <form action="login.php" class="form-inline">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">LOGOUT</button>
        </form>
    </nav>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a  class="nav-link active"  href="main_page.php">HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="report_page.php">REPORT</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="font-size:30px;cursor:pointer" href="menu_product.php">PRODUCT</a>
        </li>
            
        <li class="nav-item">
            <a class="nav-link" href="sale_data.php">SALE</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="menu_employee.php">EMPLOYEE</a>
        </li>
    </ul>
    <div class = "container bg">
        <div class="content">
            <div class = "header">
                <h1>PHAMACY DATABASE </h1>
                <P>Lorem ipsum dolor sit amet. consectetuer adipiscing elit.
                    sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam. </P>
            </div>
            <div class = "grid-card">
                <div class ="box bg1">
                    <h2>STOCK DATA</h2>
                </div>
                <div class ="box bg2">
                    <h2>EMPLOYEE DATA</h2>
                </div>
                <div class ="box bg3">
                    <h2>PRODUCT DATA</h2>
                </div>
                <div class ="box bg4">
                    <h2>SALE DATA</h2>
                </div>
            </div>
        </div>
    </div>
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

<div id="myNav" class="overlay">
  <a href="main_page.php" class="closebtn" onclick="closeNav()" >&times;</a>
  <div class="overlay-content">
    <a href="main_page.php">Home</a>
    <a href="Add_product.php">Add</a>
    <a href="Stock_Product.php">Stock</a>
    <a href="Brand_Product.php">BRAND</a>
    <a href="setting_Unit.php">Unit</a>
    <a href="setting_Category.php">Category</a>

    <!-- <a href="#">Clients</a>
    <a href="#">Contact</a> -->
    
  </div>
</div>

<!-- <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span> -->

<script>
document.getElementById("myNav").style.width = "14%";
function openNav() {
  document.getElementById("myNav").style.width = "14%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
</script>
     
</body>
</html>
