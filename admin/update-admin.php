<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Admin</h1>

            <br><br>

            <?php
                //1. Get the id of selected admin
                $id=$_GET['id'];
                
                //2. Create sql query to get  the details 
                $sql="SELECT * FROM tbl_admin WHERE id=$id";

                //Execute SQL query
                $res=mysqli_query($conn, $sql);

                //Check whether the data is available or not
                if($res==true)
                {
                    //Check whether the data is available or not
                    $count=mysqli_num_rows($res);
                    //Check whether we have admin data or not
                    if($count==1)
                    {
                        //Get the details
                        //echo "Admin available";
                        $row=mysqli_fetch_assoc($res);

                        $full_name = $row['full_name'];
                        $username = $row['username'];
                    }
                    else
                    {
                        //Redirect to manage admin page
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
            ?>


            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name:</td>
                        <td>
                            <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>User Name</td>
                        <td>
                            <input type="text" name="username" value="<?php echo $username; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

<?php 
    //Check whether the submit button isclicked or not
    if(isset($_POST['submit'] ))
    {
        //Get all the values from the form to update
        $id = $_POST['id'];
        $full_name = $_POST['full_name']; 
        $username = $_POST['username'];

        //Create a sql query to update admin
        $sql = "UPDATE tbl_admin SET
        full_name = '$full_name',
        username = '$username'
        WHERE id = '$id'
        ";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed successfully or failed
        if($res==true)
        {
            //Query Executed and Admin Updated
            $_SESSION['update'] = "<div class='error'>Admin Updated Successfully.</div>";
            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            $_SESSION['update'] = "<div class='error'>Failed to Delete Admin.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>

<?php include('partials/footer.php') ?>