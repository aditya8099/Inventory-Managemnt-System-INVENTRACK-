<?php
// session_start();
// session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssfiles/editproduct.css" type="text/css">
    <link rel="stylesheet" href="cssfiles/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c3e204ff59.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

    <title>Buy Products</title>
</head>

<body>

    <body>
        <?php
        include("side_header.php");
        include("js.php");
        include('dbcon.php');

        if (isset($_POST['buy'])) {
            date_default_timezone_set("Asia/Karachi");
            $date =  date("Y/m/d");
            $product_code = $_POST['product_code'];
            $product_name = $_POST['product_name'];
            $product_size = $_POST['product_size'];
            $product_supplier = $_POST['product_supplier'];
            $product_weight = $_POST['product_weight'];
            $product_color = $_POST['product_color'];
            $product_quantity = $_POST['product_quantity'];
            $product_price = $_POST['product_price'];

            // $imagename = $product_image['name'];
            // $imagepath = $product_image['tmp_name'];
            // $imageerror = $product_image['error'];

            // if ($imageerror == 0) {

                $image_destination = "Img_Assets/product_image/" . $product_image;

            //     move_uploaded_file($imagepath, $image_destination);
            // }
            $updateQuery = "INSERT INTO `tblorder` (`order_date`, `product_image`, `product_code`, `product_name`, `product_size`, `product_supplier`, `product_weight`, `product_quantity`, `product_color`, `product_price`) 
                            VALUES ('$date','$image_destination','$product_code','$product_name','$product_size','$product_supplier','$product_weight','$product_quantity','$product_color','$product_price')";
            $res = mysqli_query($con, $updateQuery);
            unset($_SESSION['Shoping_Product']);
        ?>
            <script>
                alert("Purchase Successfully");
                window.location.href = 'http://localhost/inv/product.php';
            </script>
            <?php

        }

        if (isset($_POST['action']) && $_POST['action'] == "remove") {
            if (!empty($_SESSION["Shoping_Product"])) {
                foreach ($_SESSION["Shoping_Product"] as $key => $value) {
                    if ($_POST["product_code"] === $key) {
                        unset($_SESSION["Shoping_Product"][$key]);
            ?>
                        <script>
                            alert('Product is removed');
                            window.location.href = 'http://localhost/inv/buyproduct.php';
                        </script>
        <?php
                    }
                    if (empty($_SESSION["Shoping_Product"]))
                        unset($_SESSION["Shoping_Product"]);
                }
            }
        }

        if (isset($_POST['action']) && $_POST['action'] == "changeQuantity") {
            foreach ($_SESSION["Shoping_Product"] as &$value) {
                if ($value["product_code"] === $_POST['product_code']) {
                    $value['product_quantity'] = $_POST["product_quantity"];
                    break; // Stop the loop after we've found the product
                }
            }
        }
        if (isset($_POST['action']) && $_POST['action'] == "changeSize") {
            foreach ($_SESSION["Shoping_Product"] as &$value) {
                if ($value["code"] === $_POST['code']) {
                    $value['prdSize'] = $_POST["prdSize"];
                    break; // Stop the loop after we've found the product
                }
            }
        }
        ?>

        <div class="main_content">
            <!-- Main Start -->
                <main>
                    <?php
                    if (!empty($_SESSION["Shoping_Product"])) {
                        $total_price = 0;

                        foreach ($_SESSION["Shoping_Product"] as $product) {

                    ?>

                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type='hidden' name='product_id' value="<?php echo $product['product_id']; ?>" />
                                <input type="hidden" name="product_code" value="<?php echo $product['product_code']; ?>">
                                <input type='hidden' name='action' value="remove" />
                                <button type='submit' class='remove'>X</button>
                            </form>
                            <section class="testimonial py-5" id="testimonial">
                                <div class="container ">
                                    <div class="row ">
                                        <div class="col-md-4 py-5  text-center ">
                                            <div class=" ">
                                                <div class="card-body text-black">
                                                    <img src="<?php echo $product['product_image'] ?>" style="width:70%; border-radius: 50%">
                                                    <h2 class="py-2 customer_name"><?php echo $product['product_name'] ?></h2>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- User Side Bar -->
                                        <div class="col-md-8 py-5 ">
                                            <!-- <h4 class="pb-4">Please fill with your details</h4> -->
                                            <!-- User Data -->


                                            <!-- 
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="image">Product Image</label>
                                            <label for="profileimage"></label>
                                            <input type="file" name="product_image" id="ProfileImage" class="form-control" required>
                                    </div>
                                </div> -->
                                            <!-- <div class=" form-row">
                                            <div class=" form-group col-md-6">
                                                <label for="fullname">Date</label>
                                                <input id="Name" name="product_date" value="" class="form-control" type="text">
                                            </div>
                                        </div> -->
                                            <div class=" form-product">
                                                <div class="form-group col-md-6">
                                                    <label for="fullname">Product Code</label>
                                                    <input id="Name" name="product_code" value="<?php echo $product['product_code'] ?>" class="form-control" type="text">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="phone">Product Name</label>
                                                    <input id="mobile." name="product_name" value="<?php echo $product['product_name'] ?>" class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="form-product">
                                                <div class="form-group col-md-6">
                                                    <label for="fullname">Product Size</label>
                                                    <input id="Name" name="product_size" value="<?php echo $product['product_name'] ?>" class="form-control" type="text">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="weight">Product Supplier</label>
                                                    <input type="text" id="weight" name="product_supplier" value="<?php echo $product['product_supplier'] ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-product">
                                                <div class="form-group col-md-6">
                                                    <label for="weight">Product Weight</label>
                                                    <input type="text" id="weight" name="product_weight" value="<?php echo $product['product_weight'] ?>" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="Color">Product Color</label>
                                                    <input type="text" id="Color" name="product_color" class="form-control" value="<?php echo $product['product_color'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-product">
                                                <form action="" method="POST">
                                                    <input type='hidden' name='prdid' value="<?php echo $product["product_id"]; ?>" />
                                                    <input name="product_code" type="hidden" value="<?php echo $product['product_code']; ?>">
                                                    <label for="quantity"> Product Quantity</label>
                                                    <input type='hidden' name='action' value="changeQuantity" />
                                                    <select name='product_quantity' id="quantity" class="form-control col-md-6 iquantity " onchange="this.form.submit()">
                                                        <?php
                                                        $SPid = $product["product_id"];
                                                        $SPquery = mysqli_query($con, "SELECT * from  `tblproduct` where product_id = '$SPid'");
                                                        while ($SQeury = mysqli_fetch_array($SPquery)) {
                                                            for ($i = 1; $i <= $SQeury["product_quantity"]; $i++) {
                                                        ?>
                                                                <option <?php if ($product["product_quantity"] == $i) echo "selected"; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>

                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </form>
                                                <div class="form-group col-md-6">
                                                    <label for="price">Product Price</label>
                                                    <input type="text" name="product_price" class="form-control prdprice" id="price" value="<?php echo $product['product_price'] ?>">
            </form>
        </div>
        </div>
        <hr>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="comment">Total Product Price</label>

                <p class='form-control itotal' style='padding: 20px;'>
                    <?php echo  $product["product_price"] *  $product["product_quantity"] . ". PKR"; ?>
                </p>

            </div>
        </div>

        <div class="form-row">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>" />
                <input type="hidden" name="product_code" value="<?php echo $product['product_code']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $product['product_name']; ?>" />
                <input type="hidden" name="product_size" value="<?php echo $product['product_size']; ?>">
                <input type="hidden" name="product_supplier" value="<?php echo $product['product_supplier']; ?>" />
                <input type="hidden" name="product_weight" value="<?php echo $product['product_weight']; ?>">
                <input type="hidden" name="product_color" value="<?php echo $product['product_color']; ?>" />
                <input type="hidden" name="product_quantity" value="<?php echo $product['product_quantity']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $product['product_price']; ?>">
                <button name="buy" class="btn btn-danger">
                    Buy Product
                </button>
            </form>
        </div>

        </div>
        </div>
        </div>
        </section>
<?php
                        }
                    } else {
                        echo "No Item buy";
                    }
?>
</main>
</div>
    </body>

</html>