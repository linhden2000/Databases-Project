<?php
   session_start();
   session_destroy();
   header('Location: https://people.eecs.ku.edu/~m552s493/Databases-Project/index.html');
   exit;
?>