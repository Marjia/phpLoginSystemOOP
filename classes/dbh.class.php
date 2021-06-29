<?php

class Dbh{
private $host="127.0.0.1";
private $user="admin";
private $pwd="1";
private $dBName="login";

// protected function connect_mysqli_method(){
//   $conn = mysqli_connect($this->serverName, $this->dBUserName, $this->dBPassword, $this->dBName);
// //echo $conn;
//   if (!$conn) {
//     die("Connection Failed: ".mysqli_connect_error());
//     //$s= "connection failed";
//     //return 0;
//   }
//   else {
//     //$s= "connected successfully";
//     return $conn;
//   }
//
// }

protected function connect(){
 $dsn = 'mysql:hosts=' . $this->host . ';dbname=' . $this->dBName;
 $pdo = new PDO($dsn, $this->user, $this->pwd);
 $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
 return $pdo;
}


}

// class User extends Dbh {
//   public function dbh(){
//
//   }
// }
