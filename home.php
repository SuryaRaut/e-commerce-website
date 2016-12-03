<!DOCTYPE html>
<?php
session_start();
include("functions/functions.php");?>
<html>
<head>

<title> this is my online store!!
</title>
<link rel="stylesheet" href="styles/style.css" media="all"/>
</head>
<body>
<!--main container starts here -->
<div class="main_wrapper">
  <!--header starts here -->

<div class="header_wrapper">
  <a href="home.php"><img id="logo" src="images/home.png" height="100" width="500"/></a>
  <img id="banner" src="images/logo.png" height="100" width="500"/>
</div>
<!--header ends here -->

<!--navigation bar starts here -->


<div class="menubar">
<ul id="menu">
  <li><a href="home.php">Home</a> </li>
    <li><a href="all_products.php">Available Products</a> </li>
    <li><a href="customer/my_account.php">My Account</a> </li>
    <li><a href="customer_register.php">Sign Up</a> </li>
    <li><a href="cart.php">Shopping</a> </li>
    <li><a href="home.php">Contact Us</a> </li>

</ul>


<div id="form">
  <form method="get" action="results.php" enctype="multipart/form-data">
    <input type="text" name="user_query" placeholder="Search a Product"/>
     <input type="submit" name="search" value="search"/>
  </form>

</div>
</div>
<!--navigation bar ends here -->

<!--content wrapper starts here -->


<div class="content_wrapper">

<div id="sidebar">
<div id="sidebar_title"> Categories </div>
<ul id="cats">
  <?php getCats(); ?>

</ul>

<div id="sidebar_title"> Brands </div>
<ul id="cats">
  <?php getBrands(); ?>


</ul>

</div>

<div id="content_area">

  <?php cart(); ?>

  <div id="shopping_cart">
    <span style="float:right; font-size:15px; padding:5px; line-height: 40px;">
      <?php
       if(isset($_SESSION['customer_email'])){
         echo "<b>Welcome: </b>" . $_SESSION['customer_email'] . "<b> Your </b>";
       }
       else {
         echo "<b> Welcome Customer:</b>";
       }

      ?>
      Welcome to OnlineStore ! <b style="color: black"> Shopping Cart -</b>
      Total Items:<?php total_items();?> Total Price: <?php total_price(); ?> <a href="cart.php"> Go to Cart </a>
      <!--creating login logout page-->
    <?php
       if(!isset($_SESSION['customer_email'])){

           echo "<a href='checkout.php' style='color:orange;'>Login</a>";
         }else {
           echo "<a href='logout.php' style='color:orange;'> Logout</a>";



       }

    ?>

    </span>

  </div>



<div id="products_box">
  <?php getPro();?>
  <?php getCatPro(); ?>
  <?php getBrandPro(); ?>
  </div>
</div>
<!--content wrapper ends here -->
<div id="footer">
<h2 style="text-align:center; padding-top:30px;">&copy;2016 by www.onlineStore.com</h2>
 </div>
</div>

<!--main container ends here -->







</body>
</html>
