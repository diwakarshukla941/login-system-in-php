<?php
    
    $login = false;
    include "partials/_dbconnect.php";
    $showError  = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $username = $_POST['username'];
      $password = $_POST['password'];
      
        $sql = "SELECT * FROM info_user WHERE username='$username' AND password='$password' ";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num == 1){
          $login =  true;
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['username'] = $username;
          header('LOCATION:welcome.php')  ; 
        }
        else{
          $showError = "Invalid creadentials";
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php require 'partials/_nav.php';
      if($login){  ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> You are Logged In.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php  }
    ?>
    <?php 
      if($showError){  ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>ohhh!</strong> <?php echo $showError; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php  }
    ?>
    <h1 class="text-center my-4">Login to our website</h1>
    <div class="container my-4" style="display:flex;align-items:center;justify-content:center;">
        <form action="../login_system/login.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 ">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>