<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Shipment</title>
</head>
<body>
<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  // Get product's information from the POST request
  $mysqli = new mysqli("mysql.eecs.ku.edu", "m552s493", "chahcee4", "m552s493");

  // if ($product_name == '' || $price == '' || $quantity == '' || $image_URL == '') {
  //   error('None of the field should be empty');
  // }
  if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }
  // Insert product to the Products table
  session_start();
  $oid = $_POST['oid'];
  $status= $_POST ['status'];
    $sql = "UPDATE ORDERS SET STATUS='$status' WHERE OID=$oid";
    if ($mysqli->query($sql) === TRUE) {
        echo "<p>Order status has has been updated</p>";
        } else {
        echo "<p>Error, order status could not be changed</p>";
        }
  
  $mysqli->close();

  ?>
  <br><a href='Admin.html'>Back to Admin Home </a>

</body>
</html>
