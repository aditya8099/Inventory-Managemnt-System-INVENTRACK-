<?php
    include_once("dbcon.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Inventory System</title>
    <link rel="stylesheet" href="cssfiles/index.css" type="text/css">
    <link rel="stylesheet" href="css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c3e204ff59.js" crossorigin="anonymous"></script>

</head>

<?php 
        include_once("js.php");
?>

<body>
    <div class="header">
            <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <h1 class="logo">Inventory System</h1>
                    </div>
                    <nav>
                        <!-- <ul id="MenuItems">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="products.php">Products</a></li>
                            <li><a href="Supplier.php">Supplier</a></li>
                            <li><a href="Customer.php">Customer</a></li>
                            <li><a href="">Logout</a></li>
                            <li><div class="search"><i class="fa fa-search" aria-hidden="true"></i></div></i></li>
                        </ul> -->
                    </nav>
                    <!-- <a href="Cart.php"><img class="addtocart" src="Img_Assets/cart.png" width="30px" height="30px" ></a> -->
                    
                    <!-- <img src="Img_Assets/menu.png" class="menu-icon" onClick="menutoggle()"> -->
                </div>
                <div class="row">
                    <div class="col-2">
                        <h1>Inventory System<br>A New  Style</h1>
                            <p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been 
                                the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?</p>  
                    <Button class="btnbutton" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</Button>
                    <Button class="btnbutton" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Register</Button>
                    </div>
                    <div class="col-2">
                        <img src="Img_Assets/bodyimg.png">
                    </div>
                </div>
            </div>
        </div>
        
                                <!-- Login Modal -->
<div id="id01" class="modal"> 
  <form class="modal-content animate" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="Img_Assets/img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="Logincontainer">
      <label for="uname"><b>Email</b></label>
      <input class="email" type="email" placeholder="Enter Email" name="lgemail" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="lgpass" required>
        
      <button type="submit" name="btnlogin">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="contain" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
                                <!-- SignUp Form -->
    <script>
        function myFunction() 
        {
            var x = document.getElementById("password");
            var y = document.getElementById("compass");
            
            if (x.type === "password" && y.type === "password")
            {
                x.type = "text";
                y.type = "text";
                } 
                else 
                {
                    x.type = "password";
                    y.type = "password";
                }
        }
    </script>

<div id="id02" class="SignUpModal">
    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
 
    <form class="modal-content" action="" method="POST">
        <div class="contain">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

        <label for="name"><b>Name</b></label>
        <input type="text" placeholder="Enter Name" name="name" required>

        <label for="email"><b>Email</b></label>
        <input class="email" type="email" placeholder="Enter Email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="password" required>

        <label for="psw-repeat"><b>Confirm Password</b></label>
        <input type="password" placeholder="Repeat Password" name="compass" id="compass" required>

        <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px" onclick="myFunction()"> Show Password
        </label>
        
        <br>

        <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>

        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="clearfix">
            <button type="button" onclick="document.getElementById('id02').style.display='none'" class="SignUpcancelbtn">Cancel</button>
            <button type="submit" class="signupbtn" name="signupbtn">Sign Up</button>
        </div>
        </div>
    </form>

</div>

</body>
</html>

<!-- Login -->

<?php
        if(isset($_POST['btnlogin']))
        {
            $lgEmail =$_POST['lgemail'];
            $lgPass = $_POST['lgpass'];

            $emaikQuery = "SELECT * FROM `sign` WHERE txtEmail = '$lgEmail'";
            
            $query = mysqli_query($con, $emaikQuery);
    
            $emailCount = mysqli_num_rows($query);
    
            if ($emailCount) 
            {
                $dataFetch = mysqli_fetch_assoc($query);

                $db_Pass = $dataFetch['txtPass'];

                $_SESSION['username'] = $dataFetch['txtName'];

                $pass_decode = password_verify($lgPass, $db_Pass);

                if($pass_decode)
                { 
                    echo"
                        <script>
                            alert('Login Successfuly');
                        </script>";
            ?>
                <script>
                    location.replace("home.php");
                </script>
            <?php
                }else{
                    echo"
                    <script>
                        alert('Login Failed');
                    </script>";
                }
            }
            else{
                echo"
                <script>
                    alert('Invalid Email');
                </script>";
            }
        }
?>

<!-- Sign UP  -->
<?php
        if(isset($_POST['signupbtn']))
        {
            $Name = mysqli_real_escape_string($con, $_POST['name']);
            $Email = mysqli_real_escape_string($con, $_POST['email']);
            $Password = mysqli_real_escape_string($con, $_POST['password']);
            $CPassword = mysqli_real_escape_string($con, $_POST['compass']);
    

            $Emailquery = "SELECT * FROM `sign` WHERE txtEmail = '$Email'";
            
            $query = mysqli_query($con, $Emailquery);
    
            $EmailCount = mysqli_num_rows($query);
    
            if ($EmailCount > 0) 
            {
               echo"
                <script>
                    alert('Already data present');
                </script>";
            }
            else
            {
                if($Password === $CPassword)
                {
                     /*For Encript Password */
                    $Pass = password_hash($Password, PASSWORD_BCRYPT);
                    $CPass = password_hash($CPassword, PASSWORD_BCRYPT);
                        $insertquery = "INSERT INTO `sign` (`txtName`, `txtEmail`, `txtPass`, `txtCPass`) 
                        VALUES ('$Name','$Email','$Pass','$CPass')";
                        $inert_query = mysqli_query($con, $insertquery);
                        
                        echo" 
                        <script>
                         alert('Registered Successfully');
                        </script>";
                    
                }
                else
                {
                    echo" 
                    <script>
                     alert('Password does not matched');
                    </script>";
                }     
            }
            
        }
    ?> 