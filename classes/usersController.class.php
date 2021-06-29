<?php

try {
  include_once 'classAutoload.inc.php';

} catch (Error $e) {
  echo "user view Error!: " . $e->getMessage();
}


class UsersController extends Users{

 public function createUser($name, $email, $username, $pwd){

    $this->setUser($name, $email, $username, $pwd);
    
 }
}
?>
