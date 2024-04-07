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
    include('dbcon.php');

    //  Insert data of products
    if (isset($_POST['submit'])) {
        
        date_default_timezone_set("Asia/Karachi");
        $date =  date("Y/m/d");

        $product_image = $_FILES['products_image'];
        $product_code = $_POST['product_code'];
        $product_name = $_POST['name'];
        $product_size = $_POST['size'];
        $product_supplier = $_POST['supplier'];
        $product_weight = $_POST['weight'];
        $product_color = $_POST['color'];
        $product_quantity = $_POST['quantity'];
        $product_price = $_POST['price'];

        $imagename = $product_image['name'];
        $imagepath = $product_image['tmp_name'];
        $imageerror = $product_image['error'];


        $checkquery = mysqli_query($con, "SELECT * FROM `tblproduct` WHERE `product_code` = '$product_code'");
        if (mysqli_num_rows($checkquery) > 0) {
    ?>
            <script>
                alert("Product Already Exist");
            </script>
            <?php
        }

        if ($imageerror == 0) {

            $image_destination = "Img_Assets/product_image/" . $imagename;

            move_uploaded_file($imagepath, $image_destination);

            $Pinserquery = mysqli_query($con, "INSERT INTO `tblproduct`(`date`,`product_image`, `product_code`, `product_name`, `product_size`, `product_supplier`, `product_weight`, `product_color`, `product_quantity`,`product_price`)
                                                 VALUES ('$date','$image_destination','$product_code','$product_name','$product_size','$product_supplier','$product_weight','$product_color','$product_quantity','$product_price')");
            if ($Pinserquery) {
            ?>
                <script>
                    alert("Product inserted Successfully");
                    window.location.href= "http://localhost/inv/product.php";
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert("Error Occured while Adding Product");
                </script>
    <?php
            }
        }
    }
    ?>

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
                                            <td>#</td>
                                            <td>Image</td>
                                            <td>Code</td>
                                            <td>Name</td>
                                            <td>Size</td>
                                            <td>supplier</td>
                                            <td>Weight</td>
                                            <td>Color</td>
                                            <td>quantity</td>
                                            <td>Price</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $select_product = mysqli_query($con, "SELECT * FROM tblproduct limit 10");
                                        while ($product = mysqli_fetch_assoc($select_product)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $product['product_id'] ?></td>
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
                                                    <form action="Add_to_cart.php" method="POST">
                                                        <input type="hidden" name="product_code" value="<?php echo $product['product_code']; ?>">
                                                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                                        <button type="submit" class="eventdelete eventbuy">
                                                            Buy
                                                        </button>
                                                        </a>
                                                    </form>
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
    <div id="product" class="modal">
        <span onclick="document.getElementById('product').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form class="modal-content" action="" method="POST" enctype="multipart/form-data">
            <div class="container">
                <h1>Add Product</h1>
                <p>Please fill in this form to Add Product.</p>
                <hr>

                <label for="cutomer_image"><b>Product image</b></label>
                <input type="file" placeholder="Product Image" name="products_image">

                <label for="cutomer_code"><b>Product Code</b></label>
                <input type="text" placeholder="Product Code" name="product_code" required>

                <label for="product_name"><b>Name</b></label>
                <input type="text" placeholder="Products Name" name="name" required>

                <label for="size"><b>Size</b></label>
                <input type="text" placeholder="Enter Product size" name="size" required>

                <label for="supplier">Supplier:</label>

                <select name="supplier" id="supplier" class="select" required>
                    <option value="0" selected disabled hidden>Select Supplier</option>
                    <?php
                    include_once("dbcon.php");
                    $getsupplier = mysqli_query($con, "SELECT * FROM `tblsupplier`");
                    while ($supplier = mysqli_fetch_array($getsupplier)) {
                    ?>
                        <option value="<?php echo $supplier['supplier_name']; ?>"><?php echo $supplier['supplier_name']; ?></option>
                    <?php
                    }
                    ?>


                </select>

                <label for="size"><b>Weight</b></label>
                <input type="text" placeholder="Enter Product size" name="weight" required>

                <label for="size"><b>Color</b></label>
                <input type="text" placeholder="Enter Product size" name="color" required>

                <label for="size"><b>Quantity</b></label>
                <input type="number" placeholder="Enter Product size" name="quantity" required>

                <label for="price"><b>Price</b></label>
                <input type="number" placeholder="Enter Product prise" name="price" required>

                <div class="clearfix">
                    <button type="button" class="cancelbtn" onclick="document.getElementById('product').style.display='none'">Cancel</button>
                    <button type="submit" class="signupbtn" name="submit">Add Products</button>
                </div>
            </div>
        </form>
    </div>

</body>


</html>