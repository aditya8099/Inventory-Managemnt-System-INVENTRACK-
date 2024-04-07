<?php
    // include_once("header.php");

    // if(!isset($_SESSION['username'])){
    //     header("location:index.php");
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="cssfiles/home.css" type="text/css">
        <link rel="stylesheet" href="cssfiles/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/c3e204ff59.js" crossorigin="anonymous"></script>
    <title>Inventory Home</title>
</head>
<body>
                                    <!-- Sidebar logo -->

    <?php
        include_once("side_header.php");
        include_once("js.php");
        include("dbcon.php");
    ?>
    <div class="main_content">
                                        <!-- Main Start -->
        <main>
                                        <!-- cards -->
            <div class="cards">
                <a href="home.php">
                    <div class="card_single">
                        <div>
                            <h1>5</h1>
                            <span>Section</span>
                        </div>
                        <div>
                            <i class="fas fa-home"></i>
                        </div>
                    </div>
                </a>
                <a href="customer.php">
                    <div class="card_single">
                        <div>
                            <?php
                                $total_cusotmer = mysqli_query($con, "SELECT * FROM `tblcustomer`");
                                $customer_total = mysqli_num_rows($total_cusotmer);
                            ?>
                            <h1><?php echo $customer_total ?></h1>
                            <span>Customer</span>
                        </div>
                        <div>
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </a>
                <a href="product.php">
                    <div class="card_single">
                        <div>
                        <?php
                                $total_products = mysqli_query($con, "SELECT * FROM `tblproduct`");
                                $products_total = mysqli_num_rows($total_products);
                            ?>
                            <h1><?php echo $products_total ?></h1>
                            <span>Products</span>
                        </div>
                        <div>
                            <i class="fas fa-box-open"></i>
                        </div>
                    </div>
                </a>
                <a href="supplier.php">
                    <div class="card_single">
                        <div>
                        <?php
                                $total_supplier = mysqli_query($con, "SELECT * FROM `tblsupplier`");
                                $supplier_total = mysqli_num_rows($total_supplier);
                            ?>
                            <h1><?php echo $supplier_total ?></h1>
                            <span>Supplier</span>
                        </div>
                        <div>
                            <i class="fas fa-luggage-cart"></i>
                        </div>
                    </div>
                </a>
                <a href="order.php">
                    <div class="card_single">
                        <div>
                        <?php
                                $total_order = mysqli_query($con, "SELECT * FROM `tblorder`");
                                $order_total = mysqli_num_rows($total_order);
                            ?>
                            <h1><?php echo $order_total ?></h1>
                            <span>Orders</span>
                        </div>
                        <div>
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                    </div>
                </a>
            </div>
                                <!-- card single End -->
        <div class="recent_grid">
            <div class="projects">
                <div class="card">
                    <div class="card_header">
                        <h2>Latest Products</h2>
                        <a href="showallproducts.php"><button>See All<i class="fas fa-long-arrow-alt-right"></i></button></a>
                    </div>
                    <div class="card_body">
                        <!-- Table -->
                        <div class="table_responsive">
                            <table style="width: 100%;">
                                <thead>
                                    <tr>

                                        <td>code:</td>
                                        <td>Image:</td>
                                        <td>Name:</td>
                                        <td>Size:</td>
                                        <td>supplier:</td>
                                        <td>Weight:</td>
                                        <td>Color:</td>
                                        <td>Price:</td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                include_once("dbcon.php");
                                    $select_product = mysqli_query($con, "SELECT * FROM `tblproduct` ORDER by `product_id` limit 5");
                                    while($product = mysqli_fetch_assoc($select_product)){
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $product['product_code'] ?></td>
                                        <td  class="product_image"><img src="<?php echo $product['product_image'] ?>" alt="customer image"></td>
                                        <td><?php echo $product['product_name'] ?></td>
                                        <td><?php echo $product['product_size'] ?></td>
                                        <td><?php echo $product['product_supplier'] ?></td>
                                        <td><?php echo $product['product_weight'] ?></td>
                                        <td><?php echo $product['product_color'] ?></td>
                                        <td><?php echo $product['product_price'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="customers">
                <div class="card">
                        <div class="card_header">
                            <h2>Latest Customer</h2>
                            <a href="showallcustomer.php"><button>See All<i class="fas fa-long-arrow-alt-right"></i></button></a>
                        </div>
                        <div class="card_body">
                            <!-- Cutomer Details -->
                            <?php
                                include_once("dbcon.php");
                                    $select_custmer = mysqli_query($con, "SELECT * FROM tblcustomer order by `Customer_id` DESC limit 3");
                                    while($custmer = mysqli_fetch_assoc($select_custmer)){
                                ?>
                                <div class="customerlist">
                                        <div class="info">
                                            <img src="<?php echo $custmer['Customer_image'] ?>" width="40px" 
                                            height="40px" alt="customer_image" >
                                            <div>
                                                <h4><?php echo $custmer['Customer_name'] ?></h4>
                                                <small><?php echo $custmer['Customer_phone'] ?></small>
                                            </div>
                                        </div>
                                        <div class="contact">
                                            <i class="fas fa-user-circle"></i>
                                            <i class="fas fa-comments"></i>
                                            <i class="fas fa-phone"></i>
                                        </div>
                                </div>
                                <?php
                                }
                                ?>


                        </div>
                </div>
            </div>
        </div>


        </main>
    </div>

</body>
</html>