<?php
	include_once('connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();

	try{
		$id = $_POST['martian_id'];
		$stmt = $db->prepare("SELECT * FROM martian WHERE martian_id = :id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$output['data'] = $stmt->fetch();
	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();
	}

	//close connection
	$database->close();

	echo json_encode($output);

?>a