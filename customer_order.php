<?php
session_start();
#this is Login form page , if user is already logged in then we will not allow user to access this page by executing isset($_SESSION["uid"])
#if below statment return true then we will send user to their profile.php page
// if (isset($_SESSION["uid"])) {
// 	header("location:profile.php");
// }
//in action.php page if user click on "ready to checkout" button that time we will pass data in a form from action.php page

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
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<style>
					.navbar-inverse {
    background-color:#2ECCFA;
    border-color: #2ECCFA;
	color: transparent;
}
.navbar-inverse .navbar-brand {
    color: #100b0b;
}
.navbar-inverse .navbar-brand:focus, .navbar-inverse .navbar-brand:hover {
    color: white;
}


.navbar-inverse .navbar-nav > li > a {
  color: black;
}
.navbar-inverse .navbar-nav > li > a:hover,
.navbar-inverse .navbar-nav > li > a:focus {
  color: white;
  background-color: transparent;
}
.nav-pills  a{
  color: #254943;
  background-color: #D8D8D8
}
.panel-primary{
	border-color: #D8D8D8;
}

.panel-primary > .panel-heading {
    color: black;
    background-color: #D8D8D8;
    
}
	</style>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Saman</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
			</ul>
		</div>
		</div>
		<p><br/></p>
		<p><br/></p>
		<p><br/></p>
		<table class="table table-striped table-sm">
          <thead>
            <tr>
            
              <th>product_id</th>
              <th>product_title</th>
              <th>product_price</th>
              <th>qty</th>
              <th>uid</th>
             
            </tr>
			<?php
			 include 'db.php';
			 $userid=$_SESSION['uid'];
				$servicefetchSQL= "SELECT * from orders where user_id='$userid'";
				$fetchResult=mysqli_query($con,$servicefetchSQL);
				foreach($fetchResult as $value){
					?>
        		<tr>
           	 <td ><?php echo $value['product_id']?></td>
             <td><?php echo $value['product_title']?></td>
              <td><?php echo $value['product_price']?></td>
			  <td><?php echo $value['qty']?></td>
			  <td><?php echo $value['user_id']?></td>
			 
              
        
       </tr>
       <?php 
}



?>
          </thead>
          
           
          </tbody>
        </table>
		<div class="col-md-4"></div>
	</div>
</body>
</html>






















