<?php
   session_start();
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "database";
   $conn = mysqli_connect($servername, $username, $password, $dbname);

   if (!$conn) 
      {
         echo "Not connected";
      };


   session_start();
   session_unset();
   session_destroy();

   header('location:login.php');

?>
