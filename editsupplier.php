<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssfiles/editcustomer.css" type="text/css">
    <link rel="stylesheet" href="cssfiles/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c3e204ff59.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Edit Customer</title>
</head>

<body>
    <?php
    include_once("side_header.php");
    include_once("js.php");
    include_once("dbcon.php");
    $supplier_id = $_GET['id'];
    $getCustomerQuery = mysqli_query($con, "SELECT * FROM `tblsupplier` WHERE `supplier_id`='$supplier_id'");
    $row = mysqli_fetch_assoc($getCustomerQuery);
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
                                    <img src="<?php echo $row['supplier_image'] ?>" style="width:70%; border-radius: 50%">
                                    <h2 class="py-2 supplier_name"><?php echo $row['supplier_name'] ?></h2>
                                    <h6 class="py-2 suplier_bio"><?php echo $row['supplier_bio'] ?></h6>
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
                                        <label for="image">Supplier Image</label>
                                        <label for="profileimage"></label>
                                        <input type="file" name="supplierimage" id="supplierimage" class="form-control" ">
                                    </div>
                                    <div class=" form-group col-md-6">
                                        <label for="fullname">Supplier Name</label>
                                        <input id="Name" name="supplier_name" value="<?php echo $row['supplier_name'] ?>" class="form-control" type="text">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Supplier Mobile</label>
                                        <input id="mobile." name="supplier_mobile" value="<?php echo $row['supplier_phone'] ?>" class="form-control" type="number">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Supplier Email</label>
                                        <input id="email" name="supplier_email" value="<?php echo $row['supplier_email'] ?>" class="form-control" type="email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="city">Supplier City</label>
                                        <input id="City" name="supplier_city" value="<?php echo $row['supplier_city'] ?>" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <label for="address">Supplier Address</label>
                                        <input type="text" name="supplier_address" class="form-control" id="Email" value="<?php echo $row['supplier_address'] ?>">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="bio">Bio</label>
                                        <textarea id="comment" name="supplier_bio" cols="40" rows="5" class="form-control" value=""></textarea>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <button type="submit" name="update_Supplier" class="btn btn-danger">Update</button>
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
if (isset($_POST['update_Supplier'])) {
    $supplier_image = $_FILES['supplierimage'];

    $supplier_name = $_POST['supplier_name'];
    $supplier_phone = $_POST['supplier_mobile'];
    $supplier_address = $_POST['supplier_address'];
    $supplier_email = $_POST['supplier_email'];
    $supplier_city = $_POST['supplier_city'];
    $supplier_bio = $_POST['supplier_bio'];

    $imagename = $supplier_image['name'];
    $imagepath = $supplier_image['tmp_name'];
    $imageerror = $supplier_image['error'];
    if ($imageerror == 0) 
    {

        $image_destination = "Img_Assets/supplier_image/" . $imagename;

        move_uploaded_file($imagepath, $image_destination);
        $updateQuery = "UPDATE `tblsupplier` SET `supplier_image`='$image_destination',`supplier_name`='$supplier_name',`supplier_phone`='$supplier_phone',
        `supplier_address`='$supplier_address',`supplier_email`='$supplier_email',`supplier_city`='$supplier_city',`supplier_bio`='$supplier_bio' where `supplier_id`='$supplier_id'";
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
    }
    else 
    {
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