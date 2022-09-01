<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Fontawesome Icons-->
    <link rel="stylesheet" href="fonts/css/all.css">

    <title>Welcome to Red Planet</title>
  </head>

  <body>
    <?php include_once('connection.php'); ?>
    <?php require_once 'navbar.php';?>
    <br>
	
    <div class="container">
	<h1 class="page-header text-center"><b>List of Martian Base with their corresponding Martian Leaders</h1></b>
	<div class="row">
		<div class="col-sm-12 col-sm-offset-2">
		
      <font-awesome-icon icon="fa-solid fa-circle-plus" />
            <div id="alert" class="alert alert-info text-center" style="margin-top:20px; display:none;">
            	<button class="close"><span aria-hidden="true">&times;</span></button>
                <span id="alert_message"></span>
            </div> 
		<?php
        if ( isset($_SESSION['error']) ) {
            echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
            unset($_SESSION['error']);
        }
        if ( isset($_SESSION['success']) ) {
            echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
            unset($_SESSION['success']);
        }
        $stmt = $pdo->query("SELECT base.*, CONCAT (martian.first_name,' ', martian.last_name) AS LEADER FROM base
							LEFT JOIN martian ON martian.base_id = base.base_id
							WHERE martian.super_id IS null");
		
		echo "<table class='mt-3 table table-bordered table-striped' style='margin-top:20px;'>

			<thead>
			<th>BASE ID</th>
			<th>BASE NAME</th>
			<th>BASE FOUNDED</th>
			<th>MARTIAN LEADER</th>
			</thead>";
							
        while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
		    echo "<tr><td>";
			echo(htmlentities($row['base_id']));
            echo("</td><td>");
            echo(htmlentities($row['base_name']));
            echo("</td><td>");
            echo(htmlentities($row['founded']));
			echo "</td><td>";
            echo(htmlentities($row['LEADER']));
			echo("</td></tr>\n");
        }
        ?>								
        </table>
		</div>
	</div>
</div>

	<!-- Modals -->
	<?php include('modal.html'); ?>
	<script src="js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/app.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

</body>
</html>
