<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssfiles/product.css" type="text/css">
    <link rel="stylesheet" href="cssfiles/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c3e204ff59.js" crossorigin="anonymous"></script>

    <!-- For Delete Modal -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <title>Inventory Products</title>
</head>

<body>
    <!-- Sidebar logo -->

    <?php
    include_once("side_header.php");
    include('js.php');
    ?>
    <div class="main_content">
        <!-- Main Start -->
        <main>
            <!-- cards -->

            <!-- card single End -->


            <div class="recent_grid">
                <div class="projects">
                    <div class="card">
                        <div class="card_header">
                            <h2>Order Details</h2>
                            <button>See All<i class="fas fa-long-arrow-alt-right"></i></button>
                        </div>
                        <div class="card_body">
                            <!-- Table -->
                            <div class="table_responsive">
                                <table style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Date</td>
                                            <td>Code</td>
                                            <td>Name</td>
                                            <td>Size</td>
                                            <td>supplier</td>
                                            <td>Weight</td>
                                            <td>Color</td>
                                            <td>quantity</td>
                                            <td>Price</td>
                                            <td>Unit Price</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include_once("dbcon.php");

                                        $select_product = mysqli_query($con, "SELECT * FROM `tblorder`");
                                        $total_price = 0;
                                        while ($product = mysqli_fetch_assoc($select_product)) {
                                            $Unit_price = ($product["product_price"] *  $product["product_quantity"]);
                                            $total_price += ($product["product_price"] *  $product["product_quantity"]);
                                        ?>
                                            <tr>
                                                <td><?php echo $product['order_id'] ?></td>
                                                <td><?php echo $product['order_date'] ?></td>
                                                <td><?php echo $product['product_code'] ?></td>
                                                <td><?php echo $product['product_name'] ?></td>
                                                <td><?php echo $product['product_size'] ?></td>
                                                <td><?php echo $product['product_supplier'] ?></td>
                                                <td><?php echo $product['product_weight'] ?></td>
                                                <td><?php echo $product['product_color'] ?></td>
                                                <td><?php echo $product['product_quantity'] ?></td>
                                                <td><?php echo $product['product_price'] ?></td>
                                                <td><?php echo $Unit_price; ?></td>
                                            </tr>
                                        <?php
                                            //For Product Quantity
                                            $countquantity = mysqli_query($con, "SELECT * FROM `tblproduct` where product_code = '" . $product['product_code'] . "' ");
                                            $qty = 0;
                                            $num = mysqli_fetch_array($countquantity);
                                            $qty += $num['product_quantity'];


                                            //For User Order Quantity

                                            $userOrder = mysqli_query($con, "SELECT * from `tblorder` where product_code =  '" . $product['product_code'] . "' ");
                                            $orderqty = 0;
                                            $ordnum = mysqli_fetch_array($userOrder);
                                            $orderqty += $ordnum['product_quantity'];



                                            $orderquabtity = $qty - $orderqty;

                                            $QuantityUpdate = mysqli_query($con, "UPDATE `tblproduct` SET `product_quantity`='$orderquabtity' WHERE product_code = '" . $product['product_code'] . "' ");
                                        }
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="font-weight: bold;">TOTAL:<?php echo $total_price ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
    <!-- Delect Suppliers -->

    <?php
    include("dbcon.php");
    if (isset($_GET['del'])) {
        $delete = $_GET['del'];

        $deleteQuery = mysqli_query($con, "DELETE FROM `tblproduct` WHERE `product_id`='$delete'");
    }
    ?>
    <?php

    ?>
</body>

</html>