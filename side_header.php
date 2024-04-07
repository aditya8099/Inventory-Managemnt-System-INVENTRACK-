<?php
session_start();
if(!isset($_SESSION['username']))
{
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="cssfiles/sidebar.css" type="text/css">
        <link rel="stylesheet" href="cssfiles/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/c3e204ff59.js" crossorigin="anonymous"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title></title>


</head>
<body>
                                    <!-- Sidebar logo -->
        <!-- <input type="checkbox" id="nav_toggle"> -->

        <div class="sidebar" id="sidebar">
            <div class="sidebar_brand">
                <h2><span>Web Project</span></h2>
            </div>
       
                                    <!-- sidebar Menu  -->

            <div class="sidebar_menu" id="sidebar_menu">
                <ul>
                    <li>
                        <a href="home.php" ><span><i class="fas fa-home"></i></span>
                        <span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href="customer.php"  ><span><i class="fas fa-users"></i></span>
                        <span>Customer</span></a>
                    </li>
                    <li>
                        <a href="supplier.php"  ><span><i class="fas fa-luggage-cart"></i></span>
                        <span>Supplier</span></a>
                    </li>
                    <li>
                        <a href="product.php"  ><span><i class="fas fa-box-open"></i></span>
                        <span>Products</span></a>
                    </li>
                    <li>
                        <a href="order.php"  ><span><i class="fas fa-shopping-bag"></i></span>
                        <span>Order</span></a>
                    </li>
                    <!-- <li>
                        <a href=""><span><i class="fas fa-money-check-alt"></i></span>
                        <span>Income</span></a>
                    </li> -->
                    <li>
                        <a href="profile.php" ><span><i class="far fa-user-circle"></i></span>
                        <span>Account</span></a>
                    </li>
                    
                </ul>
            </div>
        
    </div>
    <div class="maincontent" id="maincontent">
                                        <!-- header -->
            <header>
                <h2>
                    <div class="header_title">
                        <label for="">
                            <i class="fas fa-bars" ></i>
                        </label>
                        <a href="home.php">Dashboard</a>
                    </div>
                </h2>
                                        <!-- Search Wrapper -->
                    <div class="search_wrapper">
                            <i class="fas fa-search"></i>
                            <input type="search" placeholder="Search">
                    </div>

                                        <!-- User Profile Wrapper -->
              <button href="" class="a_user_wrapper" onclick="document.getElementById('id01').style.display='block'">
                    <div class="user_wrapper">
                            <img src="Img_Assets/img_avatar2.png" height="40px" width="40px" alt="user profile image">
                            <div>
                                <h4><?php echo $_SESSION['username'] ?></h4>
                                <small>super admin</small>
                            </div>
                    </div>
              </button>
            </header> 
    </div>

<div id="id01" class="modal">
    <div class="card-container" >
        <div class="upper-container">
           <div class="image-container">
              <img src="Img_Assets/user-2.png" />
           </div>
        </div>
        <div class="lower-container">
           <div>
              <h3><?php echo $_SESSION['username']?></h3>
              <h4>Front-end Developer</h4>
           </div>
           <div>
              <p>sodales accumsan ligula. Aenean sed diam tristique,
                 fermentum mi nec, ornare arch.
              </p>
           </div>
           <div>
              <a href="profile.php?id=<?php  ?>" class="btn">Main Profile</a>
              <a href="logout.php" class="btn">Logout</a>
           </div>
        </div>
     </div>
</div>

<script>
        var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
</script>

</body>
</html>