<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>AGENDA</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
      body{ font: 14px sans-serif; }
      .wrapper{ width: 350px; padding: 20px; }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <h2>AGENDA</h2>
      <p>Completeaza campurile libere pentru a crea un contact telefonic.</p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group <?php echo (!empty($nume_err)) ? 'has-error' : ''; ?>">
          <label>Nume de contact</label>
          <input type="text" name="nume" class="form-control" value="<?php echo $nume; ?>">
          <span class="help-block"><?php echo $nume_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($tel_err)) ? 'has-error' : ''; ?>">
          <label>Telefon</label>
          <input type="text" name="telefon" class="form-control" value="<?php echo $telefon; ?>">
          <span class="help-block"><?php echo $tel_err; ?></span>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Submit">
          <input type="reset" class="btn btn-primary" value="Reset">
        </div>
        <p>Hai sa vedem daca a functionat! <a href="acasa.php">Verifica-ti agenda telefonica aici </a></p>
      </form>
    </div>
  </body>
</html>
