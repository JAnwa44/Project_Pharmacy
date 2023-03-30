<?php

$connect = new PDO("mysql:host=localhost;dbname=main_pharmacy", "root", "");

if(isset($_POST["type"]))
{
 if($_POST["type"] == "ID_medicine_data")
 {
  $query = "SELECT * FROM product ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $data = $statement->fetchAll();
  foreach($data as $row)
  {
   $output[] = array(
    'id'  => $row["No"],
    'name'  => $row["Pro_ID"]
   );
  }
  echo json_encode($output);
 }
}

?>
