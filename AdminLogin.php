<!DOCTYPE html>
<html>
    <head>
           <meta charset = 'utf-8'>
           <title>Member Login</title>
          <link rel="stylesheet" type="text/css" href="css/assignment.css"/>
          <style type="text/css">
            h3{
                color:red;
                width: 1000px;
                background-color:#8fddf5;
                height:100px;
                padding:20px;
            }
          </style>
    </head>
    <body>
    <section id="header1">
        <img src = "imgs/GFLogo.PNG"class="Logo">
            
        <div id="sideNav">  
            <nav>
                <ul>
                    <li><a href="Home.html">Home</a></li>
                    <li><a href="AboutRestaurant.html">About Restaurant</a></li>
                    <li><a href="PublicPView.php">Food Menu</a></li>
                    <li><a href="MemberLogin.html">Member Login</a></li>
                    <li><a href="MemberRegistration.php">Member Registration</a></li>
                    <li><a href="AdminLogin.html">Admin Login</a></li>
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

        <?php
            if(isset($_POST["submit"]))
            {
                if(!empty($_POST['adminname']) && !empty($_POST['password'])) 
                {
                    $user=$_POST['adminname'];
                    $pass=$_POST['password'];
                    $con=mysqli_connect('localhost','root','','empcos108db') or die(mysql_error());
                    $query=mysqli_query($con,"SELECT * FROM admin WHERE adminname='".$user."' AND password='".$pass."'");
                    $numrows=mysqli_num_rows($query);//make qurey to rows
                    if($numrows!=0)
                    {
                        while($row=mysqli_fetch_assoc($query))
                        {
                            $dbusername=$row['adminname'];
                            $dbpassword=$row['password'];
                        }
                        if($user == $dbusername && $pass == $dbpassword)
                        {
                            session_start();
                            $_SESSION['sess_admin']=$user;
                            header("Location: AdminWelcome.php");
                        }
                    }else 
                    {
                        echo "<center><h3> Login failed. Invalid username or password.</h3><center>";  
                    }
                }else 
                {
                    echo "All fields are required!";
                }
            }
        ?>

</body>
</html> 