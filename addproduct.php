
<?php
	$host = "localhost";
    $user = "root";
    $passwd = "";
    $database = "empcos108db";
    $table_name = "product";
    $conn = mysqli_connect($host,$user,$passwd,$database) 
                or die("could not connect to database");

	$pname=$_POST['pname'];
	$category=$_POST['category'];
	$price=$_POST['price'];

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if(empty($fileinfo['filename'])){
		$location="";
	}
	else{
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"foodmenu/" . $newFilename);
	$location="foodmenu/" . $newFilename;
	}
	
	$sql="insert into product (productname, catname, price, photo) values ('$pname', '$category', '$price', '$location')";
	$conn->query($sql);

	header('location:product.php');

?>
</body>
</html>
