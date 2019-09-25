<?php
$servername = "localhost:8889";
$username = "root1";
$password = "";
$dbname = "myphpdb";

try {
  $conn = new PDO("mysql:host = $servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql1 = "CREATE TABLE utilizatori(
    id_user INT(6) AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(150) NOT NULL UNIQUE,
    pass VARCHAR(150) NOT NULL,
    created_at INT(11),
    last_login INT(11)
  )";
  $conn->exec ($sql1);
  echo "Tabelul UTILIZATORI creat cu succes<br>";
} catch (PDOException $e) {
  echo $sql1 . "<br>" . $e->getMessage();
}
$conn = null;
 ?>
