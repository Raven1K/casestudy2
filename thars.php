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

    <br>

    <?php
    include('conn.php');
        $count1 = $conn->query('select count(*) from martian where base_id=1')->fetchColumn();
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3><b>Base Name: THARSISLAND</b></h3><br>
                        
                    </div>
                    <div class="card-body">
                        <h5><b>Base Leader: RAY BRADBURY</b><br>
                        <b>Number of Members: <?php echo $count1; ?></b></h5>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>MARTIAN ID</th>
                                    <th>BASE NAME</th>
                                    <th>NAME OF MARTIAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = 'SELECT m.martian_id, b.base_name, CONCAT(m.first_name," ", m.last_name) as martian
                                                FROM martian as m
                                                LEFT JOIN base as b
                                                ON m.base_id = b.base_id
                                                WHERE b.base_id = 1';
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
                                                <td><?= $row->martian_id; ?></td>
                                                <td><?= $row->base_name; ?></td>
                                                <td><?= $row->martian; ?></td>
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
    <br><br><br>




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