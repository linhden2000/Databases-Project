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
            $query = "SELECT NAME, EMAIL, PHONENUM, ADDRESS from USERS ORDER by UID ASC";
            if ($result = $mysqli->query($query)) {
                /* fetch associative array */
                while ($row = $result->fetch_assoc()) {
                    echo "<p> Username: " . $row["NAME"] . "</p>";
                    echo "<p> Email:  " . $row["EMAIL"] . "</p>";
                    echo "<p> Phone Number: " . $row["PHONENUM"] . "</p>";
                    echo "<p> Address: " . $row["ADDRESS"] . "</p>";
                }
                /* free result set */
                $result->free();
               }
        }
        $mysqli->close();
    ?>
</body>
</html>
