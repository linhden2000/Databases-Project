<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Shipment</title>
</head>
<body>
    <?php
        $user = $_POST["OID"];
        $mysqli = new mysqli("mysql.eecs.ku.edu", "m552s493", "chahcee4", "m553s493");
        // Check connection
        echo "<h1>" . $user . "</h1>";
        if($mysqli -> connect_errno){
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
        else{
            $data = "SELECT SHIPS.OID, SHIPMENT.CARRIER FROM SHIPS, SHIPMENT WHERE OID='$user' AND SHIPMENT.SID = SHIPS.SID;";
            echo "Displaying orders from user " . $user . "<br><br><br>";
            if ($result = $mysqli->query($data))
            {
            echo "<table border='1'><tr><th>Order ID </th><th>Post </th></tr>";
                while($row = $result->fetch_assoc())
                {
                    echo "<tr><td>" . $row["SHIPS.OID"] . "</td><td>" . $row["SHIPMENT.CARRIER"] . "</td></tr>";
                }
                echo "</table><br><br> ";
                $result->free();
            }
            else
            {
                echo "No user found";
            }

            echo "<br><a href='AdminHome.html'>Back to Admin Home </a>";

            
    }
        $mysqli->close();
    ?>
</body>
</html>
