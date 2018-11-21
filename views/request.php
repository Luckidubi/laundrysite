<?php
include 'control.php';
include '../inc.php';

if(isset($_GET['request'])){
$id = $_GET['request'];
 
 $sql = "SELECT * FROM services WHERE Id ='$id'";
 $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) >= 1){
    $row = mysqli_fetch_assoc($result);
      $type = $row['ServiceType'];
      $price = $row['PriceList'];
     
      $customerId = $_SESSION["customerId"];
  
  }

   }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Request Page</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	 <link href="../css/animate.min.css" rel="stylesheet">
<style>
	
.jumbotron{
	background: url(../img/aaw.jpg)  no-repeat center fixed;
	 -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
	height: 400px;
}


</style>

</head>
<body>
<div class="Jumbotron text-center">

</div>
<div class="container">
<div class="row">
<div class="col-sm-12 col-md-6">
	<h3 class="display-3  animated tada delay-3s">Thank You for Your Patronage. We exist to serve you.</h3>
	
</div>
<div class="col-sm-12 col-md-6">
	<?php if (isset($_SESSION['msg'])) :?>
          <div class="alert alert-success alert-dismissible fade show"><?php echo $_SESSION['msg'];
          unset($_SESSION['msg']);
          ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> 
          <?php else:?>
           <?php endif;?>
	<p class="lead">Fill the form to complete your request</p>
	<div class="card text-left">

 		<div class=" card-header text-center">
 		Complete Your request
 		</div>
 		<div class="card-body">
 		<form method="post" action="control.php">
 			<div class="form-group">
 			<input type="hidden" name="type" value="<?php echo $type?>">
 			<input type="hidden" name="price"  value="<?php echo $price?>">
 			<input type="hidden" name="customer"  value="<?php echo $customerId?>">
 			<label><b>Address:</b> </label>
 			<input type="text" name="address" class="form-control" required="required" placeholder="Enter Address"><br>
			
 			<label><b>Date of Collection:</b></label>
 			<input type="date" name="date" class="form-control" required="required"><br>

 		
			<input type="submit" class="d-flex btn btn-sm btn-success" name="sub" value="Submit">

			</div>
 			
 		</form>
 		</div>
 	</div>
</div>

</div>

</div>

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../assets/js/vendor/holder.min.js"></script>
</body>
</html>