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
    $msg = "";
    $css_class = "";
    include_once("side_header.php");
    include_once("js.php");
    include_once("dbcon.php");

    $customer_id = $_GET['id'];

    $getCustomerQuery = mysqli_query($con, "SELECT * FROM `tblcustomer` WHERE `Customer_id`='$customer_id'");
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
                                    <img src="<?php echo $row['Customer_image'] ?>" style="width:50%; border-radius: 50%">
                                    <h2 class="py-2 customer_name"><?php echo $row['Customer_name'] ?></h2>
                                    <h6 class="py-2 customer_name"><?php echo $row['Customer_bio'] ?></h6>
                                </div>
                            </div>
                        </div>
                        <!-- User Side Bar -->
                        <div class="col-md-8 py-5 ">
                            <!-- <h4 class="pb-4">Please fill with your details</h4> -->
                            <!-- User Data -->
                            <form action="" method="POST" enctype="multipart/form-data">

                                <?php if (!empty($msg)) : ?>
                                    <div class="alert alert-primary" <?php echo $css_class; ?>>
                                        <?php echo $msg; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="image">Cusmtoner Image</label>
                                        <label for="profileimage"></label>
                                        <input type="file" name="customer_image" id="CustomerImage" class="form-control" ">
                                    </div>
                                    <div class=" form-group col-md-6">
                                        <label for="fullname">Customer Name</label>
                                        <input id="Name" name="customer_name" value="<?php echo $row['Customer_name'] ?>" class="form-control" type="text">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Customer Mobile</label>
                                        <input id="mobile." name="customer_mobile" value="<?php echo $row['Customer_phone'] ?>" class="form-control" type="number">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Customer Email</label>
                                        <input id="email" name="customer_email" value="<?php echo $row['Customer_email'] ?>" class="form-control" type="email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="city">Customer City</label>
                                        <input id="City" name="customer_city" value="<?php echo $row['Customer_city'] ?>" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <label for="address">Customer Address</label>
                                        <input type="text" name="customer_address" class="form-control" id="Email" value="<?php echo $row['Customer_address'] ?>">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="bio">Bio</label>
                                        <textarea id="comment" name="customer_bio" cols="40" rows="5" class="form-control" value="<?php echo $row['Customer_bio'] ?>"></textarea>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <button type="submit" name="save_Customer" class="btn btn-danger">Update</button>
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
<!-- Update Customer Data in databas -->
<?php


if (isset($_POST['save_Customer'])) {

    $customer_image = $_FILES['customer_image'];

    $customer_name = $_POST['customer_name'];
    $customer_phone = $_POST['customer_mobile'];
    $customer_address = $_POST['customer_address'];
    $customer_email = $_POST['customer_email'];
    $customer_city = $_POST['customer_city'];
    $customer_bio = $_POST['customer_bio'];

    $imagename = $customer_image['name'];
    $imagepath = $customer_image['tmp_name'];
    $imageerror = $customer_image['error'];

    // $target = "..Img_Assets/profileimages/". $ImageName;

    if ($imageerror == 0) 
    {

        $image_destination = "Img_Assets/customer_image/" . $imagename;

        move_uploaded_file($imagepath, $image_destination);

        // $insertquery = "INSERT INTO `tblcustomer`(`date`,`Customer_image`, `Customer_name`, `Customer_phone`, `Customer_address`, `Customer_email`, `Customer_city`)
        //  VALUES ('$date','$image_destination','$customer_name','$customer_phone','$customer_address','$customer_email','$customer_city')";

        $updateQuery = "UPDATE `tblcustomer` SET `Customer_image`='$image_destination',`Customer_name`='$customer_name',`Customer_phone`='$customer_phone',
                    `Customer_address`='$customer_address',`Customer_email`='$customer_email',`Customer_city`='$customer_city',`Customer_bio`='$customer_bio' where Customer_id ='$customer_id' ";
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