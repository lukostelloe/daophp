<!-- TODO

add information from database into table,
get bin button to work,
get input status of database to turn green on success -->
<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Car Table</title>
  <link rel="stylesheet" href="style.css">
  <script src="app.js" defer></script>
</head>

<body>
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

</body>

</html>