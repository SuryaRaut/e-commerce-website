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
  <img id="logo" src="images/home.png" height="100" width="500"/>
  <img id="banner" src="images/logo.png" height="100" width="500"/>
</div>
<!--header ends here -->

<!--navigation bar starts here -->


<div class="menubar">
<ul id="menu">
  <li><a href="#">Home</a> </li>
    <li><a href="#">Available Products</a> </li>
    <li><a href="#">My Account</a> </li>
    <li><a href="#">Sign Up</a> </li>
    <li><a href="#">Shopping</a> </li>
    <li><a href="#">Contact Us</a> </li>

</ul>


<div id="form">
  <form method="get" action="result.php" enctype="multipart/form-data">
    <input type="text" name="user_query"/>
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



  <?php

  if(isset($_GET['pro_id'])){
  $product_id = $_GET['pro_id'];

  $get_pro = "select * from products where product_id='$product_id'";
  $run_pro = mysqli_query($con, $get_pro);

  while($row_pro = mysqli_fetch_array($run_pro)){
    $pro_id = $row_pro['product_id'];
    $pro_title = $row_pro['product_title'];
    $pro_price = $row_pro['product_price'];
    $pro_image = $row_pro['product_image'];
    $pro_desc = $row_pro['product_desc'];

    echo "
       <div id='single_product'>
       <h3> $pro_title </h3>
       <img src='admin_area/product_images/$pro_image' width='400' height='300'/>
       <p><b> $ $pro_price </b></p>
       <p> $pro_desc </p>
       <a href='home.php' style='float:left;'> Go Back </a>
       <link href='home.php?pro_id=$pro_id'> <button style='float:right'> Add to cart </button></a>
       </div>";
  }
}
  ?>

</div>
<!--content wrapper ends here -->
<div id="footer">
<h2 style="text-align:center; padding-top:30px;">&copy;2016 by www.onlineStore.com</h2>
 </div>
</div>

<!--main container ends here -->







</body>
</html>
