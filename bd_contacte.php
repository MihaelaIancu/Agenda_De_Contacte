<?php
$servername = "localhost:8889";
$username = "root1";
$password = "";
$dbname = "myphpdb";

try {
  $conn = new PDO("mysql:host = $servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql2 = "CREATE TABLE contacte(
  id_contact INT(6) AUTO_INCREMENT PRIMARY KEY,
  id_user INT(6),
  FOREIGN KEY (id_user) REFERENCES utilizatori(id_user),
  nume VARCHAR(150) NOT NULL,
  telefon VARCHAR(150) NOT NULL
)";
$conn->exec ($sql2);
echo "Tabelul CONTACTE creat cu succes<br>";
} catch (PDOException $e) {
  echo $sql1 . "<br>" . $e->getMessage();
}
$conn = null;
 ?>
