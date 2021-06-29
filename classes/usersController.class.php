<?php

try {
  include_once 'users.class.php';

} catch (Error $e) {
  echo "user view Error!: " . $e->getMessage();
}


class UsersController extends Users{

 public function createUser($name, $email, $username, $pwd){

    $this->setUser($name, $email, $username, $pwd);
    //print_r($result);
    //echo "Full name: ". $result[0]['usersName'];
   // $result = $this->getUser($username, $email);
   //
    //return $result;
 }
}
?>
