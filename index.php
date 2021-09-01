<!-- TODO

add information from database into table,
get bin button to work,
get input status of database to turn green on success -->
<!DOCTYPE html>
<html lang="en">
<head>
<<<<<<< Updated upstream
  <title>Car Table</title>
  <link rel="stylesheet" href="style.css">
  <script src="modal.js" defer></script>
  <script src="app.js" defer></script>
=======
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>
  <link rel="stylesheet" href="style.css">
>>>>>>> Stashed changes
</head>
<body>
<<<<<<< Updated upstream
<h1 id="title">~ Car Record Input ~</h1>
<div id="interface">
  
    <div id="input">
      <!-- method and action to conn.php -->
      <h2>Register Car</h2>
      <form name="formCar" method="post" action="" id="formulaire">

        <label for="name">Registration</label>
        <input type="text" name="registration" id="registration" class="inputbox">

        <label for="name">Colour</label>
        <input type="text" name="colour" id="colour" class="inputbox">

        <label for="name">Make</label>
        <input type="text" name="make" id="make" class="inputbox">

        <label for="name">Model</label>
        <input type="text" name="model" id="model" class="inputbox">
        <button class="inputbox" id="addcarbutton" type="submit">Add Car</button>
      </form>

      <div id="confirmation">Status of input</div>
    </div>

    <table id="cartable">
      <tr>
        <!-- <th>ID</th> -->
        <th>Regist</th>
        <th>Colour</th>
        <th>Make</th>
        <th>Model</th>
        <th>Changes</th>
        <th>Delete</th>
      </tr>
    </table>
  </div>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Are you sure you want to delete this car?</p>
    <button id="yes">Yes</button>
    <button id="cancel">Cancel</button>
  </div>

</div>

</div>

=======
  <h1>Welcome to the site!</h1>
  <form action="login.php" method="post">
    <h2>LOGIN</h2>
    <?php if (isset($_GET["error"])) { ?>
      <p class="error"><?php echo $_GET["error"]; ?></p>
    <?php } ?>
    <label>User Name</label>
    <input type="text" name="uname" placeholder="User Name"><br>

    <label>Password</label>
    <input type="password" name="password" placeholder="Password"><br>

    <button type="submit">Login</button>
    <a href="signup.php" class="ca">Don't have an account? Sign up</a>
  </form>
  
>>>>>>> Stashed changes
</body>
</html>