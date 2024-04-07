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
    <title>Edit Products</title>
</head>

<body>
    <?php
    include_once("side_header.php");
    include_once("js.php");
    include_once("dbcon.php");
    $product_id = $_GET['id'];
    $getProductQuery = mysqli_query($con, "SELECT * FROM `tblproduct` WHERE `product_id`='$product_id'");
    $row = mysqli_fetch_assoc($getProductQuery);
    ?>
    <div class="main_content">
        <!-- Main Start -->
        <main>
            <section class="testimonial py-5" id="testimonial">
                <div class="container ">
                    <div class="row ">
                        <div class="col-md-4 py-5  text-center ">
                            <div class=" ">
                                <div class="card-body text-black">
                                    <img src="<?php echo $row['product_image'] ?>" style="width:70%; border-radius: 50%">
                                    <h2 class="py-2 customer_name"><?php echo $row['product_name'] ?></h2>
                                </div>
                            </div>
                        </div>
                        <!-- User Side Bar -->
                        <div class="col-md-8 py-5 ">
                            <!-- <h4 class="pb-4">Please fill with your details</h4> -->
                            <!-- User Data -->
                            <form action="" method="POST" enctype="multipart/form-data">

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="image">Product Image</label>
                                        <label for="profileimage"></label>
                                        <input type="file" name="product_image" id="ProfileImage" class="form-control" ">
                                    </div>
                                </div>
                                <div class=" form-row">
                                        <div class="form-group col-md-6">
                                            <label for="fullname">Product Code</label>
                                            <input id="Name" name="product_code" value="<?php echo $row['product_code'] ?>" class="form-control" type="text">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="phone">Product Name</label>
                                            <input id="mobile." name="product_name" value="<?php echo $row['product_name'] ?>" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="fullname">Product Size</label>
                                            <input id="Name" name="product_size" value="<?php echo $row['product_name'] ?>" class="form-control" type="text">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="phone">Supplier</label>
                                            <div class="form-group col-md-12">

                                                <select name="supplier" id="supplier" class="select" required>
                                                    <option selected><?php echo $row['product_supplier']; ?></option>
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

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="weight">Product Weight</label>
                                            <input type="text" id="weight" name="product_weight" value="<?php echo $row['product_weight'] ?>" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Color">Product Color</label>
                                            <input type="text" id="Color" name="product_color" value="<?php echo $row['product_color'] ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="quantity">Product Quantity</label>
                                            <input type="number" name="product_quantity" class="form-control" id="Email" value="<?php echo $row['product_quantity'] ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="price">Product Price</label>
                                            <input type="number" name="product_price" class="form-control" id="Email" value="<?php echo $row['product_price'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <button type="submit" name="update_product" class="btn btn-danger">Update</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>

</html>
<?php
if (isset($_POST['update_product'])) {

    $product_image = $_FILES['product_image'];

    $product_code = $_POST['product_code'];
    $product_name = $_POST['product_name'];
    $product_size = $_POST['product_size'];
    $product_supplier = $_POST['supplier'];
    $product_weight = $_POST['product_weight'];
    $product_color = $_POST['product_color'];
    $product_quantity = $_POST['product_quantity'];
    $product_price = $_POST['product_price'];

    $imagename = $product_image['name'];
    $imagepath = $product_image['tmp_name'];
    $imageerror = $product_image['error'];
    if ($imageerror == 0) {

        $image_destination = "Img_Assets/product_image/" . $imagename;

        move_uploaded_file($imagepath, $image_destination);
        $updateQuery = "UPDATE `tblproduct` SET `product_image`='$image_destination',`product_code`='$product_code',`product_name`='$product_name ',
        `product_size`='$product_size',`product_supplier`='$product_supplier',`product_weight`='$product_weight',`product_color`='$product_color',
        `product_quantity`='$product_quantity',`product_price`='$product_price' WHERE `product_id` = '$product_id '";
        $res = mysqli_query($con, $updateQuery);
        if ($res) {
            // $msg = "uploaded Successfully to database";
            // $css_class = "alert alert-success";
?>
            <script>
                alert("Update Successfully");
            </script>
        <?php
        }
    } else {
        // $msg = "Failed to uploade to database";
        // $css_class = "alert alert-danger";
        ?>
        <script>
            alert("Update Error");
        </script>
<?php
    }
}
?>