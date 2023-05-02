<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    <link href="https://bootswatch.com/5/quartz/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,500&display=swap" rel="stylesheet">
    
  </head>
  <body style="font-family: 'Roboto', sans-serif;">
    <?php require("includes/header.php") ?>

    <?php require("config.php") ?>

    <?php

    if(isset($_SESSION['name'])) {
      header("Location: index.php");
    }

    if(isset($_POST["submit"])){

        //validating the input

        if($_POST['name'] == "" || $_POST['email'] == "" || $_POST['password'] == "") {
            echo "<br /> ", "Please fill complete the form before submission";
        }

        // getting the various inputs
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // insert the data into the database
        $sql = $conn->prepare("INSERT INTO users (name, email, password) VALUES(:name, :email, :password);");
        //select your database before query
        $conn->query('USE sms');

        $sql->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }
?>

    <div class="container m-auto">
      <form method="POST" action="signup.php" class="container mt-4 p-4" style=" box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
          <h4 class="text-center">Please Register</h4>
        <div class="mb-2">
              <label for="name" class="form-label">Username</label>
              <input type="text" name="name" class="form-control">
          </div>
          <div class="mb-2">
              <label for="exampleInputEmail1" class="form-label">Email Address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp">
          </div>
          <div class="mb-2">
              <label class="password" for="examplePassword1">Password</label>
              <input type="password" name="password" class="form-control">
          </div>
          <div>
            <button type="submit" name="submit" class="btn btn-primary form-control">Signup</button>
          </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  </body>
</html>