<?php 
include '../function.php';
$_SESSION['message'] = '';

if (isset($_POST['sub'])) {
  
  $fname = test_input($_POST["fullname"]);
  $uname = test_input($_POST["username"]);
  $phone = test_input($_POST["phone"]);
  $email = test_input($_POST["email"]);
  $password = test_input($_POST['psw']);
  $password_1 = md5($password);
  $password_2 = test_input($_POST['psw-repeat']);

}


if (isset($_POST['sub'])) {
  if (empty($_POST["fullname"])) {
    $_SESSION['message'] = "Enter your fullname is required";
  } else {
    $fname = test_input($_POST["fullname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
      $_SESSION['message'] = "Only letters and white space allowed"; 
    }
    if(strlen($fname) < 7){
      $_SESSION['message'] = 'Fullname too short';
  }
}

  if (empty($_POST["username"])) {
    $_SESSION['message'] = "Username is required";
  } else {
    $uname = test_input($_POST["username"]);
    
  }

  if (empty($_POST["phone"])) {
    $_SESSION['message'] = "Phone number is required";
  } else {
    $phone = test_input($_POST["phone"]);
    if(strlen($phone) < 9 ){
      $_SESSION['message'] = "Phone number is invalid";
    }
    
  }

  if (empty($_POST['psw'])) {
    $_SESSION['message'] = 'Password is required';
}   else {
    $password = test_input($_POST['psw']);
    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/', $password)){
      $_SESSION['message'] = 'Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters';
}
}


  if (empty($_POST['psw-repeat'])) {
    $_SESSION['message'] = 'Confirm Password is required';
}   else {
    $password_2 = test_input($_POST['psw-repeat']);
    if($password !== $password_2 ){
      $_SESSION['message'] = 'The confirm password does not match';
  } 
}    

if (empty($_POST["email"])) {
    $_SESSION['message'] = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $_SESSION['message'] = "invalid Email";
    }

}
  $call = register($fname,$uname,$phone,$email,$password_1);


    
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

    <title>Signup</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    
    <a class = "btn btn-secondary ml-5" style="margin-bottom: auto" href="coverpage.html">Go Back</a>
    <div class="card text-left" style="margin: auto; width: 50%">
      <div class="card-header text-center">
        <h2>Sign Up</h2>
      </div>
      <div class="card-body">
        <form class="form-signin" method="post">
          <?php if ($_SERVER["REQUEST_METHOD"] == "POST") :?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert"><?php echo $_SESSION['message'];?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> 
          <?php else:?>
           
          <?php endif;?>
      <!--<img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">-->
      <!-- <label><b>Full Name</b></label> -->
      <input type="text" name="fullname" class="form-control" placeholder="Enter your Fullname" value="<?php echo $fname; ?>"><br>
     <!--  <label><b>Username:</b></label> -->
      <input type="text" name="username" class="form-control" placeholder="Enter your Username" value="<?php echo $uname; ?>"><br>
      <!-- <label><b>Phone:</b></label> -->
      <input type="text" name="phone" class="form-control" placeholder="Enter your Phone" value="<?php echo $phone; ?>"><br>
      <!-- <label><b>Email address:</b></label> -->
      <input type="text" name="email" class="form-control" placeholder="Enter your Email address" value="<?php echo $email; ?>" autofocus><br>
     <!--  <label for="inputPassword"><b>Password:</b></label> -->
      <input type="password" name="psw" class="form-control" placeholder="Enter your Password" ><br>
     <!--  <label for="inputPassword"><b>Confirm Password:</b></label> -->
      <input type="password" name="psw-repeat" class="form-control" placeholder="Enter your Confirm Password" ><br>

      <input class="btn btn-md btn-success btn-block" name="sub" value="Sign Up" type="submit"/> <br>
     
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
