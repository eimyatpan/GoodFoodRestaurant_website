<?php
    $host = "localhost";
    $user = "root";
    $passwd = "";
    $database = "empcos108db";                        
    $conn = mysqli_connect($host,$user,$passwd,$database) 
    or die("could not connect to database");

    if(isset($_POST['productid'])){
 
        $customer=$_POST['customer'];
        $contact=$_POST['contactno'];
        $email=$_POST['email'];
        $age=$_POST['age'];
        $address=$_POST['address'];
        $remarks=$_POST['remarks'];
        $sql="insert into foodorder (customername,contact_no,email,age, orderdate,address,remarks) values ('$customer','$contact','$email','$age', NOW(),'$address','$remarks')";
        $conn->query($sql);
        $orderid=$conn->insert_id;
 
        $total=0;
 
        foreach($_POST['productid'] as $product):
        $proinfo=explode("||",$product);
        $productid=$proinfo[0];
        $iterate=$proinfo[1];
        $sql="select * from product where productid='$productid'";
        $query=$conn->query($sql);
        $row=$query->fetch_array();
 
        if (isset($_POST['quantity_'.$iterate])){
            $subt=$row['price']*$_POST['quantity_'.$iterate];
            $total+=$subt;
            $sql="insert into foodorder_details(productid, orderid, quantity) values ('$productid', '$orderid', '".$_POST['quantity_'.$iterate]."')";
            $conn->query($sql);
        }
        endforeach;
        
        $sql="update foodorder set totalprice='$total' where orderid='$orderid'";
        $conn->query($sql);        
        session_start();
        $_SESSION['sess_pid']=$orderid;        
        header('location:UserOrderSuccess.php');                
    }
    else{
        ?>
        <script>
            window.alert('Please select a product');
            window.location.href='UserOrder.php';
        </script>
        <?php
    }
?>
