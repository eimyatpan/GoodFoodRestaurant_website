<?php
    session_start();
    if(!isset($_SESSION["sess_user"]))
    {
        header("location:MemberWelcome.php");
    }else 
    {
?>
<html lang="en">
<head>
     <title>Food Menu</title>
    <link rel="stylesheet" href="css/fontaweson.css" type="text/css" />
    <link rel="stylesheet" href="css/assignment.css" />
    <script src="https://kit.fontawesome.com/d1382c1a6e.js" crossorigin="anonymous"></script>
</head>
<body>
<div id="header3">
        <img src="imgs/GFLogo.PNG" class="Logo">
        <h5 class="loginmember">Welcome, <?=$_SESSION['sess_user'];?>!</h5>
        <div class="header-text">
            <h1>Good Food Restaurant </h1>
            <p>Food Menu</p>
        </div>
    </div>
    
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
    <section id="food">
        <h2>Types of food</h2>
        <div class="food-container container">
            <div class="food-type fruite">
                <div class="img-container">
                    <img src="imgs/foodtype1.jpg" alt="fruits" />
                    <div class="img-content">
                        <h3>fruite</h3>
                    </div>
                </div>
            </div>
            <div class="food-type vegetable">
                <div class="img-container">
                    <img src="imgs/foodtype2.jpg" alt="vegetable" />
                    <div class="img-content">
                        <h3>vegetable</h3>
                    </div>
                </div>
            </div>
            <div class="food-type grin">
                <div class="img-container">
                    <img src="imgs/foodtype3.jpg" alt="grains" />
                    <div class="img-content">
                        <h3>grains</h3>
                    </div>
                </div>
            </div>
            <div class="food-type protein">
                <div class="img-container">
                    <img src="imgs/foodtype4.jpg" alt="protein" />
                    <div class="img-content">
                        <h3>protein food</h3>
                    </div>
                </div>
            </div>
            <div class="food-type dairy">
                <div class="img-container">
                    <img src="imgs/foodtype5.jpg" alt="dairy" />
                    <div class="img-content">
                        <h3>dairy</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
$host = "localhost";
$user = "root";
$passwd = "";
$database = "empcos108db";
$table_name = "product";
$connect = mysqli_connect($host,$user,$passwd,$database) 
            or die("could not connect to database");

$query = "SELECT * FROM $table_name";
mysqli_select_db($connect,$database);
$result = mysqli_query($connect,$query);

echo "<section id='food-menu'>";
echo "<h2 class='food-menu-heading'>Food Menu</h2>";       
echo "<div class='food-menu-container container'>";

if ($result) 
{
   
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
      $pname=$row['productname'];
      $pcat=$row['catname'];
      $price=$row['price'];
      $photo=$row['photo'];

      
       print "<div class='food-menu-item'>";
        print "<div class='food-img'>";
        print "<img src='".$photo."'controls width='100px' height='100px'>";
        print "</div>";

        print "<div class='food-description'>";
        print "<h2 class='food-titile'>".$pname."'</h2>";
        print "<p>'".$pcat."'</p>";
        print "<p class='food-price'>Price: &#36; '".$price."'</p>";
        print "</div>";
        print "</div>";
    }
    print "</div>";
    print "</section>";
    print "</table>";

}
else 
{ 
    die ("Query=$query failed!"); 
}
echo "</div>" ;
mysqli_close($connect);
?>
    <br>
    <hr>
    <br>
    <div style="background-color: #cadbee;padding-bottom: 25%;">
        <div class="conclu" style="padding-left: 2%;">
            <div style=" border-right: 1px solid white;">
            <li style="padding-left: 40px;padding-top: 24px;font-size: 26px;">Good Food Restaurant</li>
            <br>
            <li style="padding-left: 40px;">Center City</li>
            <li style="padding-left: 40px;">115 N. Charles St.</li>
            <li style="padding-left: 40px;">Baltimore, MD 21201</li>
            <li style="padding-left: 40px;">(410)-547-0550</li>
            <li style="padding-left: 40px;">6:30am - 3:00pm Mon - Fri</li>
            <li style="padding-left: 40px;padding-bottom: 50px">8:00am - 1:00pm Sat, Sunday closed</li>
            </div>
        </div>
        <div class="conclu">
            <div style="border-right: 1px solid white;">
                <div class="social">
                    <i class="fab fa-facebook-square"> </i>
                    <i class="fab fa-facebook-messenger"> </i>
                    <i class="fab fa-instagram-square"> </i>
                    <i class="fab fa-twitter-square"> </i>  
                </div>
                <div style="padding-left: 10%; padding-top: 7%;padding-bottom: 6.6%;">
                    <p>Contact : 09-765-227-382</p><br>
                    <h3>More Info</h3>
                    <p>goodfood@gmail.com</p><br>
            
                    <form target="_blank">
                        <div >
                            <input name="EMAIL" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email" class="btn6">
                            <button type="summit" class="btn5"><i class="fas fa-caret-right"></i></button>		
                        </div>				
                        <div class="mt-10 info"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="conclu">
            <div class="social social1" style="padding-bottom: auto; z-index: -100">
                <i class="fab fa-font-awesome-alt"> - Font Awesome</i><br>
                <i class="fab fa-bootstrap"> - Bootstrap</i><br>
                <i class="fab fa-google"> - Google</i>
            </div>
            
        </div>
    </div>
</body>
</html>
<?php
}
?>