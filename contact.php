<?php
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$event = $_POST['event'];
	$message = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','customer data');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into users(Name, PhoneNo, email, event, message) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $name, $phone, $email, $event, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>