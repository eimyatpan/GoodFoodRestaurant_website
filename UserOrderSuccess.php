<?php
session_start();
if(!isset($_SESSION["sess_pid"])){
    header("location:UserOrder.php");
} 
else {
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order</title>
    <link rel="stylesheet" type="text/css" href="css/assignment.css">
    <link rel="stylesheet" href="css/fontaweson.css" type="text/css">
        <script src="https://kit.fontawesome.com/d1382c1a6e.js" crossorigin="anonymous"></script>
        <style>  
         .error {color: #FF0001;}  
    </style> 
</head>

<body>
<div id="header1">
        <img src="imgs/GFLogo.PNG" class="Logo">
        <h5 class="loginmember">Welcome, <?=$_SESSION['sess_user'];?>!</h5>
       
   
    <div id="sideNav"> 
        <nav>
            <ul>
                <li><a href="MemberWelcome.php">Home</a></li>
                <li><a href="UserPView.php">Food Menu</a></li>
                <li><a href="UserOrder.php">Food Order</a></li>
                <li><a href="UserReview.php">Customer Review</a></li>
                <li><a href="MemberLogout.php">Log out</a></li>
            </ul>
        </nav>
    </div>
    <div id="Manubtn">
        <img src="imgs/Menu.png"id="manu">
        <script>
            var Manubtn = document.getElementById("Manubtn")
            var sideNav = document.getElementById("sideNav")
            var manu = document.getElementById("manu")
            sideNav.style.right == "-250px";
            Manubtn.onclick=function()
            {
                if(sideNav.style.right == "-250px")
                {
                    sideNav.style.right = "0";
                    manu.src="imgs/Cross.png";
                }else
                {
                    sideNav.style.right = "-250px";
                    manu.src="imgs/Menu.png";
                }
            }
        </script>
    </div>
</center>

<center>
    <br><br><br><br>
    <h1 class="page-header text-center">Order Success!!!</h1>
    <P>  Thanks for your shopping with us </p>
    <p><h3>your order id is  <?=$_SESSION['sess_pid'];?>!</h3></p>
</center>

</div>
    
 </body>
</html>
<?php
}
?>
