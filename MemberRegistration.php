<html>
    <head>
        <title>Member Registration</title>
        <link href="css/assignment.css"rel="stylesheet"type="text/css">
        <style>  
              .error {color: #FF0001;}  
        </style>
    </head>
    <body>

    <?php  
    $customernameErr = $emailErr = $newpasswordErr = $confirmpassErr = "";  
    $customername = $email = $newpass = $confirmpass = "";  
  
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {  
      
        if (empty($_POST["username"]))//username validation
        {     
            $customernameErr = "Name is required";  
        }else 
        {  
            $customername = input_data($_POST["username"]);  
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/",$customername)) 
            {  
                $customernameErr = "Only alphabets and white space are allowed";  
            }  
        } 

        if (empty($_POST["email"]))//email validation
        {  
            $emailErr = "Email is required";  
        }else 
        {  
            $email = input_data($_POST["email"]);  
            // check that the e-mail address is well-formed  
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {  
                $emailErr = "Invalid email format!";  
            }  
        }    

        if (empty($_POST["newpass"]))//new password validation 
        {  
            $newpasswordErr = "New Password is required for creating account!";  
        }else
        {
            $newpass = input_data($_POST["newpass"]);
        }
        if (empty ($_POST["confirmpass"])) 
        {  
        $confirmpassErr = "Confirm Password is required!";  
        }else 
        {  
            $confirmpass = input_data($_POST["confirmpass"]);  
            //check that new password and confirm passwod match or not
            if($confirmpass!=$newpass)
            {
                $confirmpassErr ="Confirm Password must match with New Password! PLease Try again!";
            }
        }  
    }
    function input_data($data) 
    {  
        $data = trim($data);  
        $data = stripslashes($data);  
        $data = htmlspecialchars($data);  
        return $data;  
    }
?>
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
        <div class="Form-contain">
            <center><h1>Registration Form</h1></center>
            <br>
            <form name="MemberRegisterForm"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"method="post">

            <div class="control">
                <lable for="username"> Name:</lable>
                <input type="text" name="username" size="30">
                <span class="error">* <?php echo $customernameErr; ?> </span>  
            </div>
    
            <div class="control">
                <lable for="email"> Email:</lable>
                <input type="text" name="email" size="30" >
                <span class="error">* <?php echo $emailErr; ?> </span>  
            </div>

            <div class="control">
                <lable for="password"> New Password:</lable>
                <input type="password" name="newpass" size="30" >
                <span class="error">* <?php echo $newpasswordErr; ?> </span>  
            </div>

            <div class="control">
                <lable for="password"> Confirm Password:</lable>
                <input type="password" name="confirmpass" size="30">
                <span class="error">* <?php echo $confirmpassErr; ?> </span>  
            </div>
            <div class="control">
                <input type="submit" value="Register" name="submit" />
                <input type="reset" value="Clear"/></td>
            </div>
            </form>
        </div>
    </section>
<?php
   if(isset($_POST['submit'])) 
    {  
        if($customernameErr=="" && $emailErr=="" && $newpasswordErr=="" && $confirmpassErr=="")
        {
            $host = "localhost";
            $user = "root";
            $passwd = "";
            $database = "empcos108db";
            $table_name = "member";
            $connect = mysqli_connect($host,$user,$passwd,$database) or die("could not connect to database");

            $sql="INSERT INTO $table_name(membername,email,newpassword,confirmpassword)
            VALUES('$_POST[username]','$_POST[email]','$_POST[newpass]','$_POST[confirmpass]')";

            if (!mysqli_query($connect,$sql))
            {
                die('Error: ' . mysqli_error($connect));
            }else
            {       
                session_start();
                $_SESSION['sess_user']=$user;
                header("Location: MemberLogin.html");     
            } 
            mysqli_close($connect); 
        }else
        {      
            echo "<center><h3> <b>You didn't filled up the form correctly.</b> </h3></center>";  
        } 
    }
?>

</body>
</html>
