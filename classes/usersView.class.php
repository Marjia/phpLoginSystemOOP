<?php
try {
  include_once 'classAutoload.inc.php';

} catch (Error $e) {
  echo "user view Error!: " . $e->getMessage();
}

//class start here
class UsersView extends Users{

//showUser function
 public function showUser($username, $email){
    $result = $this->getUser($username, $email);
    return $result;
 }

//checkPassword function
 public function checkPwd($username, $pwd){

   $uidExists = $this->showUser($username, $username);
   $pwdHashed = $uidExists[0]["usersPwd"];
   $checkPWD = password_verify($pwd, $pwdHashed);

     if($checkPWD === false) {
       $result = false;
       return $result;
     }
     elseif ($checkPWD === true) {
       $result = true;
       return $result;
     }
  }

//session start function

  public function userSessionStart($username){

    $uidExists = $this->showUser($username, $username);

    session_start();
    $_SESSION["usersId"] = $uidExists[0]["usersId"];
    $_SESSION["usersname"] = $uidExists[0]["usersName"];
    $_SESSION["usersuid"] = $uidExists[0]["usersUid"];
    $_SESSION["usersemail"] = $uidExists[0]["usersEmail"];
  }
}
