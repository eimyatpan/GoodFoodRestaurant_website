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
	<h1 class="page-header text-center">PRODUCTS LISTS</h1>
	<div class="row">
		<div class="col-md-12">
		
			<a href="#addproduct" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Product</a>
		</div>
	</div>
	<div style="margin-top:10px;">
		<table class="table table-striped table-bordered">
			<thead>
				<th>Photo</th>
				<th>Product Name</th>
                <th>Category Name</th>
				<th>Price</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
                 $host = "localhost";
                 $user = "root";
                 $passwd = "";
                 $database = "empcos108db";
                 $table_name = "product";
                 $conn = mysqli_connect($host,$user,$passwd,$database) 
                             or die("could not connect to database");
					$sql="select * from $table_name order by catname asc";
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td><a href="<?php if(empty($row['photo'])){echo "upload/noimage.jpg";} else{echo $row['photo'];} ?>"><img src="<?php if(empty($row['photo'])){echo "upload/noimage.jpg";} else{echo $row['photo'];} ?>" height="30px" width="40px"></a></td>
							<td><?php echo $row['productname']; ?></td>
                            <td><?php echo $row['catname'];?></td>
							<td>&#36; <?php echo number_format($row['price'], 2); ?></td>
							<td>
								<a href="#editproduct<?php echo $row['productid']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a> || <a href="#deleteproduct<?php echo $row['productid']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
								<?php include('product_modal.php'); ?>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php include('modal.php'); ?>

</body>
</html>
<?php
}
?>