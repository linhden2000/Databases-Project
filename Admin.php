<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Admin</title>
</head>

<body>
  <?php
  // Get product's information from the POST request
  $mysqli = new mysqli("mysql.eecs.ku.edu", "m552s493", "chahcee4", "m552s493");
  $product_name = $_POST['product'];
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
  $sql = "INSERT INTO PRODUCTS (NAME, PRICE, QUANTITY, IMAGE) VALUES ('$product_name', '$price', '$quantity', '$image_URL')";
  if ($mysqli->query($sql) === TRUE) {
    echo "<p>Product has been added</p>";
  } else {
    echo "<p>Error, Product is not added</p>";
  }
  $mysqli->close();

  // Error message output function
  function error($msg)
  {
  ?>
    <form method="GET" action="CreateUser.html">
      <div class="container" style="background-color:#f1f1f1">
        <span>Error: <?= $msg ?></span>
        <button class="cancelbtn" type="submits">Try again!</button>
      </div>
    </form>
  <?php
  }
  ?>

<br><a href='Admin.html'>Back to Admin Home </a>
</body>

</html>