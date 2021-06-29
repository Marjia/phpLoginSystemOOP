<?php

if (isset($_POST["submit"])) {
  //echo "string";

  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];

try {
  require_once "functions.inc.php";
} catch (Error $e) {
  echo "login inc Error!: " . $e->getMessage();

}

  if (emptyInputsLogin($username, $pwd) !== false) {
   header('location: /login.php?error=emptyinput');
    exit();
  }

    loginUser($username, $pwd);



}
else {
  header('location: /login.php');
  exit();
}
