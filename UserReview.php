<?php
    session_start();
    if(isset($_SESSION["sess_user"]))
    {
?>
    <html lang="en">
    <head>
        <title>Customer Review</title>
        <link rel="stylesheet" href="css/fontaweson.css" type="text/css" />
        <link rel="stylesheet" href="css/assignment.css" />
        <script src="https://kit.fontawesome.com/d1382c1a6e.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <section id="header4">
            <img src = "imgs/GFLogo.PNG"class="Logo">
            <h5 class="loginmember">Please Write Your Comment For Us, <?=$_SESSION['sess_user'];?>!</h5>
            <br>  
            <div id="sideNav">  
                <nav>
                    <ul>
                        <li><a href="Home.html">Home</a></li>
                        <li><a href="AboutRestaurant.html">About Restaurant</a></li>
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
        <section id="contact">
            <div class="contact-container container">
                <div class="contact-img">
                <img src="imgs/revew.jpg" alt="" />
                </div>
                <div class="form-container">
                    <h2>Contact Us</h2>
                    <form name="customerReview" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"method="post">
                        <input type="text" name="productname" placeholder=" Product Name" />
                        <input type="text" name="email" placeholder=" E-Mail" />
                        <textarea cols="30" rows="6" name="comment"placeholder=" Type Your Message"></textarea>
                        <div class="control">
                            <input type="submit" value="Submit" name="submit"/>
                            <input type="reset" value="Clear"/>
                        </div>
                    </form>
                </div>
            </div>
        </section>
     
    <?php  
    if(isset($_POST['submit'])) 
    {         
        $host = "localhost";
        $user = "root";
        $passwd = "";
        $database = "empcos108db";
        $dbusername=$_SESSION['sess_user'];
        
        $connect = mysqli_connect($host,$user,$passwd,$database) or die("could not connect to database");
        $query = "SELECT memberid FROM member WHERE membername='".$dbusername."'";
        mysqli_select_db($connect,$database);
        $result = mysqli_query($connect,$query);

        if ($result) 
        {
   
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
                $userid=$row['memberid'];
                $sql="INSERT INTO customer_review(productname,memberid,email,date,comment)
                VALUES('$_POST[productname]','$userid','$_POST[email]',NOW(),'$_POST[comment]')";

                if (!mysqli_query($connect,$sql))
                {
                    die('Error: ' . mysqli_error($connect));
                }else
                {  
                    echo "Successfully Added!";      
                }
                mysqli_close($connect); 
            }
        }else 
        { 
            die ("Query=$query failed!"); 
        }
    }
    ?>

    
</body>
</html>
<?php
}
?>