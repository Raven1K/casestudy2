<?php
	include_once('connection.php');

	$database = new Connection();
	$db = $database->open();

	try{	
	    // $sql = 'SELECT * FROM martian';
		$sql = 'SELECT `m`.*, `b`.`base_id`, `b`.`base_name`
		FROM `martian` AS `m` 
			LEFT JOIN `base` AS `b` ON `m`.`base_id` = `b`.`base_id`';

	    foreach ($db->query($sql) as $row) {
	    	?>
	    	<tr>
	    		<td><?php echo $row['martian_id']; ?></td>
	    		<td><?php echo $row['first_name']; ?></td>
	    		<td><?php echo $row['last_name']; ?></td>
	    		<td><?php echo $row['base_name']; ?></td>
	    		<td class="text-center">
	    			<button class="btn btn-warning btn-sm edit" data-id="<?php echo $row['martian_id']; ?>"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
	    			<button class="btn btn-danger btn-sm delete" data-id="<?php echo $row['martian_id']; ?>"><i class="fa-solid fa-trash"></i> Delete</button>
	    		</td>
	    	</tr>
	    	<?php 
	    }
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	//close connection
	$database->close();
	
?>