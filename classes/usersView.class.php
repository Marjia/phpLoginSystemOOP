<?php

try {
  include_once 'users.class.php';

} catch (Error $e) {
  echo "user view Error!: " . $e->getMessage();
}


class UsersView extends Users{

 public function showUser($username, $email){

    $result = $this->getUser($username, $email);
    //print_r($result);
    //echo "Full name: ". $result[0]['usersName'];
   // $result = $this->getUser($username, $email);
   //
    return $result;
 }

 // public function checkPwd($username, $pwd){
 //   $uidExists = $this->showUser($username, $username);
 //   //print_r($uidExists);
 //   $pwdHashed = $uidExists[0]["usersPwd"];
 //   //echo $uidExists[0]["usersPwd"];
 //   $checkPWD = password_verify($pwd, $pwdHashed);
 //
 //   if($checkPWD === false) {
 //     echo "password wrong";
 //     //header('location: /login.php?error=wronglogin');
 //     exit();
 //   }
 //   elseif ($checkPWD === true) {
 //     session_start();
 //     $_SESSION["usersId"] = $uidExists[0]["usersId"];
 //     $_SESSION["usersname"] = $uidExists[0]["usersName"];
 //     $_SESSION["usersuid"] = $uidExists[0]["usersUid"];
 //     $_SESSION["usersemail"] = $uidExists[0]["usersEmail"];
 // }
}
