<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Current User</title>
</head>
<body>
    
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
        $mysqli = new mysqli("mysql.eecs.ku.edu", "m552s493", "chahcee4", "m552s493");
        // Check connection
        if($mysqli -> connect_errno){
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
        else{
            session_start();
            $uid = $_POST['uid'];
            $name= $_POST ['name'];
            $email = $_POST['email'];
            $phonenum= $_POST ['phonenum'];
            $adress = $_POST['address'];
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
