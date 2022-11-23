<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	
	// Database connection
	$conn = new mysqli('localhost','root','','arz');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);}
    else {
		$stmt = $conn->prepare("insert into register(name,email, pass) values(?,?,?)");
		$stmt->bind_param("sss", $name,$email, $pass);
		$execval = $stmt->execute();
		echo $execval;
		echo header('Location: login.html');
		$stmt->close();
		$conn->close();
	}
?>