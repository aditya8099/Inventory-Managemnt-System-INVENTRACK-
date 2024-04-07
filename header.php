
<?php
// session_start();
// if(!isset($_SESSION['username']))
// {
// 	header("location:index.php");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Electronic Tech Store</title>
	<link rel="stylesheet" href="cssfiles/header.css" type="text/css">
	<link rel="stylesheet" href="css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c3e204ff59.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="head">
			<div class="container">
				<div class="navbar">
					<div class="logo">
						<h1 class="logo">Inventory System</h1>
					
					</div>
					<nav>
						<ul id="MenuItems">
							<li><a href="">Home</a></li>
							<li><a href="">Supplies</a></li>
							<li><a href="">Products</a></li>
							<li><a href="">Customer</a></li>
							<li><a href="logout.php" class="btnLogout">Logout</a></li>
							<!-- <li><div class="search"><i class="fa fa-search" aria-hidden="true"></i></div></i></li> -->
							<li>
								<form>
									<input  class="search" type="text" name="search" placeholder="Search..">
								</form>
							</li>
						</ul>
					</nav>
					<a href="Cart.php"><img src="Img_Assets/cart.png" width="30px" height="30px"></a>
					<p class="username"><?php echo $_SESSION['username'];?></p>
					<!-- <img src="images/menu.png" class="menu-icon" onClick="menutoggle()"> -->
				</div>
			</div>
		</div>
</body>
</html>