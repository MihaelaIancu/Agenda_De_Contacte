<?php
session_start();
require_once "config.php";
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: logare_cont.php");
  exit;
}
$nume = $telefon = "";
$nume_err = $tel_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(empty(trim($_POST["nume"]))){
    $nume_err = "Introdu un nume de contact.";
  } else {
    $sql = "SELECT id_contact FROM contacte WHERE nume = :nume";
    $stmt = $conn->prepare($sql);
    $param_nume = trim($_POST["nume"]);
    $stmt->bindParam(":nume", $param_nume);
    if($stmt->execute()){
      if($stmt->rowCount() == 1){
        $nume_err = "Numele de contact e deja folosit.";
      } else {
        $nume = trim($_POST["nume"]);
      }
    } else {
      echo "Ceva a mers prost. Incearca mai tarziu.";
      die();
    }
    unset($stmt);
  }
  if(empty(trim($_POST["telefon"]))){
    $tel_err = "Introdu un numar de contact.";
  } elseif(strlen(trim($_POST["telefon"])) <= 9){
    $tel_err = "Un numar de telefon valid trebuie sa aiba min 9 caractere.";
  } else{
    $telefon = trim($_POST["telefon"]);
  }
  if(empty($nume_err) && empty($tel_err)){
    $sql = "INSERT INTO contacte (id_user, nume, telefon) VALUES (:id_user, :nume, :telefon)";
    if($stmt = $conn->prepare($sql)){
      $stmt->bindParam(":nume", $param_nume, PDO::PARAM_STR);
      $stmt->bindParam(":telefon", $param_tel, PDO::PARAM_STR);
      $stmt->bindParam(":id_user", $param_id_user, PDO::PARAM_INT);
      $param_nume = $nume;
      $param_tel = $telefon;
      $param_id_user = $_SESSION["id_user"];

      if($stmt->execute()){
        $_SESSION["loggedin"] = true;
        $_SESSION["id_user"] = $_POST["id_user"];
        $_SESSION["nume"] =$_POST["nume"];
        $_SESSION["telefon"] = $_POST["telefon"];
        header("location: acasa.php");
      } else {
        echo "Ceva a mers prost. Incearca mai tarziu.";
        die();
      }
    }
    unset($stmt);
  }
  unset($conn);
}
include('./layout/back-agenda.php');
?>
