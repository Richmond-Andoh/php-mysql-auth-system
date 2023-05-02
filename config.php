<?php 

// credentials for successful connectiion

$host = "localhost";
$db_name = "sms";
$user = "root";
$password = "";


// using try and catch method to connect
try{
    $conn = new PDO("mysql:host=$host;db_name=$db_name;", $user, $password);
    // $conn->exec('USE $auth-system');

    // set PDO error mode to exception
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //echo "Connection successfull";
} catch(PDOException $e){
    echo "connection failed: " . $e->getMessage();
}

//using normal if else condition to catch connection error

// $conn = new PDO("mysql:host=$host; db_name = $db_name;", $user, $password);

// if($conn == true) {
//     echo "Your connection is working perfect";
// } else{
//     echo "connection failed";
// }






?>
