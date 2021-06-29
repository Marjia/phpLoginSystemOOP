<?php
$serverName="127.0.0.1";
$dBUserName="admin";
$dBPassword="1";
$dBName="login";

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

if (!$conn) {
  die("Connection Failed: ".mysqli_connect_error());
}
else {
  echo "dbh inc php  connection stablished  ";
}
?>
