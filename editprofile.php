<?php
session_start();
if(!isset($_SESSION['username']))
{
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="cssfiles/editprofile.css">

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Profile</title>
</head>
<body>
    <!-- <div class="btnback">
        <a href="home.php"><i class="fas fa-arrow-left"></i>Back to Dashboard</a>
    </div> -->
    <?php 
        include_once("js.php");
        include_once("dbcon.php");
        include_once("processuser.php");
        $username = $_SESSION['username'];

        $fetchquery = "SELECT * FROM `sign` WHERE`txtName` = '$username'";
        $query = mysqli_query($con, $fetchquery);

        $profiledata = mysqli_fetch_assoc($query);


    ?>
<section class="testimonial py-5" id="testimonial">
    
    <div class="container">  
        <div class="row ">
            <div class="col-md-4 py-5 text-white text-center ">
            <div class="btnback">
                    <a href="home.php"><i class="fas fa-arrow-left"></i>Back to Dashboard</a>
                </div>
                <div class=" ">
                    <div class="card-body">
                        <img src="Img_Assets/user-2.png" style="width:50%; border-radius: 50%">
                        <h2 class="py-3"><?php echo $_SESSION['username']?></h2>
                        <a href=""><p>Edit your Profile here</p></a>
                        <p><?php echo $profiledata['user_Bio']?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 py-5 border">
                <h4 class="pb-4">Please fill with your details</h4>
                <!-- User Side Bar -->
                
                <!-- User Data -->
                <form action="editprofile.php" method="POST" enctype="multipart/form-data">
                
                <?php if(!empty ($msg)): ?>
                            <div class="alert alert-primary" <?php echo $css_class; ?>>
                                <?php echo $msg; ?>
                            </div>
                    <?php endif; ?>

                <div class="form-row">

                        <div class="form-group col-md-6">
                            <input type="file" name="ProfileImage" id="ProfileImage" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                          <input id="Name" name="fullname" placeholder="<?php echo $profiledata['txtName']?>" class="form-control" type="text">
                        </div>
                       
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input id="Mobile No." name="mobile" placeholder="<?php echo $profiledata['user_Phone']?>" class="form-control"  type="text">
                        </div>
                        <div class="form-group col-md-6">
                          <input type="email" name="email" class="form-control" id="Email" placeholder="<?php echo $profiledata['txtEmail']?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                                  <textarea id="comment" name="bio" cols="40" rows="5" class="form-control" placeholder="<?php echo $profiledata['user_Bio']?>"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" >
                                  <label class="form-check-label" for="invalidCheck2">
                                    <small>By clicking Submit, you agree to our Terms & Conditions, Visitor Agreement and Privacy Policy.</small>
                                  </label>
                                </div>
                              </div>
                    
                          </div>
                    </div>
                    
                    <div class="form-row">
                        <button type="submit" name="save_User" class="btn btn-danger">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>