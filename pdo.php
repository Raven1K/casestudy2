
<?php
//$pdo = new PDO('mysql:host=localhost;port=3306;dbname=misc','root', '');

//$pdo = new PDO('pgsql:host=localhost;port=5432;dbname=misc','postgres', 'new-password');

// See the "errors"
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$servername = "localhost";
$dbname = "dbmartian";
$username = "root";
$password = "";
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=dbmartian','root', '');
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>




