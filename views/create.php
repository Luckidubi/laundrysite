<?php
require 'control.php';
include 'header.php';
include 'sidebar.html';

if(!isset($_SESSION['admin'])){
	header('location: signin.php');
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
 	<?php if(isset($_SESSION['msg'])):?>
             <div class="alert alert-success alert-dismissible fade show">
              <?php echo $_SESSION['msg'];
               unset($_SESSION['msg']);
            ?>
        </div>
      <?php endif;?>
 	<div class="card text-left">
 		<div class=" card-header text-center">
 			Create Services
 		</div>
 		<div class="card-body">
 		<form method="post" action="control.php">
 			<div class="form-group">
 			<label><b>Service:</b> </label>
 			<input type="text" name="type" class="form-control" placeholder="Type of Service" required="required "><br>

 			<label><b>Price:</b></label>
 			<input type="text" name="price" class="form-control" placeholder="Price of Service" required="required"><br>

 			<label><b>Description:</b> </label>
 			<textarea cols="5" rows="5"  name="data" class="form-control" required="required"></textarea><br>

			<input type="submit" class ="btn btn-success center" name="save" value="Create Service">

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