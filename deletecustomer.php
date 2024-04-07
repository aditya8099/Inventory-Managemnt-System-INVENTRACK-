<?php

    include('dbcon.php');
       
    if (isset($_POST['delete_btn_set3'])) 
    {
        $del_id  = $_POST['delete_cusid'];

        $delcus  =  "delete from tblcustomer where Customer_id = '$del_id' ";
        $dcus = mysqli_query($con, $delcus);

            // $delctg  = "delete from product where ctgName = '$del_Name' ";
            // $dprd = mysqli_query($con, $delctg);

            header("Location:home.php");
    }
?>