<?php

    //Include constants.php file here
    include('../config/constants.php');

    //1. Get the ID of Admin to the deleted
    $id = $_GET['id'];

    //2. Create SQL Query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    // Execute SQL Query
    $res = mysqli_query($conn, $sql);

    //Check whether the query executed successfully or not
    if($res==true) 
    {
        //Query Executed successfully and Admin was deleted
        //Create session variable to display message
        $_SESSION['delete'] = "<div class='success'>Admin deleted successfully.</div>";
        //Redirect to manage admin page
        header('location:' .SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //Failed to delete admin
        $_SESSION['delete'] = "<div class='error'>Failed to delete admin. Please try again.</div>"; 
        header('location:' .SITEURL.'admin/manage-admin.php');
        
    }

    //3. Redirect to manage admin page with message(success or error)
?>