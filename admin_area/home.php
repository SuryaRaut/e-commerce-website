
<?php
   session_start();
   if(!isset($_SESSION['user_email'])){
     echo "<script>window.open('login.php?not_admin=You are not an Admin!', '_self')</script>";
   }
   else {
 ?>



<!DOCTYPE>
<html>
<head>
  <title> This is Admin Panel</title>
  <link rel="stylesheet" href="styles/style.css" media="all"/>
</head>
<body>


<div class ="main_wrapper">
  <div id="header"></div>

  <?php
  if(isset($_GET['view_products'])){
    include("view_products.php");
  }
  if(isset($_GET['view_cats'])){
    include("view_cats.php");
  }
  if(isset($_GET['edit_cat'])){
    include("edit_cat.php");
  }
  if(isset($_GET['view_brands'])){
    include("view_brands.php");
  }
  if(isset($_GET['view_customers'])){
    include("view_customers.php");
  }

  ?>
  <div id="right">


    <h3 style="text-align:center; ">Manage Content </h3>

     <a href="home.php?insert_product">Insert Product</a>
     <a href="home.php?view_products">View Products</a>
     <a href="home.php?insert_cat">Insert New Category</a>
     <a href="home.php?view_cats">View All Categories</a>
     <a href="home.php?insert_brands">Insert New Brands</a>
     <a href="home.php?view_brands">View ALL Brands</a>
     <a href="home.php?view_customers">View Customers</a>
     <a href="home.php?view_orders">View orders</a>
     <a href="home.php?view_payments">View Payments</a>
     <a href="logout.php">Admin Logout</a>



  </div>
  <?php


    if(isset($_GET['insert_product'])){
      include("insert_product.php");
    }
    if(isset($_GET['edit_pro'])){
      include("edit_pro.php");
    }
    if(isset($_GET['insert_cat'])){
      include("insert_cat.php");
    }
    if(isset($_GET['insert_brand'])){
      include("insert_brand.php");
    }
    if(isset($_GET['edit_brand'])){
      include("edit_brand.php");
    }


    ?>


  <div id="left"></div>

</div>

</body>
</html>
<?php } ?>
