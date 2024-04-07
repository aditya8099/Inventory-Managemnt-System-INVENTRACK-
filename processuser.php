<?php 
        include_once("dbcon.php");
?>
<?php
    $msg = "";
    $css_class = "";

    if(isset($_POST['save_User']))
    {
        // echo "<prev>",print_r($_POST),"</prev>";
        //     echo"<br>";
        // echo "<prev>",print_r($_FILES),"</prev>";
        
        $name = $_POST['fullname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $bio = $_POST['bio'];


        $ProfileImageName = $_FILES['ProfileImg'];

        $ImageName = $ProfileImageName['name']; 
        $ImagePath = $ProfileImageName['tmp_name'];
        $Imageerror = $ProfileImageName['error'];

        
        $target = "..Img_Assets/profileimages/". $ImageName;

        $checkimage = "";

        if(move_uploaded_file($ImagePath, $target))
        {
            $update = "UPDATE `sign` SET ,`txtName`= '$name',`txtEmail`='$email',`txtPass`='',
            `txtCPass`='',`user_Img`= '$target',`user_Phone`='$mobile',`user_Bio`= '$bio'";

            // $insert = "INSERT INTO `sign`( `txtName`, `txtEmail`, `txtPass`, `txtCPass`, `user_Img`, `user_Phone`, `user_Bio`)
            //  VALUES ('$name','$email','','','$target','$mobile','$bio')";

            $query = mysqli_query($con, $update);

            if($query){
                $msg = "uploaded Successfully to database";
                $css_class = "alert alert-success";
            }
            else{
                $msg = "Failed to uploade to database";
                $css_class = "alert alert-danger";
            }
                
        }
        else
        {
            $msg = "Failed to uploade ";
            $css_class = "alert alert-danger"; 
        }

    }
?>
