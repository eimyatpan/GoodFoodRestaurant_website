
<?php
   session_start();
   if(isset($_SESSION["sess_user"]))
   {
       session_destroy();
       header('location: MemberLogout.html');
   }
   else{
       header('location: index.php');
   }
?>

