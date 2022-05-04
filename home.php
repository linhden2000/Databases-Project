<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (isset($_SESSION['loggedin'])) {
    if($_SESSION['admin'])
    {
        header('Location: https://people.eecs.ku.edu/~m552s493/Databases-Project/Admin.html');
	    exit;
    }
    else
    {
        header('Location: https://people.eecs.ku.edu/~m552s493/Databases-Project/home.html');
	    exit;
    }
	
}
else
{
    header('Location: https://people.eecs.ku.edu/~m552s493/Databases-Project/index.html');
    exit;
}
?>