<?php
require'control.php';
include 'header.php';
if(!isset($_SESSION['admin'])){
	header('location: signin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage services</title>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="sidebar.css">
	<style>
		body{
			
			text-align: center;
			
		}
		.container{
			padding: 30px;
		}

	</style>
</head>
<body>
	 <?php if(isset($_SESSION['msg'])):?>
             <div class="alert alert-success alert-dismissible fade show">
              <?php echo $_SESSION['msg'];
              unset($_SESSION['msg']);
              ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> </div> 
          <?php endif;?>
<div class="container">
<div class="row">
 <div class="col-sm-12 col-md-2">
 	<nav class="d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="admin.php">
                  <span data-feather="home"></span>
                  Dashboard 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                 <span data-feather="shopping-cart"></span>
                 Requests
              </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="show.php">
                  <span data-feather="tv"></span>
                  Services
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="create.php">
                 <span data-feather="tools"></span>
                  Create Service
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin.php">
                 <span data-feather="users"></span>
                Customers
                </a>
              </li>
        
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
              
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  
                  Current month
                </a>
              </li>
             
             
            </ul>
          </div>
        </nav>
 </div>
 <div class="col-sm-12 col-md-8">
         

 	<h2 class='display-4'>Manage Services</h2>
 	<?php $results = mysqli_query($conn, "SELECT * FROM services") or die(mysqli_error($conn)); ?>
 <table class="table table-striped" style="width: 100%;">
  <thead class="table-dark">
  	
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Service</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php while ($row = mysqli_fetch_assoc($results)){ ?>
    <tr>
      <th scope="row"><?php echo $row['Id']; ?></th>
      <td><?php echo $row['ServiceType']; ?></td>
      <td><?php echo $row['PriceList']; ?></td>
      <td><?php echo $row['Description']; ?></td>
      <td><a href="edit.php?edit=<?php echo $row['Id']; ?>" class="btn btn-sm btn-secondary" >Edit</a></td>
      <td><a href="control.php?delete=<?php echo $row['Id']; ?>" class="btn btn-sm btn-danger" >delete</a></td>
    </tr>
   <?php }?>
  </tbody>
</table>
<a class="btn btn-primary my-4" href="admin.php">Go Back</a>


 </div>
 <div class="col-sm-12 col-md-2">
 </div>





</div>
</div>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../assets/js/vendor/holder.min.js"></script>
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
  
    <script>

	$(".sidebar .nav-link").on("click", function(){
		$(".sidebar .nav-link").removeClass("active");
		$(this).addClass("active");
	});</script>
</body>
</html>