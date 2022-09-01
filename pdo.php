
<?php
//$pdo = new PDO('mysql:host=localhost;port=3306;dbname=misc','root', '');

//$pdo = new PDO('pgsql:host=localhost;port=5432;dbname=misc','postgres', 'new-password');

// See the "errors"
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$servername = "mysql:host=us-cdbr-east-06.cleardb.net; dbname=heroku_fe19d1fa6e9b61d";
$dbname = "bbc7383f40e78b";
$username = "4fbff9bd";
$password = "";
$pdo = new PDO('mysql:host=us-cdbr-east-06.cleardb.net;dbname=heroku_fe19d1fa6e9b61d','bbc7383f40e78b', '4fbff9bd');
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>




