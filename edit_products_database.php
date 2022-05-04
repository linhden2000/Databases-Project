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
  $product_name = $_POST['name'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $image_URL = $_POST['image'];
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
  if($product_name != "")
  {
    $sql = "UPDATE PRODUCTS SET NAME='$product_name' WHERE PID=$pid";
    if ($mysqli->query($sql) === TRUE) {
        echo "<p>Product name has been updated</p>";
      } else {
        echo "<p>Error, Product name is not updated</p>";
      }
  }
  if($price != "")
  {
    $sql = "UPDATE PRODUCTS SET PRICE=$price WHERE PID=$pid";
    if ($mysqli->query($sql) === TRUE) {
        echo "<p>Product price has been updated</p>";
      } else {
        echo "<p>Error, Product price is not updated</p>";
      }
  }
  if($quantity != "")
  {
    $sql = "UPDATE PRODUCTS SET QUANTITY=$quantity WHERE PID=$pid";
    if ($mysqli->query($sql) === TRUE) {
        echo "<p>Product quantity has been updated</p>";
      } else {
        echo "<p>Error, Product quantity is not updated</p>";
      }
  }
  if($image_URL != "")
  {
    $sql = "UPDATE PRODUCTS SET IMAGE='$image_URL' WHERE PID=$pid";
    if ($mysqli->query($sql) === TRUE) {
        echo "<p>Product image has been updated</p>";
      } else {
        echo "<p>Error, Product image is not updated</p>";
      }
  }
  $mysqli->close();

  ?>

<br><a href='Admin.html'>Back to Admin Home </a>

</body>

</html>