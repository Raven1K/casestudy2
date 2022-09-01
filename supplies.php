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
  <?php 
  		require_once 'navbar.php';
  		require_once 'hdrbases.php';
  ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>List of Supplies Available in each Bases with their Corresponding Quantity</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="">
                                <tr>
                                    <th>BASE NAME</th>
				    <th>SUPPLY NAME</th>	
                                    <th>Description</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    $query = "SELECT supply.supply_id, supply.name, supply.description, inventory.quantity
				    		FROM (SELECT * FROM inventory WHERE base_id = 2) 
						RIGHT JOIN supply ON supply.supply_id = inventory.supply_id
						ORDER BY supply.supply_id";
                                    $statement = $conn->prepare($query);
                                    $statement->execute();

                                    $statement->setFetchMode(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
                                    $result = $statement->fetchAll();
                                    if($result)
                                    {
                                        foreach($result as $row)
                                        {
                                            ?>
                                            <tr>                                                
                                                <td><?= $row->base_name; ?></td>
                                                <td><?= $row->name; ?></td>
						<td><?= $row->description; ?></td>
                                                <td><?= $row->quantity; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <tr>
                                            <td colspan="5">No Record Found</td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




	<script src="js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>

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
