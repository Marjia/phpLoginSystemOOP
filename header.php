<?php
 session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log In Project</title>
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>
    <header>
      <nav>

            <?php
               if (isset($_SESSION["usersuid"])) {


                 echo " <a href='includes/logout.inc.php'>LogOut</a> ";
                 echo " <a href='profile.php'>Profile</a> ";
               }
               else {

                 echo " <a href='login.php'>LogIn</a> ";
                 echo " <a href='singup.php'>SignUP</a> ";
               }
             ?>
             <a href='index.php'>Home</a>
       </nav>

    </header>
   <div class="main-content">
