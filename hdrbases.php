<!-- Base Icons -->

<?php
include('conn.php');
    $count1 = $conn->query('select count(*) from martian where base_id=1')->fetchColumn();                                    
    $count2 = $conn->query('select count(*) from martian where base_id=2')->fetchColumn();
    $count3 = $conn->query('select count(*) from martian where base_id=3')->fetchColumn();
    $count4 = $conn->query('select count(*) from martian where base_id=4')->fetchColumn();
    $count5 = $conn->query('select count(*) from martian where base_id=5')->fetchColumn();
?>

<div class="container-fluid bg-secondary text-center text-white">
<br>
  <div class="row">
    <div class="col">
    <h5>Tharsisland</h5>
    <a href="thars.php"><img src="images/mars_base1.jpg" class="shadow p-1 mb-1 bg-body" alt="Base 01" style="border-radius: 50%; width: 70%;"></a>
    <p>Number of Members: <?php echo $count1; ?></p>
    </div>
    <div class="col">
    <h5>Valles Marineris 2.0</h5>
    <a href="valles.php"><img src="images/mars_base2.jpg" class="shadow p-1 mb-1 bg-body" alt="Base 01" style="border-radius: 50%; width: 70%;"></a>
    <p>Number of Members: <?php echo $count2; ?></p>
    </div>
    <div class="col">
    <h5>Gale Cratertown</h5>
    <a href="gale.php"><img src="images/mars_base3.jpg" class="shadow p-1 mb-1 bg-body" alt="Base 01" style="border-radius: 50%; width: 70%;"></a>
    <p>Number of Members: <?php echo $count3; ?></p>
    </div>
    <div class="col">
    <h5>New New New York</h5>
    <a href="nnnyork.php"><img src="images/mars_base4.jpg" class="shadow p-1 mb-1 bg-body" alt="Base 01" style="border-radius: 50%; width: 70%;"></a>
    <p>Number of Members: <?php echo $count4; ?></p>
    </div>
    <div class="col">
    <h5>Olympus Mons Spa & Casino</h5>
    <a href="olumpus."><img src="images/mars_base5.jpg" class="shadow p-1 mb-1 bg-body" alt="Base 01" style="border-radius: 50%; width: 70%;"></a>
    <p>Number of Members: <?php echo $count5; ?></p>
    </div>
  </div>
</div>
