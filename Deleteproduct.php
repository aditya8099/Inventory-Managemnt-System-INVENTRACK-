<?php

    include('dbcon.php');
       
    if (isset($_POST['delete_btn_set1'])) 
    {
        $del_id  = $_POST['delete_ctgid'];
        // $del_Name  = $_POST['delete_ctgName'];

        $delctg  = "delete from tblproduct where product_id = '$del_id' ";
        $dprd = mysqli_query($con, $delctg);

            // $delctg  = "delete from product where ctgName = '$del_Name' ";
            // $dprd = mysqli_query($con, $delctg);

            header("Location:home.php");
    }
?>