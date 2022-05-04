<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
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
  $pid = $_SESSION['pid'];

    $sql = "DELETE FROM PRODUCTS WHERE PID=$pid";
    if ($mysqli->query($sql) === TRUE) {
        echo "<p>Product has has been removed</p>";
        } else {
        echo "<p>Error, Product could not be removed</p>";
        }
  
  $mysqli->close();

  ?>

<br><a href='Admin.html'>Back to Admin Home </a>

</body>

</html>