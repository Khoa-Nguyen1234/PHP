<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Food</h1>

                <br /><br />


                <!-- Button to Add Admin -->
                <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>

                <br /> <br /> <br />

                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                ?>

                <br><br>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>

                    </tr>

                    <?php
                        //Create a sql query  to get all the food
                        $sql = "SELECT * FROM tbl_food";

                        //Execute the query
                        $res = mysqli_query($conn,$sql);

                        //Count rows to check whether we have foods or not
                        $count = mysqli_num_rows($res);

                        //Create serial number variable and set default value as 1
                        $sn=1;

                        if($count>0)
                        {
                            //We have food in database
                            //Get the foods from database and display 
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //get the values from individual columns
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $title; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td>
                                            <?php 
                                                //Check whether we have images or not
                                                if($image_name=="")
                                                {
                                                    //We do not have images, display error message
                                                    echo "<div class='error'>Image not added.</div>";
                                                }
                                                else
                                                {
                                                    //We have images, display image
                                                    ?>
                                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px">
                                                    <?php
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                            <a href="#" class="btn-secondary">Update Admin</a>
                                            <a href="#" class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }
                        else
                        {
                            //Food not added in database
                            echo "<tr> <td colspan='7' class='error'> Food not added yet. </td> </tr>";
                        }
                    ?>

                </table>

        </div>
    </div>

<?php include('partials/footer.php'); ?>