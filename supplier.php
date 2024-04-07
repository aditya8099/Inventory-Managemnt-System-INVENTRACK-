<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssfiles/supplier.css" type="text/css">
    <link rel="stylesheet" href="cssfiles/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c3e204ff59.js" crossorigin="anonymous"></script>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <title>Inventory Supplier</title>
</head>

<body>
    <!-- Sidebar logo -->

    <?php
    include("side_header.php");
    include("js.php");
    include("dbcon.php");
    ?>
    <div class="main_content">
        <!-- Main Start -->
        <main>
            <!-- cards -->
            <div class="cards">
                <div class="card_single" onclick="document.getElementById('supplier').style.display='block'">
                    <div>
                        <h1>Add</h1>
                        <span>Supplier</span>
                    </div>
                    <div>
                        <i class="fas fa-luggage-cart"></i>
                    </div>
                </div>
            </div>
            <!-- card single End -->


            <div class="recent_grid">
                <div class="projects">
                    <div class="card">
                        <div class="card_header">
                            <h2>Supplier Details</h2>
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
                                            <td>Name:</td>
                                            <td>Address:</td>
                                            <td>Phone:</td>
                                            <td>Emial:</td>
                                            <td>City:</td>
                                            <td>Events</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include("js.php");
                                        $select_supplier = mysqli_query($con, "SELECT * FROM tblsupplier");

                                        while ($supplier = mysqli_fetch_assoc($select_supplier)) {


                                        ?>
                                            <tr>
                                                <td><?php echo $supplier['supplier_id'] ?></td>
                                                <td class="supplier_image"><img src="<?php echo $supplier['supplier_image'] ?>" alt="customer image"></td>
                                                <td><?php echo $supplier['supplier_name'] ?></td>
                                                <td><?php echo $supplier['supplier_phone'] ?></td>
                                                <td><?php echo $supplier['supplier_address'] ?></td>
                                                <td><?php echo $supplier['supplier_email'] ?></td>
                                                <td><?php echo $supplier['supplier_city'] ?></td>
                                                <td>
                                                    <a href="editsupplier.php?id=<?php echo $supplier['supplier_id'] ?>" class="event">Edit</a> <br>
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="delete_SupName" class="delete_SupName" id="Delete_pro" value="<?php echo $supplier['supplier_name']; ?>">
                                                        <input type="hidden" name="delete_supid" class="delete_supid" id="Delete_id" value="<?php echo $supplier['supplier_id']; ?>">
                                                        <button type="button" class="delete_btn_ForSupplier button remove eventdelete" value="<?php echo $supplier['supplier_id']; ?>">
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
    <!-- Delect Suppliers -->

    <?php
    include("dbcon.php");
    if (isset($_GET['del'])) {
        $delete = $_GET['del'];

        $deleteQuery = mysqli_query($con, "DELETE FROM tblsupplier WHERE supplier_id='$delete' ");

        // $deletproducts = mysqli_query($con, "DELETE FROM tblproduct WHERE Customer_id='$delete' ");

    }
    ?>

    <!-- Insert Customer Data in databas -->
    <?php
    if (isset($_POST['submit'])) {

        $supplier_image = $_FILES['supplier_image'];

        date_default_timezone_set("Asia/Karachi");
        $date =  date("Y/m/d");
        // $time = date("h:i:sA");
        // $date_time = $date .'<br />'.$time;

        $supplier_name = $_POST['name'];
        $supplier_phone = $_POST['phone'];
        $supplier_address = $_POST['address'];
        $supplier_email = $_POST['email'];
        $supplier_city = $_POST['city'];

        $imagename = $supplier_image['name'];
        $imagepath = $supplier_image['tmp_name'];
        $imageerror = $supplier_image['error'];

        $checkquery = mysqli_query($con, "SELECT * FROM `tblsupplier` WHERE `supplier_email` = '$supplier_email'");
        if (mysqli_num_rows($checkquery) > 0) {
    ?>
            <script>
                alert("Supplier  Already Exist");
            </script>
            <?php
        } else {
            if ($imageerror == 0) {

                $image_destination = "Img_Assets/supplier_image/" . $imagename;

                move_uploaded_file($imagepath, $image_destination);

                $insertquery = "INSERT INTO `tblsupplier`(`date`, `supplier_image`, `supplier_name`, `supplier_phone`, `supplier_address`, `supplier_email`, `supplier_city`) 
                        VALUES ('$date','$image_destination','$supplier_name','$supplier_phone','$supplier_address','$supplier_email','$supplier_city')";

                $res = mysqli_query($con, $insertquery);
                if ($res) {
            ?>
                    <script>
                        alert("Supplier inserted Successfully");
                        window.location.href = 'http://localhost/inv/supplier.php';
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        alert("Error Occurred while adding supplier");
                    </script>
    <?php
                }
            }
        }
    }



    ?>


    <div id="supplier" class="modal">
        <span onclick="document.getElementById('supplier').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form class="modal-content" action="" method="POST" enctype="multipart/form-data">
            <div class="container">
                <h1>Add supplier</h1>
                <p>Please fill in this form to Add supplier.</p>
                <hr>

                <label for="supplier_image"><b>supplier image</b></label>
                <input type="file" placeholder="supplier Image" name="supplier_image">

                <label for="supplier_Name"><b>Name</b></label>
                <input type="text" placeholder="supplier Name" name="name" required>

                <label for="Phone"><b>Phone Number</b></label>
                <input type="number" placeholder="Phone Number" name="phone" required>

                <label for="address"><b>Address</b></label>
                <input type="text" placeholder="Enter supplier Address" name="address" required>


                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email">

                <label for="city"><b>City</b></label>
                <input type="text" placeholder="Enter City" name="city" required>


                <div class="clearfix">
                    <button type="button" class="cancelbtn" onclick="document.getElementById('supplier').style.display='none'">Cancel</button>
                    <button type="submit" class="signupbtn" name="submit">Add supplier</button>
                </div>
            </div>
        </form>
    </div>

    <!-- <script>
// Get the modal
var modal = document.getElementById('supplier');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script> -->

</body>

</html>