<?php
class Auth
{
 public function getNameUser($name){
  $_SESSION['name']= $name;
 }

  public function login($email, $password)
  {
    if ($email === 'admin' && $password === 'admin') {
      $_SESSION['auth'] = true;
      return true;
    }
    return false;
  }

  public function isAuth()
  {
    return isset($_SESSION['auth']) && $_SESSION['auth'] = true;
  }

  public function setMessage($message)
  {
    $_SESSION['message'] = $message;
  }
  public function getMessage()
  {
    return  $_SESSION['message'];
  }
  public function hasMessage()
  {
    return isset($_SESSION['message']);
  }
  public function logout()
  {
    session_unset();
    session_destroy();
  }
}
