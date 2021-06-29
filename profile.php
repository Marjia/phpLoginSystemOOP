<?php
  include_once 'header.php';
?>
<main>
  <!-- <div class="cards">
    <div class="card-single"> -->
      <div class="container">
        <h2>Profile</h2>
        <table>
          <tbody>
            <tr>
              <th>Name :</th>
              <td><?php echo $_SESSION["usersname"]; ?></td>
            </tr>
            <tr>
             <th>User Id :</th>
             <td><?php echo $_SESSION["usersuid"]; ?></td>
            </tr>
            <tr>
              <th>Email :</th>
              <td><?php echo $_SESSION["usersemail"]; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- <section class="search-wrapper">
        <h2>Log in</h2>
        <form  action='includes/login.inc.php' method="post">
          <input type="text" name="uid" placeholder="User Name/Email ..">
          <input type="password" name="pwd" placeholder="password ..">
         <button type="submit" name="submit">Log in</button>
        </form>
      </section> -->
    <!-- </div>
  </div> -->
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
