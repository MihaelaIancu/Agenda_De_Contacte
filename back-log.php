<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LOGARE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
      body{ font: 14px sans-serif; }
      .wrapper{ width: 350px; padding: 20px; }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <h2>LOGARE</h2>
      <p>Completeaza-ti datele pentru a te putea loga.</p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
          <label>Username</label>
          <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
          <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
          <label>Parola</label>
          <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
          <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Login">
        </div>
        <p>Nu ai cont? <a href="inregistrare_cont.php">Creeaza-l aici</a></p>
        <?php if($ok){ ?>
          <p>Upsie, ai uitat parola? <a href="resetare.php">Reseteaz-o aici</a></p>
       <?php } ?>
      </form>
    </div>
  </body>
</html>
