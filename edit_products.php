<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "m552s493", "chahcee4", "m552s493");

    if ($mysqli->connect_errno)
    {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

      $user = $_POST['pid'];
      session_start();
      $_SESSION['pid'] = $user;
    $data = "SELECT * FROM PRODUCTS WHERE PID='$user';";
    echo "Displaying information from product " . $user . "<br><br><br>";
    if ($result = $mysqli->query($data))
    {
      echo "<table border='1'><tr><th>PID</th><th>Name</th><th>Price</th><th>Quantity</th><th>Image</th></tr>";
        while($row = $result->fetch_assoc())
		{
            $text = "<tr><td>" . $row["PID"] . "</td><td>" . $row["NAME"] . "</td>";
			echo $text . "<td>" . $row["PRICE"] . "</td><td>" . $row["QUANTITY"] . "</td><td>" . $row["IMAGE"] . "</td></tr>";
		}
        $image = $row["IMAGE"];
        echo "</table><br><br> ";
        $result->free();
    }
    else
    {
        echo "No product found";
    }

    //echo "<br><a href='Admin.html'>Back to Admin Home </a>";

    $mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<style>
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
<body>

<h2>Remove listing</h2>
<form action="remove_product.php">
    <input type="submit" value="Remove listing" />
</form>

<h2>Edit listing</h2>
    <!-- Admin's add product to sell -->
    <form method="POST" action="edit_products_database.php">
      <div class="container">
        <label for="product">Name</label>
        <input type="text" name="name" placeholder="Enter new product's name" value="">
      </div>
      <div class="container">
        <label for="price">Price</label>
        <input type="text" name="price" placeholder="Enter new price in $" value="">
      </div>
      <div class="container">
        <label for="quantity">Quantity</label>
        <input type="text" name="quantity" placeholder="Enter the new quantity" value="" >
      </div>
      <div class="container">
        <label for="image">Image</label>
        <input type="text" name="image" placeholder="Insert new Image URL">
      </div>
      <div class="container">
        <button type="submit">Change listing</button>
      </div>
    </form>
    <br><a href='Admin.html'>Back to Admin Home </a>
</body>


