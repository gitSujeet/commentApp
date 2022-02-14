<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include '_dbconnect.php';
  $username = $_POST["username"];
  $secret = $_POST["secret"];
  $sql = "SELECT password FROM `users` WHERE username = '$username' AND secret='$secret'";
  $result = mysqli_query($conn, $sql);
  $pass = mysqli_fetch_all($result,);
  echo $pass;
  
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forget Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
  
  </head>
  <body class="text-center body-properties">
    <main class="form-signin ">
    <form>
    <h1 class="h3 mb-3 fw-bold">Forget Password</h1>
    <div class="form-floating">
      <input type="email" class="form-control email-input" name="username" id="username" placeholder="email">
      <label for="username">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="secret" id="secret"  class="form-control"  placeholder="Secret" required>
      <label for="secret" >Secret</label>
      <p class="fpass"><a href="signup.php"> New user?</a></p>
    </div>
    <?php
      echo $pass;
    ?>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; Comment App</p>
    </form>
    </main>    
  </body>
</html>
