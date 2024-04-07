<?php

    include('dbcon.php');
       
    if (isset($_POST['delete_btn_set2']))
    {
        $del_supid  = $_POST['delete_supid'];
        $del_Name  = $_POST['delete_SupName'];

    
        $delsup  = "DELETE FROM `tblsupplier` WHERE `supplier_id`= '$del_supid' ";
        $dprd = mysqli_query($con, $delsup);

        $delpro  = "delete from tblproduct where product_supplier = '$del_Name' ";
        $dprd = mysqli_query($con, $delpro);

            header("Location:home.php");
    }
?>