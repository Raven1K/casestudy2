<?php
	include_once('connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try{
		$id = $_POST['martian_id'];
		$firstname = $_POST['first_name'];
		$lastname = $_POST['last_name'];
		$address = $_POST['base_name'];

		$sql = "UPDATE martian SET first_name = '$firstname', last_name = '$lastname', base_name = '$base' WHERE martian_id = '$id'";
		//if-else statement in executing our query
		if($db->exec($sql)){
			$output['message'] = 'Martian updated successfully';
		} 
		else{
			$output['error'] = true;
			$output['message'] = 'Something went wrong. Cannot update Martian';
		}

	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();
	}

	//close connection
	$database->close();

	echo json_encode($output);
	
?>