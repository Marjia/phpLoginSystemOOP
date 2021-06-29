<?php

if (isset($_POST["submit"])) {

//echo "string";
  $name = $_POST["name"];
  $email = $_POST["email"];
  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];
  $pwdRepeat = $_POST["pwdrepeat"];
//echo $name." ".$email." ";
try {
  require_once "functions.inc.php";

} catch (Error $e) {
  echo "require function Inc Error!: " . $e->getMessage();
}

  //require_once "functions.inc.php";
//  require_once "dbh.inc.php";
echo " after require".$name." ".$email." ";
  try {
    include_once 'classes/usersView.class.php';

  } catch (Error $e) {
    echo "function Inc Error!: " . $e->getMessage();
  }

  //require_once "dbh.inc.php";

  if (emptyInputsSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
   header('location: /singup.php?error=emptyinput');
    exit();
  }

  if (invalidUid($username) !== false) {
    header('location: /singup.php?error=invaliduid');
    exit();
  }

  if (invalidEmail($email) !== false) {
   header('location: /singup.php?error=invalidemail');
    exit();
  }

  if (pwdMatch($pwd, $pwdRepeat) !== false) {
    header('location: /singup.php?error=passwordnotmatch');
    exit();
  }

  if (uidExists($username, $email) !== false) {
    header('location: /singup.php?error=sameinput');
    exit();
  }

    createUser($name, $email, $username, $pwd);



}
else {
 //echo "string";
  header("location: /signup.php");
  exit();
}
