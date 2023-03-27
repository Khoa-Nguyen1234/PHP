<?php 
    include('../config/constants.php'); 
    include('login-check.php');
?>

<?php
    //Authorization - Access Control
    //Check whether the user is logged in or not
?>

<html>
    <head>
        <title>Food Orfer Website - Home Page</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <!-- Menu Section Starts -->
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="manage-admin.php">ADMIN</a></li>
                    <li><a href="manage-category.php">CATEGORY</a></li>
                    <li><a href="manage-food.php">FOOD </a></li>
                    <li><a href="manage-order.php">ORDER</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
        </div>
        <!-- Menu Section Ends -->