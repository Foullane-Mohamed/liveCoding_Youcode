<?php
session_start();
include_once 'Auth.php';
$auth= new Auth();

if(!$auth->isAuth()){
  header('location:index.php');
  exit;
}
if($_SERVER['REQUEST_METHOD']==='POST' && $_POST['logout']){
  $auth->logout();
  header('location:index.php');
  exit;
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
  <h1>welcome <?php 
  echo $_SESSION['name'];
  ?></h1>

  <form action="" method="POST">
    <input type="submit" name='logout' value="logout">
  </form>
</body>
</html>