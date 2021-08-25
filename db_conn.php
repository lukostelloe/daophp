<?php

$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "carproject";

$conn = mysqli_connect($sname, $uname, $password, $db_name);


//get the post records

$registration = $_POST["registration"];
$colour = $_POST["colour"];
$make = $_POST["make"];
$model = $_POST["model"];

// database insert SQL code

$sql = "INSERT INTO `cartable` (`registration`, `colour`, `make`, `model`) VALUES ('$registration', '$colour', '$make', '$model')";

// insert in database 
$rs = mysqli_query($conn, $sql);

if (empty($registration)) {
  header("Location: index.php?error=registration required");
    exit();
}else if(empty($colour)){
      header("Location: index.php?error=colour is required");
    exit();
} else if(empty($make)){
  header("Location: index.php?error=colour is required");
exit();
} else if(empty($model)){
  header("Location: index.php?error=colour is required");
exit();
}

if($rs)
{
  header("Location: index.php?success=Your details have been stored successfully");
}
