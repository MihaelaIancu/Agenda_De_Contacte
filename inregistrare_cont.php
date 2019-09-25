<?php
require_once "config.php";

$username = "";
$password = "";
$confirm_pass = "";
$username_err = "";
$password_err = "";
$confirm_pass_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(empty(trim($_POST["username"]))){
    $username_err = "Introdu un nume de utilizator.";
  } else {
    $sql = "SELECT id_user FROM utilizatori WHERE user = :username";
    $stmt = $conn->prepare($sql);
    $param_username = trim($_POST["username"]);
    $stmt->bindParam(":username", $param_username);
    if($stmt->execute()){
      if($stmt->rowCount() == 1){
        $username_err = "Numele de utilizator e deja folosit.";
      } else {
        $username = trim($_POST["username"]);
      }
    } else {
      echo "Ceva a mers prost. Incearca mai tarziu.";
      die();
    }
    unset($stmt);
  }
  if(empty(trim($_POST["password"]))){
    $password_err = "Introdu o parola.";
  } elseif(strlen(trim($_POST["password"])) <= 3){
    $password_err = "Parola trebuie sa aiba min 3 caractere.";
  } else{
    $password = trim($_POST["password"]);
  }
  if(empty(trim($_POST["confirm_pass"]))){
    $confirm_pass_err = "Confirma parola.";
  } else {
    $confirm_pass = trim($_POST["confirm_pass"]);
    if(empty($password_err) && ($password != $confirm_pass)){
      $confirm_pass_err = "Parolele nu se potrivesc.";
    }
  }
  if(empty($username_err) && empty($password_err) && empty($confirm_pass_err)){
    $sql = "INSERT INTO utilizatori (user, pass, created_at) VALUES (:username, :password, :created_at)";
    if($stmt = $conn->prepare($sql)){
      $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
      $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
      $stmt->bindParam(":created_at", $param_created_at);
      $param_username = $username;
      $param_password = password_hash($password, PASSWORD_DEFAULT);
      $param_created_at = strtotime(date('Y-m-d h:i:s'));
      if($stmt->execute()){
        header("location: logare_cont.php");
      } else {
        echo "Ceva a mers prost. Incearca mai tarziu.";
        die();
      }
    }
    unset($stmt);
  }
  unset($conn);
}
include('./layout/back-inreg.php');
?>
