<?php 
   session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP-MYSQL Authentication System</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,500&display=swap" rel="stylesheet">
    <link href="https://bootswatch.com/5/quartz/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
  <div class="container">
    <a class="navbar-brand text-white" href="#">auth-system</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white fs-5 active" aria-current="page" href="#">Home</a>
        </li>

        <?php if(!isset($_SESSION['name'])) : ?>
          <li class="nav-item">
            <a class="nav-link text-white fs-5 px-2 active" aria-current="page" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5 text-white px-2 active" aria-current="page" href="signup.php">Signup</a>
          </li>
        <?php else :  ?>
          <li class="nav-item dropdown">
            <a class="nav-link text-white fs-5 px-2 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $_SESSION['name'] ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
            </ul>
          </li>

        <?php endif;  ?>
      </ul>
      <!-- <form class="d-flex" role="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>