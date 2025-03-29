<?php
	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$PlantName = $_POST['PlantName'];
	$Price = $_POST['Price'];
    $Adress = $_POST['Adress'];
    $Contact = $_POST['Contact'];
	
	// Database connection
	$conn = new mysqli('localhost','root','','webherbal');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into product(Name, Email, PlantName, Price, Adress, Contact) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $Name, $Email, $PlantName, $Price, $Adress, $Contact);
		$execval = $stmt->execute();
		echo $execval;
		echo "Submitted Order successfully...";
		$stmt->close();
		$conn->close();
	}
?>