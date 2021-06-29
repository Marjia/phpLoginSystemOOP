<?php
try {

  include '../classes/usersView.class.php';
  include '../classes/usersController.class.php';
}
catch (Error $e) {
  echo "function error Error!: " . $e->getMessage();
}

//  include_once 'classes/usersView.class.php';


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
 //  $sql = "SELECT * FROM users WHERE usersUid=? OR usersEmail=?";
 //
 // $stmt = mysqli_stmt_init($conn);
 // if (!mysqli_stmt_prepare($stmt, $sql)) {
 //   header('location: /singup.php?error=stmtfailed');
 //   exit();
 // }
 //
 // mysqli_stmt_bind_param($stmt, "ss", $username, $email);
 // mysqli_stmt_execute($stmt);
 //$resultData = mysqli_stmt_get_result($stmt);
//   echo "        inside function";

   try {
     $obj = new UsersView();
     $row = $obj->showUser($username, $email);
     if($row = $obj->showUser($username, $email)){
       return $row;
     }
     else {
       $result = false;
       return $result;
     }

   } catch (Error $e) {
     echo "uidExists Inc Error!: " . $e->getMessage();
   }
 // print_r($usersObj);
 // $row = $usersObj->showUser($username, $email);
 //
 // echo $usersObj;
 //
 // if ($row = $usersObj->showUser($username, $email)) {
 //
 //  return $row;
 //
 // }
 // else {
 //   $result = false;
 //   return $result;
 // }
 //
 // mysqli_stmt_close($stmt);
}


function createUser($name, $email, $username, $pwd){
echo "create";
try {
  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
  $creatObj = new UsersController($name, $email, $username, $pwd);
  $creatObj->createUser($name, $email, $username, $hashedPwd);

} catch (Error $e) {
  echo "Exists Inc Error!: " . $e->getMessage();

}


//  $sql = "INSERT INTO users (usersName, usersEmail,  usersUid,  usersPwd) VALUES (?, ?, ?, ?)";
//
//  $stmt = mysqli_stmt_init($conn);
//
//
//  if (!mysqli_stmt_prepare($stmt, $sql)) {
//
//    header('location: /singup.php?error=stmtfailed');
//    exit();
//  }
//  else {
//
//  }
//
// $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
//
//
//  mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
//
//  mysqli_stmt_execute($stmt);
//
//  mysqli_stmt_close($stmt);

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

  //print_r($uidExists);

//   if ($uidExists === false) {
//     //echo " uid exists false";
//     header('location: /login.php?error=wronglogin');
//     exit();
//   }
// try {
//   $objCheck = new UsersView();
//   $objCheck->checkPwd($username, $pwd);
//
// } catch (Error $e) {
//   echo "login Error!: " . $e->getMessage();
//
// }

  $pwdHashed = $uidExists[0]["usersPwd"];
  //echo $uidExists[0]["usersPwd"];
  $checkPWD = password_verify($pwd, $pwdHashed);

  if($checkPWD === false) {
    echo "password wrong";
    //header('location: /login.php?error=wronglogin');
    exit();
  }
  elseif ($checkPWD === true) {
    session_start();
    $_SESSION["usersId"] = $uidExists[0]["usersId"];
    $_SESSION["usersname"] = $uidExists[0]["usersName"];
    $_SESSION["usersuid"] = $uidExists[0]["usersUid"];
    $_SESSION["usersemail"] = $uidExists[0]["usersEmail"];

  // echo $_SESSION["usersname"]." ".$_SESSION["usersuid"]." ".$_SESSION["usersemail"];

    header('location: /index.php');
    exit();

  }
}
