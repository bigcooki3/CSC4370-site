<?php
  session_start();

  // MySQL Connection String
  // Change username, password, and database to your CampusID when using Codd
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "master";

  $conn = new mysqli($servername, $username, $password, $database);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Project 3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="shortcut icon" type="image/png" href="https://cdn.glitch.com/ce8f74c5-76ce-4083-9d87-cf4feb04ce21%2Fcute-skull.png?1543855741719" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
    <?php include_once 'navbar.php'?>
    <?php include_once 'router.php'?>
  </body>
</html>
