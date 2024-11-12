<?php
	$host = "localhost";
    $user = "root";
    $passwd = "";
    $database = "empcos108db";
    $table_name = "product";
    $conn = mysqli_connect($host,$user,$passwd,$database) 
                or die("could not connect to database");

	$id=$_GET['product'];

	$pname=$_POST['pname'];
	$category=$_POST['category'];
	$price=$_POST['price'];

	$sql="select * from product where productid='$id'";
	$query=$conn->query($sql);
	$row=$query->fetch_array();

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if (empty($fileinfo['filename'])){
		$location = $row['photo'];
	}
	else{
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["photo"]["tmp_name"],"foodmenu/" . $newFilename);
		$location="foodmenu/" . $newFilename;
	}

	$sql="update product set productname='$pname', catname='$category', price='$price', photo='$location' where productid='$id'";
	$conn->query($sql);

	header('location:product.php');
?>