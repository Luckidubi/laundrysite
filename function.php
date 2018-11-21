<?php
session_start();

$fname = $lname = $uname = $address = $phone = $comment = $zipcode = $city = $country = $email = $gender = $password = $password_2 = $website = "";
$nameErr = $fnameErr = $unameErr = $emailErr = $genderErr = $addressErr = $zipcodeErr = $cityErr = $countryErr = $websiteErr = $phoneErr = $passwordErr = $passwordErr2 = "";
$unameErr2 = $emailErr2 = '';

//Connecting to the database


$servername ='localhost';
$username = 'Developer';
$pass = '1234';
$db = 'laundry_site';

//Create connection

$conn = mysqli_connect($servername, $username, $pass, $db);



if(isset($_POST['save'])){

	$type = mysqli_real_escape_string($conn, $_POST['type']);
	$price = mysqli_real_escape_string($conn,$_POST['price']);

	$create = mysqli_query($conn, "INSERT INTO services (ServiceType, PriceList) VALUES('$type', '$price')"); 
	
	if($create){
		$_SESSION['msg'] = 'The new service has been added';
		header("location: create.php");
	}else {
		$_SESSION['msg'] = 'Service failed to update';
		header("location: create.php");
	}
}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$type = $_POST['type'];
	$price = $_POST['price'];

	$update = mysqli_query($conn, "UPDATE services SET ServiceType='$type', PriceList='$price' WHERE Id='$id'") or die(mysqli_error($conn));
	if($update){
	$_SESSION['msg'] = "Service updated!"; 
	header('location: show.php');
} else{
 $_SESSION['msg'] = "Failed to Update";
 header('location: edit.php');

}

}

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$delete = mysqli_query($conn, "DELETE FROM services WHERE Id='$id'") or die(mysqli_error($conn));
	
	if($delete){
	$_SESSION['msg'] = "Service deleted!"; 
	header('location: show.php');
}else {
	$_SESSION['msg'] = "Service failed to be deleted!"; 
}
}





function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


function register($a, $b, $c, $d, $e){

$servername ='localhost';
$username = 'Developer';
$pass = '1234';
$db = 'laundry_site';

//Create connection

$conn = mysqli_connect($servername, $username, $pass, $db);

	$a = mysqli_real_escape_string($conn, $a);
	$b = mysqli_real_escape_string($conn, $b);
	$c = mysqli_real_escape_string($conn, $c);
	$d = mysqli_real_escape_string($conn, $d);
	$e = mysqli_real_escape_string($conn, $e);
	
	
	

	
	

	$finddata = mysqli_query($conn, "SELECT Email, Username FROM customers WHERE Email='$d' || Username = '$b'")or die(mysqli_error($conn));
			$finddata1 = mysqli_num_rows($finddata);
			//var_dump($finddata1);die();
		if ($finddata1 == 0){
	
			$f = date("d/m/Y");
			$senddata = mysqli_query($conn, "INSERT INTO customers
			(Fullname,Username,Phone,Email,Password,Date_registered)VALUES('$a','$b','$c','$d', '$e', now())")or die(mysqli_error($conn));
			if ($senddata) {
				$_SESSION['username'] = $b;
				$_SESSION['email'] = $d;
				$_SESSION['message'] = 'Registration successful please login to your account';
				 header("location: signin.php");
			}else echo 'Not registered';
		} else $_SESSION['message'] = 'Email already exists';
		
	}


function logIn($email, $password) {
		 	$servername = "localhost";
		 	$username = "Developer";
		 	$pass = "1234";
		 	$db = "laundry_site";

		 // Create connection to database
		 	$conn = mysqli_connect($servername, $username, $pass, $db);
		 		$email = mysqli_real_escape_string($conn, $email);
		 		//$uname = mysqli_real_escape_string($conn, $uname);
		 		$password = mysqli_real_escape_string($conn, $password);
		 		
				
			

		 	// Get credentials to log in

		 		// $getdata = mysqli_query($conn, "SELECT * FROM customers 
		 		//  	WHERE Email = '$email' || Username = '$uname'")or die(mysqli_error($conn));

		 		$getdata = mysqli_query($conn, "SELECT * FROM customers 
		 		 	WHERE Email = '$email'")or die(mysqli_error($conn));

		 		
		 		$getdata1 = mysqli_num_rows($getdata);


		 		if ($getdata1 == 1) {
		 			$getdata2 = mysqli_fetch_object($getdata);
		 			$password_1 = md5($password);
		 			//
		 					 
		 			if ($getdata2->Password == $password_1) {
		 							 						 			//var_dump($getdata3); var_dump($password_1); die();		 			 

		 			
						$_SESSION["username"] = $getdata2->Username;
						$_SESSION["email"] = $email;
						$_SESSION["customerId"] = $getdata2->CustomerId;
						$_SESSION["message"] = "You're Logged in";
						header('location: pricing.php');
			 		
		 } else $_SESSION['error'] = "Incorrect Password";
		} else $_SESSION['error'] = "incorrect Details";
	}

	function AdminLogIn($email, $uname, $password) {
		 	$servername = "localhost";
		 	$username = "Developer";
		 	$pass = "1234";
		 	$db = "laundry_site";

		 // Create connection to database
		 	$conn = mysqli_connect($servername, $username, $pass, $db);
		 		$email = mysqli_real_escape_string($conn, $email);
		 		$uname = mysqli_real_escape_string($conn, $uname);
		 		$password = mysqli_real_escape_string($conn, $password);
		 		
				
			

		 	// Get credentials to log in

		 		$getdata = mysqli_query($conn, "SELECT * FROM admin 
		 			WHERE Email = '$email' || Name = '$uname'")or die(mysqli_error($conn));

		 		$getdata1 = mysqli_num_rows($getdata);


		 		if ($getdata1 == 1) {
		 			$getdata2 = mysqli_fetch_object($getdata);
		 			$password_1 = md5($password);
		 			//
		 					 
		 			if ($getdata2->Password == $password_1) {
		 							 						 			//var_dump($getdata3); var_dump($password_1); die();		 			 

		 			
						$_SESSION["admin"] = $uname;
						$_SESSION["email"] = $email;
						$_SESSION["phone"] = $getdata2->Phone;
						$_SESSION["msg"] = "Welcome to Your dashboard, Admin";
						header('location: admin.php');
			 		
		 } else $_SESSION['error'] = "Incorrect Password";
		} else $_SESSION['error'] = "You're not authorised";
	}

			// When there is no occurrence enter these data into the database
