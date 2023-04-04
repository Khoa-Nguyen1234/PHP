<?php
    //Include constants page
    include('../config/constants.php');

    //echo "Delete-Food Page";

    if(isset($_GET['id']) && isset($_GET['image_name'])) //Either use '&&' or 'AND'
    {
        //Process to delete
        //echo "Process to delete";
        
        //1. Get ID and image name
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //2. Remove the image if available
        //Check whether the image is available or not and delete only if available
        if($image_name !="")
        {
            //It has image and need to remove from folder
            //Get the image path
            $path = "../images/food/".$image_name;

            //Remove image file from folder
            $remove = unlink($path);

            //Check whether the image is removed or not
            if($remove==false)
            {
                //Failed to remove image
                $_SESSION['upload'] = "<div class='error'>Failed to remove image file.</div>";
                //Redirect to manage food
                header('location:'.SITEURL.'admin/manage-food.php');
                //Stop the proccess of deleting  food
                die();
            }
        }

        //3. Delete Food from database
        $sql = "DELETE FROM tbl_food WHERE id=$id";
        //Execute SQL query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed or not and set the session message respectively
        if($res==true)
        {
            //Food deleted 
            $_SESSION['delete'] = "<div class='success'>Food deleted successfully.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            //Failed to delete food
            $_SESSION['delete'] = "<div class='error'>Failed to delete food.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }

        //4. redirect to manage food with session message
    }
    else
    {
        //Redirect to manage food page
        //echo "Redirect";    
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }

?>