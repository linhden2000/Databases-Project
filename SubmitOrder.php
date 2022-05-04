<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Order</title>
</head>

<body>
    <?php
    session_start();
    $user_email = 'guest';
    if (isset($_SESSION['loggedin'])) {
        $user_email = $_SESSION['id'];
    }
    $mysqli = new mysqli("mysql.eecs.ku.edu", "m552s493", "chahcee4", "m552s493");
    // Get all chosen products
    $add = $_POST["add"];
    // Creat Order for each chosen products
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    foreach ($add as $product) {
        // Get the price of product
        $get_price = "SELECT PRICE, NAME, QUANTITY FROM PRODUCTS WHERE PID = '$product'";

        if ($result = $mysqli->query($get_price)) {
            while ($row = $result->fetch_assoc()) {
                $price = $row["PRICE"];
                $quantity = $row["QUANTITY"];
                // Check if product is out of stock
                if ($quantity == 0) {
                    echo "<p>" . $row["NAME"] . " is out of stock";
                } else {
                    // IF not add to the order
                    $sql = "INSERT INTO ORDERS (STATUS, PRICE, PID, EMAIL) VALUES ('INCOMPLETE', '$price', '$product', '$user_email')";
                    if ($mysqli->query($sql) === TRUE) {
                        echo "<p>" . $row["NAME"] .  " is added to order successfully</p>";
                        $update_quantity = "UPDATE PRODUCTS SET QUANTITY = QUANTITY - 1 WHERE PID = $product";
                        $mysqli->query($update_quantity);
                    } else {
                        echo "Can not add this item";
                    }
                }
            }
        }
        // Insert product into order
        // $sql = "INSERT INTO ORDERS (STATUS, PRICE, PID, EMAIL) VALUES ('INCOMPLETE', '$price', '$product', '$user_email')";


    }
    ?>
</body>

</html>