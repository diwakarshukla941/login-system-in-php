<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $numExistRows;
    // $exists=false;

    // Check whether this username exists
    $existSql = "SELECT * FROM `info_user` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    if ($result) {
        $numExistRows = mysqli_num_rows($result);
        if($numExistRows > 0){
          // $exists = true;
          $showError = "Username Already Exists";
      }
      else{
          // $exists = false; 
          if(($password == $cpassword)){
              $hash = password_hash($password, PASSWORD_DEFAULT);
              $sql = "INSERT INTO `info_user` ( `username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp())";
              $result = mysqli_query($conn, $sql);
              if ($result){
                  $showAlert = true;
              }
          }
          else{
              $showError = "Passwords do not match";
          }
      }
    }
    else {
        // Handle error, such as:
        $showError = "Error executing query: " . mysqli_error($conn);
    }
    
    
}
    
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your Account Created.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Sorry!</strong> Already Exists.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
    }
    ?>

    <div class="container my-4">
     <h1 class="text-center">Signup to our website</h1>
     <form action="../login_system/signup.php" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" maxlength="11" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" maxlength="23" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword">
            <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
        </div>
         
        <button type="submit" class="btn btn-primary">SignUp</button>
     </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>