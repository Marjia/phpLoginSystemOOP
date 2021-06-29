<?php
  include_once 'header.php';
?>
<main>
      <div class="container">
        <h2>Login to your Account</h2>
        <form class="" action='includes/login.inc.php' method="post">
          <input type="text" name="uid" placeholder="User Name/Email">
          <input type="password" name="pwd" placeholder="password">
          <button type="submit" class="button" name="submit">Login</button>

        </form>
      </div>
  <?php
   if (isset($_GET["error"])) {
     if ($_GET["error"] == "emptyinput") {
       echo "<p>Fill in all fields</p>";
     }
     elseif ($_GET["error"] == "wronglogin") {
        echo "<p>Wrong log in information</p>";
     }

   }
   ?>
</main>

<?php
  include_once 'footer.php';
?>
