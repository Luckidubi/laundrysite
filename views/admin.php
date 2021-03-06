<?php
require '../function.php';
if(!isset($_SESSION['admin'])){
  header('location: signin.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Dashboard for Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="admin.css" rel="stylesheet">
  </head>

  <body>
   
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Laundry Site</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout.php">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
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
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
             
              <li class="nav-item">
                <a class="nav-link" href="show.php">
                  <span data-feather="tv"></span>
                  View Services
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="create.php">
                  <span data-feather="work"></span>
                  Create Service
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">
                  <span data-feather="users"></span>
                Customers
                </a>
              </li>
        
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved requests</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            
          </div>
        </nav>
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <!-- <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button> -->
              </div>
              <!-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button> -->
            </div>
          </div>
         
          <h2>Section title</h2>
          
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                
                <tr>
                  <th>Customers Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Date Registered</th>
                  <th>View Request</th>
                </tr>
              </thead>
              <tbody>
             <?php
             $sql = "SELECT * FROM customers";
             $result = mysqli_query($conn, $sql);
             if(mysqli_num_rows($result) >=1){
                while($row = mysqli_fetch_assoc($result)){
                  $fullname = $row['Fullname'];
                  $email = $row['Email'];
                  $phone = $row['Phone'];
                  $address = $row['Address'];
                  $date = $row['Date_registered'];
                  $id = $row['CustomerId'];
                  echo "
                  <tr>
                  <td>$fullname</td>
                  <td>$email</td>
                  <td>$phone</td>
                  <td>$address</td>
                  <td>$date</td>
                  <td><a class = 'btn btn-sm btn-info' href='adminrequestview.php?id=$id'>View</a></td></tr>

                  ";
                }
             }
             ?>



          
          
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
  
  </body>
</html>
