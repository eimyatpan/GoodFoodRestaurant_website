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
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<div class="container">
	<h1 class="page-header text-center">Customer Details</h1>
	<div style="margin-top:10px;">
		<table class="table table-striped table-bordered">
			<thead>
                <th style="text-align:center">Customer Name</th>
                <th style="text-align:center">Email</th>
			</thead>
			<tbody>
            <?php 
                $host = "localhost";
                $user = "root";
                $passwd = "";
                $database = "empcos108db";                        
                $conn = mysqli_connect($host,$user,$passwd,$database) 
                or die("could not connect to database");

                $sql="select * from member";
                $query=$conn->query($sql);
                while($row=$query->fetch_array()){
                    ?>
                    <tr>
                        <td style="text-align:center"><?php echo $row['membername']; ?></td>
                        <td style="text-align:center"><?php echo $row['email']; ?></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
		</table>
	</div>
</div>
</center>
 </body>
</html>
<?php
}
?>