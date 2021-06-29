<?php
  include_once 'header.php';
?>
<main>
      <div class="container">
        <h2>Sign Up</h2>
        <form  action='includes/signup.inc.php' method="post">
          <input type="text" name="name" placeholder="full name">
          <input type="text" name="email" placeholder="email">
          <input type="text" name="uid" placeholder="user Name">
          <input type="password" name="pwd" placeholder="password">
          <input type="password" name="pwdrepeat" placeholder="repeat password">
          <button type="submit" class="button" name="submit">Sign Up</button>
          <!-- <a href="#" class="forgot">Forgot Password?</a> -->
        </form>
      </div>
<?php
 if (isset($_GET["error"])) {
   if ($_GET["error"] == "emptyinput") {
     echo "<p>Fill in all fields</p>";
   }
   elseif ($_GET["error"] == "invaliduid") {
      echo "<p>Please give valid user id</p>";
   }
   elseif ($_GET["error"] == "invalidemail") {
     echo "<p>Please give valid mail id</p>";
   }
   elseif ($_GET["error"] == "passwordnotmatch") {
      echo "<p>password does not matched</p>";
   }
   elseif ($_GET["error"] == "sameinput") {
     echo "<p>User already exist</p>";
   }
   elseif ($_GET["error"] == "stmtfailed") {
     echo "<p>Something went wrong!!</p>";
   }
   elseif ($_GET["error"] == "none") {
    echo "<p>You have signed In successfully !! </p>";
   }

 }
 ?>

</main>

<?php
  include_once 'footer.php';
?>
