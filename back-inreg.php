<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>INREGISTRARE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
      body{ font: 14px sans-serif; }
      .wrapper{ width: 350px; padding: 20px; }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <h2>INREGISTRARE</h2>
      <p>Completeaza campurile libere pentru a crea un cont.</p>
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
        <div class="form-group <?php echo (!empty($confirm_pass_err)) ? 'has-error' : ''; ?>">
          <label>Confirma Parola</label>
          <input type="password" name="confirm_pass" class="form-control" value="<?php echo $confirm_pass; ?>">
          <span class="help-block"><?php echo $confirm_pass_err; ?></span>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Submit">
          <input type="reset" class="btn btn-primary" value="Reset">
        </div>
        <p> Ai deja un cont? <a href="logare_cont.php">Logheaza-te aici</a></p>
      </form>
    </div>
  </body>
</html>
