<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] ===true){
  header("location: acasa.php");
  exit;
}
require_once "config.php";
$username = "";
$password = "";
$username_err = "";
$password_err = "";
$ok = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(empty(trim($_POST["username"]))){
    $username_err = "Introdu un nume de utilizator.";
  } else {
    $username = trim($_POST["username"]);
  }
  if(empty(trim($_POST["password"]))){
    $password_err = "Introdu o parola.";
  } else {
    $password = trim($_POST["password"]);
  }
  if(empty($username_err) && empty($password_err)){
    $sql = "SELECT id_user, user, pass FROM utilizatori WHERE user = :username";
    if($stmt = $conn->prepare($sql)){
      $param_username = trim($_POST["username"]);
      $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
      if($stmt->execute()){
        if($stmt->rowCount() == 1){
          if($row = $stmt->fetch()){
            $id = $row["id_user"];
            $username = $row["user"];
            $hashed_pass = $row["pass"];
            // password_hash($_POST['password']);
            // echo $password . "<br>";
            // echo ((password_hash($_POST['password'], PASSWORD_DEFAULT) . " - " . $hashed_pass));
            // die();
            if(password_verify($password, $hashed_pass)){
              session_start();
              $_SESSION["loggedin"] = true;
              $_SESSION["id_user"] = $id;
              $_SESSION["username"] = $username;
              $_SESSION["username"] = $_POST["username"];
              header("location: agenda.php");
            } else {
              $password_err = "Parola introdusa nu este valida.";
              $ok = true;
            }
          }
        } else {
          $username_err = "Nu a fost gasit niciun cont cu acest nume de utilizator.";
        }
      } else{
        echo "Ceva a mers prost. Incearca mai tarziu.";
        die();
      }
    }
    unset($stmt);
  }
  if(empty($username_err) && empty($password_err)){
    $sql = "UPDATE utilizatori SET last_login = :last_login WHERE id_user = :id_user";
    if($stmt = $conn->prepare($sql)){
      $stmt->bindParam("last_login", $param_last_login);
      $stmt->bindParam("id_user", $_SESSION["id_user"]);
      $param_last_login = strtotime(date('Y-m-d h:i:s'));
      $stmt->execute();
      header("location: agenda.php");
    }
    unset($stmt);
  }
  unset($conn);
}
include('./layout/back-log.php');
?>
