<?php
  $login = false;
  $showError = false;
  if($_SERVER["REQUEST_METHOD"] == "POST"){
  include '_dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  
  $sql = "Select * from users where username = '$username' AND password= '$password'";
    $result  = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
      $login = true;
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $username;
      header("location: home.php");
    }
    else{
      $showError ="Invalid Credentials";
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
    <form action="/commentApp/index.php" method="post">
    <h1 class="h3 mb-3 fw-bold">Sign In</h1>
    <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    <div class="form-floating">
      <input type="email" class="form-control email-input" name="username" id="username" placeholder="email" required maxlength="50">
      <label for="username"  >Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="password" placeholder="Password" required maxlength="20">
      <label for="password">Password</label>
      <p class="fpass"><a href="forgot.php"> Forgot your password?</a></p>
    </div>
    <?php
    if($login){
    echo'
    <div class="alert alert-success" role="alert"> Success!! You are logged in.   </div>
    ';}
    if($showError){
      echo'
      <div class="alert alert-danger" role="alert">'.$showError.'  </div>
      ';}?>
    <button class="w-100 btn btn-lg btn-primary" type="submit" >Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; Comment App</p>
    </form>
    </main>    
  </body>
</html>
