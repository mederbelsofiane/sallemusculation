<?php include "php/classes/sadmin.class.php" ?>
<?php require('php/init.php') ?>
<?php
$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if(is_blank($username)) {
    $errors[] = "Username ne peut pas étre vide.";
  }

  // if there were no errors, try to login

    $sadmin = SAdmin::find_by_username($username);
    // test if admin found and password is correct
    if($sadmin != false && $sadmin->verify_password($password)) {
      // Mark admin as logged in
      $session_SAdmin->login($sadmin);
      redirect_to('index.php');
    } else {
      // username not found or password does not match
      $errors[] = "La Connexion à échouer.";
    }



}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="ressources/css/loginstyle.css">
  <title>LoginS</title>
</head>
<body id="secretaire-background">

  <div class="container">
      <div class="row justify-content-md-center">

        <div class=" col-md-4 col-md-offset-4 col-xs-12 ">
          <?php echo display_errors($errors); ?>

        <div id="form-background">

        <form action="loginsa.php" class="login-form" method="post">
          <div class="form">
            <legend><h2 class="text-center">Se connecter</h2></legend>
            <hr>
            <div class="form-group">
              <label for="" class="font-weight-bold">Username :</label>
              <input type="text" class="form-control" name="username" aria-describedby="" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="" class="font-weight-bold">Password :</label>
              <input type="password"  name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class=" form-control btn btn-success">Se connecter</button>
          </div>
       </form>
     </div>
       </div>
     </div>
   </div>
</body>
</html>
