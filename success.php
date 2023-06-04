<?php
session_start();
$userid=$_SESSION['uid'];
$amount=$_SESSION['amount'];
// echo $userid;
// echo "<br>";
// echo $amount;
include "db.php";
if (!isset($_SESSION["uid"])){
    die("login required!<a href='../login_form.php'>click here</a> ");
}
$userid=$_SESSION['uid'];
$selectorder= "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
$selectorderquery = mysqli_query($con,$selectorder);
if(!$selectorderquery){
    die(mysqli_error($con));
}
?>
<!DOCTYPE html>
					<html>
						<head>
							<meta charset="UTF-8">
							<title>Ecommerce</title>
							<link rel="stylesheet" href="css/bootstrap.min.css"/>
							<script src="js/jquery2.js"></script>
							<script src="js/bootstrap.min.js"></script>
							<script src="main.js"></script>
							<style>
								table tr td {padding:10px;}
							</style>
						</head>
					<body>
						
						 -->
							<div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<div class="panel panel-default">
										<div class="panel-heading"></div>
										<div class="panel-body">
											<h1>Thankyou </h1>
											<hr/>
											<p>Hello <?php echo "<b>".$_SESSION["name"]."</b>"; ?>,Your payment process is 
											successfully completed <br> <br> <br><table>
        <tr >
            <th>Product_id</th>
            <th>Product_title</th>
            <th>Product_price</th>
            <th>Qty</th>
        </tr>
        <?php
        foreach($selectorderquery as $value){ ?>
        <tr>
            <td><?php echo $value['product_id'];?></td>
            <td><?php echo $value['product_title'];?></td>
            <td><?php echo $value['product_price'];?></td>
            <td><?php echo $value['qty'];?></td>
        </tr>
       
        <?php } ?>
      
    </table> </b><br/>
  <h3> And your total price <?php echo $amount; ?></h3> 
											you can continue your Shopping <br/></p>
											<form method="post" action="insert.php">
												<input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>">
												<input type="hidden" name="product_title" value="<?php echo $value['product_title'];?>">
												<input type="hidden" name="product_price" value="<?php echo $value['product_price'];?>">
												<input type="hidden" name="qty" value="<?php echo $value['qty'];?>">

												<input type="submit" value="Continue Shopping" class="btn btn-success btn-lg" name="submit">
											</form>
											<!-- <a href="index.php" class="btn btn-success btn-lg">Continue Shopping</a> -->
										</div>
										<div class="panel-footer"></div>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
						</div>
					</body>
					</html>

				<?php


?>



