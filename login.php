<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,500&display=swap" rel="stylesheet">
   
    </style>
  </head>
  <body style="font-family: 'Roboto', sans-serif;">
    <?php require("includes/header.php") ?>

    <?php require("config.php") ?>

    <?php 
     if(isset($_SESSION['name'])){
        header("Location: index.php");
     }

     if(isset($_POST["submit"])){
      
        if($_POST["email"] == "" || $_POST["password"] == "") {
          echo "Some inputs are empty please fill in before you can proceed";
        } else {
          $email = $_POST["email"];
          $password = $_POST["password"];

          $conn->query("USE sms");
          $login = $conn->query("SELECT * FROM users WHERE email = '$email'");
          $login->execute();

          $data = $login->fetch(PDO::FETCH_ASSOC);

          if($login->rowCount() > 0) {

            if(password_verify($password, $data['password'])) {
                $_SESSION['name'] = $data['name'];
                $_SESSION['email'] = $data['email'];

                header("Location: index.php");
            } else {
              echo "fail to log in";
            }
          }
        } 
     } 


    ?>

    <div class="container m-auto">
      <form method="POST" action="login.php" class="container mt-5 p-4" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
          <h5 class="text-center">Please Sign in</h5>
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email Address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp">
          </div>
          <div class="mb-3">            
              <label class="password" for="examplePassword1">Password</label>
              <input type="password" name="password" class="exampleInputPassword1 form-control" id="examplePassword1">
          </div>
          <div>
            <button type="submit" name="submit" class="btn btn-primary form-control">Login</button>
          </div>
          <div class="mt-2">
            <span>Don't have an account?</span>
            <a href="signup.php">Creeate Your Account</a>
          </div>
      </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  </body>
</html>