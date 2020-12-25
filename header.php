<?php

session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <title>Online Test Portal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:gray">
  <a class="navbar-brand" href="index.php">Online <span style="color:blue">Test Portal</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <?php if(isset($_SESSION['userdata'])) {?>
   
   <a class="nav-link" style="color:white;margin-left:350px"><b>Hello <?php echo $_SESSION['userdata']['username']?></b></a>

<?php }?>
    <ul class="navbar-nav ml-auto">
     
      
     
      <?php if(!isset($_SESSION['userdata'])) {?>

        <li class="nav-item ">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="Login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="registration.php">Registration</a>
      </li>
      <?php
      } else { ?>

      <li class="nav-item">
        <a class="nav-link" href="homeuser.php">Home</a>
      </li>

<li class="nav-item">
        <a class="nav-link" href="viewprevious.php">View Previous Test</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="Logout.php">Logout</a>
      </li>

     

      <?php }
      ?>
      
     
      
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>
</head>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    


