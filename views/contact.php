 <?php
 include 'control.php';
 include '../inc.php'; 

 <?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message']) ||
     empty($_POST['subject']) ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
  echo "No arguments Provided!";
  return false;
   }
  
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$message = $_POST['message'];
  
// Create the email and send the message
$to = 'admin@laundrysite.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "laundrysite:  $name";
$email_body = "You have received a new message from your laundrysite.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address"; 
mail($to,$email_subject,$email_body,$headers);
return true;      

?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
   
<link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/style.css"/>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap1.css"/>
     <link rel="stylesheet" type="text/css" href="../fontawesome/css/fontawesome.min.css"/>
<style>
  
.jumbotron{
  background: url(../img/back-5.jpg)  no-repeat center fixed;
   -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  height: 400px;
}
 html{
      background-color: grey;
      font-size: 100%;
    font-family: "GillSans", Arial, sans-serif;

    }
  body{
    background-color: #262b2d !important;
    font-family: "GillSans", Arial, sans-serif;
      color: white;
      line-height: 1em;
  }


</style>

</head>
<body>
<div class="Jumbotron text-center">
<!-- <h3 class="display-4 text-center mt-5 text-white">Contact Us</h3> -->
</div>
<div class="container">
<div class="row">
<div class="col-sm-12">
  <h3 class="display-3 text-center">We exist to serve you.</h3>
</div>


</div>
<section class="contact-form" id="contact-form">

          <div class="headergroup">
            <h2>
               
                  <span>Contact us</span>
                                           
              </h2>
            </div>

    <div class="container">       
      <div class="inner contact">
                <!-- Form Area --> <i class="fa fa-phone"></i>&nbsp;
                                            +2347866885
                                        
                <div class="contact-form">
                    <!-- Form -->
                    <br />
                    <form id="contact-us" method="post" action="contact.php">
                        <!-- Left Inputs -->
                       <div class="col-xs-6 ">
                            <!-- Name -->
                            <br>
                            <input type="text" name="name" id="name" required="required" class="form" placeholder="Name" />
                            <!-- Email -->
                            <input type="email" name="email" id="email" required="required" class="form" placeholder="Email" />
                            <!-- secondayject -->
                            <input type="text" name="subject" id="secondayject" required="required" class="form" placeholder="Subject" />
                        </div><!-- End Left Inputs -->
                        <!-- Right Inputs -->
                        <div class="col-xs-6">
                            <!-- Message -->
                            <br>
                            <textarea name="message" id="message" class="form textarea"  placeholder="Message"></textarea>
                        </div><!-- End Right Inputs -->
                        <!-- Bottom secondaymit -->
                        <div class="relative fullwidth col-xs-12">
                            <!-- Send Button -->
                            <button type="button" id="secondaymit" name="submit" class="form-btn semibold">Send Message</button> 
                        </div><!-- End Bottom secondaymit -->
                        <!-- Clear -->
                        <div class="clear"></div>
                    </form>

                    <!-- Your Mail Message -->
                    <div class="mail-message-area">
                        <!-- Message -->
                        <div class="alert gray-bg mail-message not-visible-message">
                            <strong>Thank You !</strong> Your email has been delivered.
                        </div>
                    </div>
                    </div>
                </div><!-- End Contact Form Area -->
            </div><!-- End Inner -->
            <br />
        
    </section>
    <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
           
            <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
          </div>
          <div class="col-6 col-md">
           <a href ="contact.php"> Contact us</a>
          </div>
          <div class="col-6 col-md">
            <h5><a href="pricing.php"> Services</a></h5>
            
          </div>
          <div class="col-6 col-md">
            <h5>About</h5>
           
          </div>
        </div>
      </footer>
    </div>
</div>
</body>
</html>
</div>

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
</body>
</html> 