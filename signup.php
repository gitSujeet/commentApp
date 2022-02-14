<?php
  $showAlert = false;
  $showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include '_dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  $secret = $_POST["secret"];
  //$exist = false;
  $existSql = "SELECT * FROM `users` WHERE username = '$username';";
  $result = mysqli_query($conn, $existSql);
  $numExistRows = mysqli_num_rows($result);
  if($numExistRows > 0){

    $showError = "Username Already Exists";
  }
  else{

  if(($password == $secret)){
    $showError ="Password and Secrets codes should not be same.";
    }
    else{
      $sql = "INSERT INTO `users` ( `username`, `password`, `secret`,`dt`) VALUES 
    (LOWER('$username'), '$password', '$secret', current_timestamp())";
    $result  = mysqli_query($conn, $sql);
    if ($result){
      $showAlert = true;
    }
  }
    }
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
  
  </head>
  <body class="text-center body-properties">
    
    <main class="form-signin">
    <form action="signup.php" method="POST">
    <h1 class="h3 mb-3 fw-bold">Sign Up</h1>
    <p>Already have an account? <a href="index.php">Sign In</a></p>
    <div class="form-floating">
      <input type="email" class="form-control email-input" name="username" id="username" placeholder="email" required maxlength="50" >
      <label for="username">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control pass-radius" name="password" id="password" placeholder="Password" required maxlength="20">
      <label for="password">Password</label>
    </div>
    <div class="form-floating secretarea">
      <input type="password" class="form-control" id="secret" name="secret"  placeholder="Password" required maxlength="20">
      <label for="secret">Secret</label>
    </div>

    <?php
    if($showAlert){
    echo'
    <div class="alert alert-warning" role="alert"> Success!! <a href="index.php" class="alert-link">Your account is created. Click here to sign in now.</a>
    </div>
    ';}
    if($showError){
      echo'
      <div class="alert alert-warning" role="alert"> '.$showError.'</div>
      ';}?>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
    <p class="signup-p">By clicking the "Sign Up" button, you are creating an account, and you agree to the terms of Use.</p>
    <p class="mt-5 mb-3 text-muted">&copy; Comment App</p>
    </form>
    </main>    
  </body>
</html>
