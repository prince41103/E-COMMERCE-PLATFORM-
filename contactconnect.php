<?php
	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$Subject = $_POST['Subject'];
	$Message = $_POST['Message'];
	
	// Database connection
	$conn = new mysqli('localhost','root','','webherbal');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contactconnect(Name, Email, Subject, Message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $Name, $Email, $Subject, $Message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>