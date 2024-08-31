<?php 
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
  $loggedin = true;
}else{
  $loggedin = false;  
}
echo '<nav class="navbar  navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand"  href="../../php/login_system">My Login System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../../php/login_system/welcome.php">Home</a>
        </li>';
        if(!$loggedin){
          echo '<li class="nav-item">
            <a class="nav-link"  href="../../php/login_system/login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="../../php/login_system/signup.php">SignUp</a>
          </li>';
        }

        if($loggedin){
        echo '<li class="nav-item">
          <a class="nav-link"  href="../../php/login_system/logout.php">LogOut</a>
        </li>';
        }
      echo '</ul>
    </div>
  </div>
</nav>';

?>