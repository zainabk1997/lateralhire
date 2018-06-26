<?php 
session_start();
require_once("db.php");

//If user clicks on login button
if(isset($_POST)){

	$email =     mysqli_real_escape_string($conn, $_POST['email']);
	$password =  mysqli_real_escape_string($conn, $_POST['password']);

	//Encrypt Password
	$password = base64_encode(strrev(md5($password)));

	$sql = "SELECT id_user, firstname, lastname, email, password FROM users WHERE email= '$email' AND password= '$password'";
	$result= $conn->query($sql);

	if($result->num_rows >0){
		//output data
		while($row=$result->fetch_assoc()){
			$_SESSION['name'] = $row['firstname'] . " " . $row['lastname'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['id_user'] = $row['id_user'];
			header("Location: user/dashboard.php");
			exit();
		} } else {
			$_SESSION['loginError']= true;
			header("Location: login.php");
			exit();
		}
	
		$conn->close();
} else {
	header("Location: login.php");
	exit();
}