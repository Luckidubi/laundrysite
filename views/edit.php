<?php
require 'control.php';
include 'header.php';
include 'sidebar.html';
if(!isset($_SESSION['admin'])){
	header('location: signin.php');
}

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$record = mysqli_query($conn, "SELECT * FROM services WHERE Id='$id'");
		$record2 = mysqli_num_rows($record);
		
		if ($record2 == 1 ) {
			$row = mysqli_fetch_assoc($record);
			$type = $row["ServiceType"];
			$price = $row['PriceList'];
			$data = $row['Description'];
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Create Service</title>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<style>
		
		
		.container{
			padding: 30px;
		}


	</style>
</head>
<body>
<div class="container">
<div class="row">
 <div class="col-sm-12 col-md-3">
 </div>
 <div class="col-sm-12 col-md-6">
 	<div class="card text-left">
 		<div class=" card-header text-center">
 			Update Services
 		</div>
 		<div class="card-body">
 		<form method="post" action="control.php">
 			<div class="form-group">
 			<input type="hidden" name="id" value="<?php echo $id ?>">
 			<label><b>Service:</b> </label>
 			<input type="text" name="type" class="form-control" required="required" placeholder="Type of Service" value="<?php echo $type?>"><br>
			
 			<label><b>Price:</b></label>
 			<input type="text" name="price" class="form-control" required="required" placeholder="Price of Service" value="<?php echo $price?>"><br>

 			<label><b>Description:</b> </label>
 			<textarea cols="5" rows="5"  name="data" class="form-control"  required="required"> <?php echo $data?></textarea> <br>
			<input type="submit" class="d-flex btn btn-sm btn-success" name="update" value="Update Service">

			</div>
 			
 		</form>
 		</div>
 	</div>


 </div>
 <div class="col-sm-12 col-md-3">
 </div>
</div>
</div>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../assets/js/vendor/holder.min.js"></script>
     <script>

	$(".sidebar .nav-link").on("click", function(){
		$(".sidebar .nav-link").removeClass("active");
		$(this).addClass("active");
	});</script>
</body>
</html>