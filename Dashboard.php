<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <style>
        body {
          margin: 0;
          font-family: Arial, Helvetica, sans-serif;
        }

        .topnav {
          overflow: hidden;
          background-color: #333;
        }

        .topnav a {
          float: left;
          color: #f2f2f2;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
          font-size: 17px;
        }

        .topnav a:hover {
          background-color: #ddd;
          color: black;
        }

        .topnav a.active {
          background-color: #4CAF50;
          color: white;
        }
        </style>
</head>
<body>
    <div class="topnav">
        <a href="home.html">Home</a>
    </div>
    <?php
        $mysqli = new mysqli("mysql.eecs.ku.edu", "m552s493", "chahcee4", "m552s493");
        // Check connection
        if($mysqli -> connect_errno){
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
        else{
            $query = "SELECT NAME, PRICE, QUANTITY, IMAGE from PRODUCTS ORDER by PID ASC";
            if ($result = $mysqli->query($query)) {
                /* fetch associative array */
                while ($row = $result->fetch_assoc()) {
                    echo '<img src="img1.jpg"/>';
                    echo "<p>  Product Name: " . $row["NAME"] . "</p>";
                    echo "<p> Price: " . $row["PRICE"] . "</p>";
                    echo "<p> Quantity: " . $row["QUANTITY"] . "</p>";
                    echo "<button type="submit">Submit</button>";
                }
                /* free result set */
                $result->free();
               }
        }
        $mysqli->close();
    ?>
</body>
</html>
