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
            <div class="cards">
                <div class="card_single" onclick="document.getElementById('product').style.display='block'">
                    <div>
                        <h1>Add</h1>
                        <span>Product</span>
                    </div>
                    <div>
                        <i class="fas fa-box-open"></i>
                    </div>
                </div>
            </div>
            <!-- card single End -->


            <div class="recent_grid">
                <div class="projects">
                    <div class="card">
                        <div class="card_header">
                            <h2>Product Details</h2>
                            <button>See All<i class="fas fa-long-arrow-alt-right"></i></button>
                        </div>
                        <div class="card_body">
                            <!-- Table -->
                            <div class="table_responsive">
                                <table style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <td>#:</td>
                                            <!-- <td>Date:</td> -->
                                            <td>Image:</td>
                                            <td>Code:</td>
                                            <td>Name:</td>
                                            <td>Size:</td>
                                            <td>supplier:</td>
                                            <td>Weight:</td>
                                            <td>Color:</td>
                                            <td>quantity</td>
                                            <td>Price(1):</td>
                                            <td>Events</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include_once("dbcon.php");
                                        $select_product = mysqli_query($con, "SELECT * FROM tblproduct limit 10");
                                        while ($product = mysqli_fetch_assoc($select_product)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $product['product_id'] ?></td>
                                                <!-- <td><?php echo $product['date'] ?></td> -->
                                                <td class="product_image"><img src="<?php echo $product['product_image'] ?>" alt="customer image"></td>
                                                <td><?php echo $product['product_code'] ?></td>
                                                <td><?php echo $product['product_name'] ?></td>
                                                <td><?php echo $product['product_size'] ?></td>
                                                <td><?php echo $product['product_supplier'] ?></td>
                                                <td><?php echo $product['product_weight'] ?></td>
                                                <td><?php echo $product['product_color'] ?></td>
                                                <td><?php echo $product['product_quantity'] ?></td>
                                                <td><?php echo $product['product_price'] ?></td>
                                                <td>
                                                    <a href="editproduct.php?id=<?php echo $product['product_id'] ?>" class="event">Edit</a> <br>
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="delete_ctgid" class="delete_ctgid" id="Delete_id" value="<?php echo $product['product_id']; ?>">
                                                        <button type="button" class="delete_btn_Forcategory button remove eventdelete" value="<?php echo $product['product_id']; ?>">
                                                            Delete
                                                        </button>
                                                    </form>

                                                    <a href="buyproduct.php?buy=<?php echo  $product['product_id']; ?>"><button class="eventdelete  eventbuy">buy</button></a>
                                                </td>
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
</body>

</html>