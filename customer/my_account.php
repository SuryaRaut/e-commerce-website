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
  <a href="../home.php"><img id="logo" src="images/home.png" height="100" width="500"/></a>
  <img id="banner" src="images/logo.png" height="100" width="500"/>
</div>
<!--header ends here -->

<!--navigation bar starts here -->


<div class="menubar">
<ul id="menu">
  <li><a href="../home.php">Home</a> </li>
    <li><a href="../all_products.php">Available Products</a> </li>
    <li><a href="customer/my_account.php">My Account</a> </li>
    <li><a href="../customer_register.php">Sign Up</a> </li>
    <li><a href="../cart.php">Shopping</a> </li>
    <li><a href="../home.php">Contact Us</a> </li>

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
<div id="sidebar_title"> My Account </div>
<ul id="cats">

  <?php
     $_SESSION['customer_email'];

     $get_img = "select * from customer where customer_email='$user'";
     $run_img = mysqli_query($con, $get_img);
     $row_img = mysqli_fetch_array($run_img);
     $c_image = $row_img['customer_image'];

     $c_name = $row_img['customer_name'];

     echo"<p style='text-align:center'; boarder='2px solid white;'><img src='customer_images/$c_image' width='150' height='150'/></p>";

  ?>
  <li><a href="my_account.php?my_orders">My Orders</a></li>
  <li><a href="my_account.php?edit_account">Edit Account</a></li>
  <li><a href="my_account.php?change_pass">Change Password</a></li>
  <li><a href="my_account.php?delete_account">Delete Account</a></li>
  <li><a href="logout.php">Logout</a></li>

</ul>

</div>

<div id="content_area">

  <?php cart(); ?>

  <div id="shopping_cart">
    <span style="float:right; font-size:15px; padding:5px; line-height: 40px;">
      <?php
       if(isset($_SESSION['customer_email'])){
         echo "<b>Welcome: </b>" . $_SESSION['customer_email'];
       }


      ?>

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

  <?php
    if(!isset($_GET['my_orders'])){
      if(!isset($_GET['edit_account'])){
        if(!isset($_GET['change_pass'])){
          if(!isset($_GET{'delete_account'})){

          echo "
            <h2 style='padding:20px;'> Welcome: $c_name </h2>
          <b> You can see your orders progress by clicking this <a href='my_account.php?my_orders'>link</a></b>";
          }
        }
}
}



   ?>
   <?php
     if(isset($_GET['edit_account'])){
       include("edit_account.php");
     }

     if(isset($_GET['change_pass'])){
       include("change_pass.php");
     }
     if(isset($_GET['delete_account'])){
       include("delete_account.php");
     }
    ?>


  </div>
</div>
<!--content wrapper ends here -->








<div id="footer">
<h2 style="text-align:left; padding-top:30px;">&copy;2016 by www.onlineStore.com</h2>
 </div>
</div>

<!--main container ends here -->







</body>
</html>
