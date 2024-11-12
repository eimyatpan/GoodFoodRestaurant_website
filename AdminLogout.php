<?php
   session_start();
   if(isset($_SESSION["sess_admin"]))
   {
       session_destroy();
       header('location: AdminLogin.html');
   }
   else{
       header('location: index.php');
   }
?>