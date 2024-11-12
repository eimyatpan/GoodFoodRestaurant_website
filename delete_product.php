<?php
$host = "localhost";
$user = "root";
$passwd = "";
$database = "empcos108db";
$table_name = "product";
$conn = mysqli_connect($host,$user,$passwd,$database) 
            or die("could not connect to database");
	$id = $_GET['product'];

	$sql="delete from product where productid='$id'";
	$conn->query($sql);

	header('location:product.php');
?>