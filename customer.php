<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssfiles/customer.css" type="text/css">
    <link rel="stylesheet" href="cssfiles/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c3e204ff59.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


        <!-- For Delete Modal -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <title>Inventory Customer</title>
</head>

<body>
    <!-- Sidebar logo -->

    <?php
    include_once("side_header.php");
    include_once("js.php");
    include_once("dbcon.php");
    ?>
    <div class="main_content">
        <!-- Main Start -->
        <main>
            <!-- cards -->
            <div class="cards">
                <div class="card_single" onclick="document.getElementById('customer').style.display='block'">
                    <div>
                        <h1>Add</h1>
                        <span>Customer</span>
                    </div>
                    <div>
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
            <!-- card single End -->


            <div class="recent_grid">
                <div class="projects">
                    <div class="card">
                        <div class="card_header">
                            <h2>Customer Details:</h2>
                            <button>See All<i class="fas fa-long-arrow-alt-right"></i></button>
                        </div>
                        <div class="card_body">
                            <!-- Table -->
                            <div class="table_responsive">
                                <table style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <td>Date:</td>
                                            <td>Image:</td>
                                            <td>Name:</td>
                                            <td>Phone:</td>
                                            <td>Address:</td>
                                            <td>Email:</td>
                                            <td>City:</td>
                                            <td>Event:</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $select_cutomer = mysqli_query($con, "SELECT * FROM tblcustomer order by `Customer_id` DESC limit 3");

                                        while ($customer = mysqli_fetch_assoc($select_cutomer)) {


                                        ?>
                                            <tr id="<?php echo $customer['Customer_id'] ?>">
                                                <td><?php echo $customer['date'] ?></td>
                                                <td data-target="Customer_image" class="customer_image"><img src="<?php echo $customer['Customer_image'] ?>" alt="customer image"></td>
                                                <td data-target="Customer_name"><?php echo $customer['Customer_name'] ?></td>
                                                <td data-target="Customer_phone"><?php echo $customer['Customer_phone'] ?></td>
                                                <td data-target="Customer_address"><?php echo $customer['Customer_address'] ?></td>
                                                <td data-target="Customer_email"><?php echo $customer['Customer_email'] ?></td>
                                                <td data-target="Customer_city"><?php echo $customer['Customer_city'] ?></td>
                                                <td>
                                                    <a href="editcustomer.php?id=<?php echo $customer['Customer_id'] ?>" class="event btnEdit_customer">Edit</a> <br><br>

                                                    <!-- <button class="eventdelete" >Delete</button> -->

                                                    <form action="js.php" method="POST">

                                                        <input type="hidden" name="delete_cusid" class="delete_cusid" id="Delete_id" value="<?php echo $customer['Customer_id']; ?>">
                                                        <button type="button" class="delete_btn_Forcustomer button remove eventdelete" value="<?php echo $customer['Customer_id']; ?>">
                                                            Delete
                                                        </button>
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



    <!-- Delect Products -->
    <?php
    if (isset($_GET['del'])) {
        $delete = $_GET['del'];

        $deleteQuery = mysqli_query($con, "DELETE FROM `tblcustomer` WHERE `Customer_id`='$delete'");
    }
    ?>


    <!-- Insert Customer Data in databas -->
    <?php


    if (isset($_POST['submit'])) {

        $customer_image = $_FILES['customer_image'];

        date_default_timezone_set("Asia/Karachi");
        $date =  date("Y/m/d");
        // $time = date("h:i:sA");
        // $date_time = $date .'<br />'.$time;

        $customer_name = $_POST['name'];
        $customer_phone = $_POST['phone'];
        $customer_address = $_POST['address'];
        $customer_email = $_POST['email'];
        $customer_city = $_POST['city'];

        $imagename = $customer_image['name'];
        $imagepath = $customer_image['tmp_name'];
        $imageerror = $customer_image['error'];

        // $target = "..Img_Assets/profileimages/". $ImageName;

        $checkquery = mysqli_query($con, "SELECT * FROM `tblcustomer` WHERE `Customer_email` = '$customer_email'");
        if (mysqli_num_rows($checkquery) > 0) {
    ?>
            <script>
                alert("Customer Already Exist!");
            </script>
            <?php
        } else {
            if ($imageerror == 0) {

                $image_destination = "Img_Assets/customer_image/" . $imagename;

                move_uploaded_file($imagepath, $image_destination);

                $insertquery = "INSERT INTO `tblcustomer`(`date`,`Customer_image`, `Customer_name`, `Customer_phone`, `Customer_address`, `Customer_email`, `Customer_city`)
                 VALUES ('$date','$image_destination','$customer_name','$customer_phone','$customer_address','$customer_email','$customer_city')";

                $res = mysqli_query($con, $insertquery);
                if ($res) {
            ?>
                    <script>
                        alert("Customer Addedd Successfully!");
                    </script>
                <?php
                }
            } else {
                ?>
                <script>
                    alert("Error Occured while adding customer");
                </script>
    <?php
            }
        }
    }
    ?>
    <!-- Customer Dta Form -->
    <div id="customer" class="modal">
        <span onclick="document.getElementById('customer').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form class="modal-content" action="" method="POST" enctype="multipart/form-data">
            <div class="container">
                <h1>Add Customer</h1>
                <p>Please fill in this form to Add Customer.</p>
                <hr>

                <label for="cutomer_image"><b>Customer image</b></label>
                <input type="file" placeholder="Customer Image" name="customer_image">

                <label for="cutomer_name"><b>Name</b></label>
                <input type="text" placeholder="Customer Name" name="name" required>

                <label for="Phone"><b>Phone Number</b></label>
                <input type="number" placeholder="Phone Number" name="phone" required>

                <label for="address"><b>Address</b></label>
                <input type="text" placeholder="Enter Customer Address" name="address" required>


                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email">

                <label for="city"><b>City</b></label>
                <input type="text" placeholder="Enter City" name="city" required>


                <div class="clearfix">
                    <button type="button" class="cancelbtn" onclick="document.getElementById('customer').style.display='none'">Cancel</button>
                    <button type="submit" class="signupbtn" name="submit">Add Customer</button>
                </div>
            </div>
        </form>
    </div>


    //
    <!-- <script>
// // Get the modal
// var modal = document.getElementById('customer');

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }
// </script> -->


</body>

</html>