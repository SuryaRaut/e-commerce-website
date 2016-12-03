<!DOCTYPE html>
<?php include("functions/functions.php");?>
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
  <div id="shopping_cart">
    <span style="float:right; font-size18px; padding:5px; line-height: 40px;"> Welcome to the OnlineStore ! <b style="color: black"> Shopping Cart -</b>
      Total Items: Total Price: <a href="cart.php"> Go to Cart </a>
    </span>

  </div>

<div id="products_box">
<?php
  if(isset($_GET['search'])){

   $search_query =$_GET['user_query'];


  $get_pro = "select * from products where product_keywords like '%$search_query%' ";
  $run_pro = mysqli_query($con, $get_pro);

  while($row_pro = mysqli_fetch_array($run_pro)){
    $pro_id = $row_pro['product_id'];
    $pro_cat = $row_pro['product_cat'];
    $pro_brand = $row_pro['product_brand'];
    $pro_title = $row_pro['product_title'];
    $pro_price = $row_pro['product_price'];
    $pro_image = $row_pro['product_image'];
    echo "
       <div id='single_product'>
       <h3> $pro_title </h3>
       <img src='admin_area/product_images/$pro_image' width='180' height='180'/>
       <p><b> $ $pro_price </b></p>
       <a href='details.php?pro_id=$pro_id' style='float:left;'> Details </a>
       <link href='home.php?pro_id=$pro_id'> <button style='float:right'> Add to cart </button></a>
       </div>";
     }
   }
  ?>
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
