
<!DOCTYPE html>
<html lang="en">
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
<div>
        <img src="imgs/GFLogo.PNG" class="Logo">
        
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
    <div class="entries">
    <h2 class='food-menu-heading'>Food Order Form</h2>
    <center>
    <form method="POST" action="UserOrder1.php">
        <table  cellpadding=10 >
            <thead>
                <th><input type="checkbox" id="checkAll"></th>
                <th style="text-align:center" colspan=3>Food Images</th>
                <th style="text-align:center" colspan=2>Food Name</th>
                <th style="text-align:center" colspan=2>Catagory Name</th>
                <th style="text-align:center" colspan=2>Price</th>
                <th style="text-align:center" colspan=2>Quantity</th>
            </thead>
            <tbody>
                <?php  
                    $host = "localhost";
                    $user = "root";
                    $passwd = "";
                    $database = "empcos108db";                        
                    $conn = mysqli_connect($host,$user,$passwd,$database) 
                    or die("could not connect to database");
                    $sql="select * from product";                    
                    $query=$conn->query($sql);
                    $iterate=0;//for looping
                    while($row=$query->fetch_array()){
                        ?>
                        <tr>
                            <td>
                            <input type="checkbox" value="<?php echo $row['productid']; ?>||<?php echo $iterate; ?>" name="productid[]" style="">
                            </td>
                            <td style="text-align:center" colspan=3><img src="<?php echo $row['photo']; ?>" controls width=200px height=200px></td>
                            <td style="text-align:center" colspan=2><?php echo $row['productname']; ?></td>
                            <td style="text-align:center" colspan=2><?php echo $row['catname']; ?></td>
                            <td style="text-align:center" colspan=2>&#36; <?php echo number_format($row['price'], 2); ?></td>
                            <td style="text-align:center" colspan=2><input type="text" class="form-control" name="quantity_<?php echo $iterate; ?>"></td>
                        </tr>
                        <?php
                             $iterate++;
                    }
                    ?>              
            </tbody>
        </table>

           
<br>
<center>
    <table  cellpadding=10>

<tr>
   <td style="align:center"> <lable for="customer"> Full Name:</lable></td>
   <td style="align:center"><input type="text" name="customer" size="30" required></td>
</tr>

<tr>
  <td style="align:center">  <lable for="contact"> Phone Number:</lable></td>
  <td style="align:center"><input type="text" name="contactno" size="30" required></td>
</tr>

<tr>
<td style="align:center"><lable for="email"> Email:</lable></td>
<td style="align:center">   <input type="text" name="email" size="30" required ></td>
</tr>

<tr>
  <td style="align:center">  <lable for="age"> Age:</lable></td>
  <td style="align:center"> <input type="text" name="age" size="30" required></td>
</tr>

<tr>
 <td style="align:center">   <lable for="address">Address:</lable></td>
 <td style="align:center">   <input type="text" name="address" size="30" required></td>
</tr>

<tr>
 <td style="align:center">   <lable for="remarks">Remarks:</lable></td>
 <td style="align:center">   <input type="text" name="remarks" size="30" ></td>
</tr>

<tr>
<td colspan=2 Center>
<button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-floppy-disk"></span>Confirm Order </button><!--for empty or not validation-->
<button type="reset" class="btn btn-primary">Cancel Order </button><!--for empty or not validation-->
</td>   
</tr>
</form>
    </table>
    </center>
    </div>  
    </form>
     
    </center>
    </div>

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
    
    <script type="text/javascript">
    $(document).ready
    (function()
    {
        $("#checkAll").click(function()
        {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    });
</script>
</body>
</html>
