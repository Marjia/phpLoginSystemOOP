<?php

if (isset($_POST["submit"])) {

  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];

  // including functions.inc.php file
  try {
    require_once "functions.inc.php";
  } catch (Error $e) {
    echo "login inc Error!: " . $e->getMessage();

  }
//echo "string";
  //giving error message if emptyInputLogin is true
  if (emptyInputsLogin($username, $pwd) !== false) {
   header('location: /login.php?error=emptyinput');
    exit();
  }

  // login method
  try {
    loginUser($username, $pwd);

  } catch (Error $e) {
    echo "login directory function Error!: " . $e->getMessage();

  }
}
else {
  header('location: /login.php');
  exit();
}
