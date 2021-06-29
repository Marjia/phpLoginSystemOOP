<?php
//echo "user class";
try {
  include_once 'dbh.class.php';

} catch (Error $e) {
  echo "user  Error!: " . $e->getMessage();
}


class Users extends Dbh {

  protected function getUser($username, $email){
    $sql = "SELECT * FROM users WHERE usersUid=? OR usersEmail=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$username,$email]);

    $result = $stmt->fetchAll();
    return $result;
  }

  protected function setUser($name, $email, $username, $pwd){
    $sql = "INSERT INTO users (usersName, usersEmail,  usersUid,  usersPwd) VALUES (?, ?, ?, ?)";

    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$name, $email, $username, $pwd]);

  }
}
