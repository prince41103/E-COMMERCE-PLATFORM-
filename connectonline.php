<?php
	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$PlantName = $_POST['PlantName'];
	$Price = $_POST['Price'];
	$Adress = $_POST['Adress'];
    $Contact = $_POST['Contact'];
    $Upi = $_POST['Upi'];
	
	// Database connection
	$conn = new mysqli('localhost','root','','webherbal');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into online(Name, Email, PlantName, Price, Adress, Contact, Upi) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssii", $Name, $Email, $PlantName, $Price, $Adress, $Contact, $Upi);
		$execval = $stmt->execute();
		echo $execval;
		echo "online Order successfully...";
		$stmt->close();
		$conn->close();
	}
?>