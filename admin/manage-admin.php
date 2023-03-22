<?php include('partials/menu.php'); ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>
                    <br />

                    <?php 
                        if(isset($_SESSION['add']))
                        {
                            echo $_SESSION['add']; //Displaying Session Message
                            unset($_SESSION['add']); //Removing Session Message
                        }

                        if(isset($_SESSION['delete']))
                        {
                            echo $_SESSION['delete']; 
                            unset($_SESSION['delete']);
                        }

                        if(isset($_SESSION['update']))
                        {
                            echo $_SESSION['update'];
                            unset($_SESSION['update']);
                        }

                        if(isset($_SESSION['user_not_found']))
                        {
                            echo $_SESSION['user_not_found'];
                            unset($_SESSION['user_not_found']);
                        }

                        if(isset($_SESSION['pwd_not_found']))
                        {
                            echo $_SESSION['pwd_not_found'];
                            unset($_SESSION['pwd_not_found']);
                        }

                        if(isset($_SESSION['change-pwd']))
                        {
                            echo $_SESSION['change-pwd'];
                            unset($_SESSION['change-pwd']);
                        }
                    ?>

                    <br /><br /><br />
                    <!-- Button to Add Admin -->
                    <a href="add-admin.php" class="btn-primary">Add Admin</a>

                    <br /> <br /> <br />

                    <table class="tbl-full">
                        <tr>
                            <th>S.N.</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Actions</th>
                        </tr>

                        <?php 
                            //Query to Get All Admin
                            $sql = "SELECT * FROM tbl_admin";
                            //Execute the Query 
                            $res = mysqli_query($conn, $sql);
                            
                            //Check whether the Query is Executed of not
                            if($res==TRUE)
                            {
                                //Count Rows to Check whether we have data in database or not
                                $count = mysqli_num_rows($res); //Function to get all the rows in database

                                $sn=1; //Create a variable and Assign the value 

                                //Check the num of rows 
                                if($count>0)
                                {
                                    //We hava data in database
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        //Using while loop to get all the data in database
                                        //And while loop will run as long as we have data in database 
                                        
                                        //Get individual DATA
                                        $id=$rows['id'];
                                        $full_name=$rows['full_name'];
                                        $user_name=$rows['username'];

                                        //Display the Values in our Table
                                        ?>
                                            <tr>
                                                <td><?php echo $sn++; ?></td>
                                                <td><?php echo $full_name; ?></td>
                                                <td><?php echo $user_name; ?></td>
                                                <td>
                                                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    //We do not have data in database
                                }
                            }
                        ?>

                    </table>

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Main Content Section Ends -->
<?php include('partials/footer.php'); ?>