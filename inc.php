<nav class="navbar navbar-expand-lg sticky-top navbar-dark justify-content-center" style="background-color: #262b2d !important" >
  <a class="navbar-brand" href="#">Laundrysite</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
    <div class="navbar-nav mr-5">
      <a class="nav-item nav-link ml-4" href="coverpage.html">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link ml-4" href="About.php">About us</a>
      <a class="nav-item nav-link ml-4" href="pricing.php">Pricing</a>
      <a class="nav-item nav-link ml-4" href="contact.php">Contact us</a>
    </div>
  </div>
    <div class="navbar-nav ml-5">
   <?php if(isset($_SESSION['username'])):?>
      <div class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                         Hello <?php echo $_SESSION['username'] ;?> <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="logout.php"
                               >
                                Logout
                            </a>
                          </div>
                   
                      </div>
      <?php else:?>
                     
      <?php endif;?>

                   
  </div>   
</nav>


