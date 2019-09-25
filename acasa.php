<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: logare_cont.php");
  exit;
}
// die(var_dump($_SESSION['username']));
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ACASA</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
      body{ font: 14px sans-serif; }
      .wrapper{ width: 350px; text-align: center; }
      table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
      }
      td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }
      tr:nth-child(even) {
        background-color: #dddddd;
      }
    </style>
  </head>
  <body>
    <div class="page-header">
      <h3>Buna, <?php echo $_SESSION["username"]; ?>. Bine ai venit! Mai jos ai agenda ta telefonica.</h3>
    </div>
<table>
  <tr>
    <th>Nume</th>
    <th>Telefon</th>
  </tr>


  <?php
  $sql = "SELECT nume, telefon FROM contacte";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

  ?>
   <tr>
     <td><?php  echo $row['nume']; ?></td>
     <td><?php echo $row['telefon']; ?></td>
   </tr>

 <?php } ?>
 </table>
      <br></br>
    <p>
      <a href="resetare.php" class="btn btn-warning">Reseteaza-ti parola aici</a>
      <a href="deconectare.php" class="btn btn-danger">Iesi din cont</a>
      <a href="agenda.php" class="btn btn-warning">Mai adauga o persoana de contact</a>
    </p>
  </body>
</html>
