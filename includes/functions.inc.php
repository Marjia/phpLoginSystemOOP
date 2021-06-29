<?php
try {

  include '../classes/usersView.class.php';
  include '../classes/usersController.class.php';
}
catch (Error $e) {
  echo "function connecting Error!: " . $e->getMessage();
}

function emptyInputsSignup($name, $email, $username, $pwd, $pwdRepeat){
  $result;
  if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
    $reult = true;
  }
  else {
    $result = false;
  }

  return $result;
}

function invalidUid($username){
  $result;
  if (!preg_match("/^[a-zA-z0-9]*$/", $username)) {
    $reult = true;
  }
  else {
    $result = false;
  }

  return $result;
}
function invalidEmail($email){
  $result;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $reult = true;
  }
  else {
    $result = false;
  }

  return $result;
}
function pwdMatch($pwd, $pwdRepeat){
  $result;
  if ($pwd !== $pwdRepeat) {
    $reult = true;
  }
  else {
    $result = false;
  }

  return $result;
}

function uidExists($username, $email){
   try {
     $obj = new UsersView();
     //$row = $obj->showUser();
     if($row = $obj->showUser($username, $email)){
       return $row;
     }
     else {
       $result = false;
       return $result;
     }

   } catch (Error $e) {
     echo " uidExists Inc Error!: " . $e->getMessage();
   }
}


function createUser($name, $email, $username, $pwd){
  try {
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $creatObj = new UsersController($name, $email, $username, $pwd);
    $creatObj->createUser($name, $email, $username, $hashedPwd);

  } catch (Error $e) {
    echo "Exists Inc Error!: " . $e->getMessage();

  }

 header('location: /login.php?error=none');
 exit();

}

//log in functions

function emptyInputsLogin($username, $pwd){
  $result;
  if (empty($username) || empty($pwd)) {
    $reult = true;
  }
  else {
    $result = false;
  }

  return $result;
}

function loginUser($username, $pwd){
  $uidExists = uidExists($username, $username);

  if ($uidExists === false) {
    header('location: /login.php?error=wronglogin');
    exit();
  }
  try {
    $objCheck = new UsersView();
    $result=$objCheck->checkPwd($username, $pwd);

  } catch (Error $e) {
    echo " login Error!: " . $e->getMessage();

  }

  if($result === false) {
    echo "password wrong";
    exit();
  }
  elseif ($result === true) {
    $objCheck->userSessionStart($username);
    header('location: /index.php');
    exit();
  }
}
