<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>
        
        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; //Displaying Session Message
                unset($_SESSION['add']); //Removing Session Message
            }
        ?>

        <form action="" method="POST">
            
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>
                <tr>
                <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>


<?php
//Process the value from form and save it in database

//Check wheter the submit button is clicked or not

if(isset($_POST['submit']))
{
    //Button Clicked
    //echo "Button Clicked";

    //1. Get the Data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //Password Encryption with MD5

    //2. SQL Query to save the data into database
    $sql = "INSERT INTO tbl_admin SET
        full_name='$full_name' ,
        username='$username' ,
        password='$password'
    ";

    //3. Executing Query and Saving Data into database
     $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    

     //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
     if($res==TRUE)
     {
        //Data  inserted
        //echo "Data inserted";
        //Create a Session Variables to Display Message
        $_SESSION['add'] = "Admin Added Successfully";
        //Redirect Page to Manage Admin
        header("location:" .SITEURL. 'admin/manage-admin.php');
     }
     else
     {
        //Data not inserted
        //echo "Data not inserted";
        //Create a Session Variables to Display Message
        $_SESSION['add'] = " Failed to Added Admin";
        //Redirect Page to Add Admin
        header("location:" .SITEURL. 'admin/add-admin.php');
     }
}

?>