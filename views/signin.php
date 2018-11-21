<?php 
include "../function.php";
$_SESSION['error'] = '';
 if(isset($_POST["login"])) {
    $email = $_POST["info"];
    $uname = $_POST["info"];

    $password = $_POST["psw"];
    }
if(isset($_POST['login'])){
    if(empty($_POST['info'])){
       $_SESSION['error'] = "Username or Email is required";
    }else{
        $email = test_input($_POST['info']);
        $uname = test_input($_POST['info']);

    }
    if($_POST['info'] == 'Admin'){
      $call = AdminLogin($email, $uname, $password);
     } 

    if(empty($_POST['psw'])){
        $_SESSION['error'] = "Password is required";
    }else {
        $password = test_input($_POST['psw']);


        $call = logIn($email,$password);
       
         
    }
     

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

    <title>Signin</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <a class = "btn btn-secondary ml-5" style="margin-bottom: auto" href="coverpage.html">Go Back</a>
    
   
    <div class="card text-left" style="margin: auto; width: 50%">
      <div class="card-header text-center">
        <h2>Please Sign in</h2>
      </div>
      <div class="card-body text-left">
       <form class="form-signin" method="post" >
      <!--<img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">-->
      <?php if ($_SERVER["REQUEST_METHOD"] == "POST") :?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert"><?php echo $_SESSION['error'];?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> 
          <?php else:?>
           <?php endif;?>

      <label for="inputEmail">Email address/ Username:</label>
      <input type="text" name="info" class="form-control" placeholder="Email address"  autofocus><br>
      <label for="inputPassword">Password</label>
      <input type="password" name="psw" class="form-control" placeholder="Password" >
       

    <input class="btn btn-md btn-info btn-block" name="login" value="Sign In" type="submit"/> <br>
     
      
       <p>Don't have an account? <a href="signup.php">Sign Up</a></p> 
       <p><a href = "">Forgot</a> Password?</p> &nbsp;
      
          <p class="mt-5 mb-3 text-muted">Laundrysite &copy; 2017-2018</p>
      </form>
      </div>
    </div>

     <script src="jquery/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../js/typed.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
