<!DOCTYPE html>
<html lang="en">
<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
        session_start();
        // Change this to your connection info.
        $mysqli = new mysqli("mysql.eecs.ku.edu", "m552s493", "chahcee4", "m552s493");
        if ( mysqli_connect_errno() ) {
            // If there is an error with the connection, stop the script and display the error.
            exit('Failed to connect to MySQL: ' . mysqli_connect_error());
        }
        // Now we check if the data from the login form was submitted, isset() will check if the data exists.
        if ( !isset($_POST['username'], $_POST['password']) ) {
            // Could not get the data that should have been sent.
            exit('Please fill both the username and password fields!');
        }
    $query = "SELECT EMAIL, PASSWORD, ADDRESS from USERS ORDER by UID ASC";
    $flag = TRUE;
    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            if($row["EMAIL"] == $_POST['username'] and $row["PASSWORD"] == $_POST['password'])
            {
                //session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $_POST['username'];
                $flag = FALSE;
                // echo "<p> fdjfdjkfd:  " . $row["EMAIL"] . "</p>";
                // echo "<p> fdjfjdfjdsl: " . $row["PASSWORD"] . "</p>";
                header('Location: https://people.eecs.ku.edu/~m552s493/Databases-Project/home.php');
                //echo "<p> Welcome " . $_SESSION['name'] . "</p>";
                
            }
            // echo "<p> Email:  " . $row["EMAIL"] . "</p>";
            // echo "<p> Password: " . $row["PASSWORD"] . "</p>";
        }
        if($flag)
        {
            $_SESSION['loggedin'] = FALSE;   
            echo "<p> Incorrect username and/or password! </p>";
        }
        /* free result set */
        $result->free();
       }
        // if ($stmt = $mysqli->prepare('SELECT EMAIL, PASSWORD FROM USERS WHERE username = ?')) {
        //     // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        //     $stmt->bind_param('s', $_POST['username']);
        //     $stmt->execute();
        //     // Store the result so we can check if the account exists in the database.
        //     $stmt->store_result();
        //     if ($stmt->num_rows > 0) {
                
        //         $stmt->bind_result($EMAIL, $PASSWORD);
        //         $stmt->fetch();
        //         // Account exists, now we verify the password.
        //         // Note: remember to use password_hash in your registration file to store the hashed passwords.
        //         // if ($_POST['password'] === $password) {
        //         //     // Verification success! User has logged-in!
        //         //     // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
        //         //     session_regenerate_id();
        //         //     $_SESSION['loggedin'] = TRUE;
        //         //     $_SESSION['name'] = $_POST['username'];
        //         //     $_SESSION['id'] = $EMAIL;
        //         //     echo '<p>Welcome ' . $_SESSION['name'] . '!</p>';
        //         // } else {
        //         //     // Incorrect password
        //         //     echo '<p>Incorrect username and/or password!</p>';
        //         // }
        //         echo "<p>hi??</p>"
        //     } else {
        //         // Incorrect username
        //         echo '<h1>Incorrect username and/or password!</h1>';
        //     }
            
        
        //     $stmt->close();
        // }
        $mysqli->close();
    ?>
    </body>
</html>