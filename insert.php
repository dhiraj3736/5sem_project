<?php
session_start();
include 'db.php';
if(isset($_POST['submit'])){
  $product_id=$_POST['product_id'];
  $product_title=$_POST['product_title'];
  $product_price=$_POST['product_price'];
  $qty=$_POST['qty'];
  $userid=$_SESSION['uid'];
    
  $sql = "INSERT INTO orders(product_id,product_title,product_price,qty,user_id,p_status) VALUES ('$product_id','$product_title','$product_price','$qty','$userid',0)";

  if(!mysqli_query($con,$sql)){

      die(mysqli_error($con));
  }
  else{
    header('location:profile.php');
  }
  

  }
  

?>