<?php
session_start();
$servername ='localhost';
$username = 'Developer';
$pass = '1234';
$db = 'laundry_site';

//Create connection

$conn = mysqli_connect($servername, $username, $pass, $db);



if(isset($_POST['save'])){

	$type = mysqli_real_escape_string($conn, $_POST['type']);
	$price = mysqli_real_escape_string($conn,$_POST['price']);
	$data =  mysqli_real_escape_string($conn,$_POST['data']);

	$create = mysqli_query($conn, "INSERT INTO services (ServiceType, PriceList) VALUES('$type', '$price', $data)"); 
	
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
	$data = $_POST['data'];

	$update = mysqli_query($conn, "UPDATE services SET ServiceType='$type', PriceList='$price', Description = '$data' WHERE Id='$id'") or die(mysqli_error($conn));
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

if (isset($_POST['sub'])) {
	$id = $_POST['customer'];
	$type = $_POST['type'];
	$price = $_POST['price'];
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$date = $_POST['date'];

	$insert =  mysqli_query($conn, "INSERT INTO request (Services, Price, CustomerId, Address, DateOfCollection) VALUES('$type', '$price', '$id', '$address', '$date')"); 
	if($insert){
	header('location: pricing.php');
	$_SESSION['msg'] = "Your request has been received Relax, we're coming to your house!"; 
} else{
 $_SESSION['msg'] = "Request Failed";
 

}

}

function getrequest($id){
$servername ='localhost';
$username = 'Developer';
$pass = '1234';
$db = 'laundry_site';

//Create connection

$conn = mysqli_connect($servername, $username, $pass, $db);

$id = $_SESSION['customerId'];

$sql = mysqli_query($conn, "SELECT * FROM request WHERE CustomerId = '$id'") or die(mysqli_error($conn));


$result = mysqli_num_rows($sql);

if ($result > 0){
	$record = mysqli_fetch_object($sql);
	return array($result, $record);

}

}

?>