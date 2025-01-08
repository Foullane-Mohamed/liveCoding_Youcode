<?php
session_start();
include_once 'Auth.php';
$auth = new Auth();

if($auth->isAuth()){
  header('location:dashboard.php');
  exit;
}
if($_SERVER['REQUEST_METHOD']==='POST' ){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $auth->getNameUser($email);
  if($auth->login($email,$password)){
    
    header('location:dashboard.php');

    exit;
  }else{
    $auth->setMessage('login failed');
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  if($auth->hasMessage()){
    echo "<p>".$auth->getMessage()." </p>";
  }
  ?>
  <form action="index.php" method="POST">
    <label for="email">email</label>
    <input type="text" name="email">
    <br>
    <label for="password">password</label>
    <input type="text" name="password">
    <br>
    <input type="submit" value="login">
  </form>
</body>

</html>