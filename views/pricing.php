<?php  
include 'control.php';
include '../inc.php';

if(!isset($_SESSION['username'])){
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

    <title>User Dashboard</title>

    <!-- Bootstrap core CSS --> <link href="../css/bootstrap.min.css" rel="stylesheet">
   

    <!-- Custom styles for this template -->
    <link href="user.css" rel="stylesheet">
  </head>

  <body>
<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="../img/ad.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h5>Affordable Price</h5>
          <p class="lead">we offer you the best services at the cheapest rate.</p>
        </div>
      </div>
      <div class="carousel-item ">
        <img class="d-block w-100" src="../img/ae.jpg" alt="Second slide" style="height: 800px; width: 100%;">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="display-3" style="color: black">Customer Satisfaction</h5>
          <p class="lead">We Put our customers First</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="../img/service.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
          <h5></h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
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
      <h1 class="display-4">Pricing</h1>
      <p class="lead"></p>
    </div>
<div class="container">
       <div class='card-deck mb-3 text-center'>
  <?php
  $sql = "SELECT * FROM services";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) >= 1){
    while ($row = mysqli_fetch_assoc($result)){
      $type = $row['ServiceType'];
      $price = $row['PriceList'];
      $data = $row['Description'];
      $Id = $row['Id'];
    echo "
   
    <div class='card mb-4 shadow-sm'>
       <div class='card-header'>
            <h4 class='my-0 font-weight-normal'>$type</h4>
          </div>
          <div class='card-body'>
            <h1 class='card-title pricing-card-title'>$ $price <small class='text-muted'>/ cloth</small></h1>
            <ul class='list-unstyled mt-3 mb-4'>
              <li>$data</li>
              
            </ul>
            <a href ='request.php?request=$Id' class='btn btn-lg btn-block btn-outline-primary'>Make Request</a>
            </div>
          </div>
         
    ";
    }
  }
  ?>
         
    </div>

      <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <img class="mb-2" src="../../assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
            <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
          </div>
          <div class="col-6 col-md">
           
          </div>
          <div class="col-6 col-md">
            <h5>Services</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Resource</a></li>
              <li><a class="text-muted" href="#"></a></li>
              <li><a class="text-muted" href="#"></a></li>
              <li><a class="text-muted" href="#"></a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>About</h5>
            <ul class="list-unstyled text-small">
              
            </ul>
          </div>
        </div>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../assets/js/vendor/holder.min.js"></script>
      <script>

  $(".navbar-nav .nav-link").on("click", function(){
    $(".navbar-nav .nav-link").removeClass("active");
    $(this).addClass("active");
  });</script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>
