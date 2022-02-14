<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: index.php");
    exit;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
include '_dbconnect.php';
$username = $_POST["username"];
$username =  $_SESSION['username'];
$comment = $_POST["comment"];

$sql = "INSERT INTO commment (`username`, `comment`, `date`)
VALUES ( '$username','$comment'current_timestamp())";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
    <title>Home Page <?php echo $_SESSION['username']?></title>
</head>
<body>
<div class= "container my-4">
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Welcome! <?php echo $_SESSION['username']?></h4>
  <p>Hurray!! You have successfully signed In.</p>
  <p class="mb-0">Welcome to the home page, Talk or share your views, thoughts by posting them in the form of comments with the other users available from world wide.</p>
  <hr>
  <p class="mb-0">Whenever you want to move out, be sure to logout by <a href="logout.php">clicking here.</a></p>

</div>
</div>
     <div>
        <form action="home.php" method="post">
         <h1 class="post-head">Post Here,</h1>
         <div class="post-area">
         <textarea name="comment" id="comment" cols="150" rows="5" placeholder="Start typing here..." required maxlength="500"></textarea>
         <p class="post-btn"><button type="submit"  class="btn btn-primary">Post</button>
            <button type="reset" class="btn btn-danger">Reset</button></p>
            <hr>
         </div>
         <div class="comments">
             <h3 class="comment-head">Comment Area</h3>
        </div>
        </form>
        <div class="btn-group comment-p ">
                <a href="#" class="btn btn-primary active" aria-current="page">All user's Comment</a>
                <a href="#" class="btn btn-primary">Active user's Comment</a>
        </div>
         <div class="allcomment">
            
         </div>
     </div>
        <div class="footer">
        <p>&copy; Comment App.</p>
        </div>
</body>
</html>