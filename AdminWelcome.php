<?php
session_start();
if(!isset($_SESSION["sess_admin"])){
    header("location:AdminLogin.php");
} 
else {
?>
<!DOCTYPE html>
<html>
<head>
           <meta charset = 'utf-8'>
           <title>Admin Welcome Page</title>
          <link rel="stylesheet" type="text/css" href="css/admin.css"/>
          <link rel="stylesheet" href="css/assignment.css" type="text/css">
</head>
<body>
<center>
<img src="imgs/GFLogo.PNG" margin="auto" width="100px" height="100px"></img>
<p>
<nav>
    <h3>Welcome, Admin <?=$_SESSION['sess_admin'];?>!</h3>
   <div class="topnav" id="myTopnav">
   <a href="AdminViewCustomer.php">Customer Details</a>
    <a href="product.php"> Products</a>
    <a href="AViewOrder.php">View Orders</a>
    <a href="AdminViewReview.php">Views Customer Recommandation</a>
    <a href="AdminLogout.php">Logout</a>        
   </div>
</nav>
</p>
</center>
<div class="entries">
      <center>  <h1>Log In Successfully!!! </h1> </center>
</div>
</body>
</html>
<?php
}
?>