<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   session_destroy();
   echo "Logged out! you will be redirected to the login page shortly";
   header('Refresh: 2; URL = login.php');

?>
