<?php
$servername = "localhost";
$dbusername = "root1";
$dbpassword = "";

$conn = null;

try {
  $conn = new PDO("mysql:host=$servername;dbname=myphpdb", $dbusername, $dbpassword);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Eroare de conectare" . $e->getMessage();
}
 ?>
