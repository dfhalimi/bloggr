<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="shortcut icon" href="images/Bloggr.ico">
    <link rel="apple-touch-icon" href="images/Bloggr.ico">
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.12.1/css/all.css"
      crossorigin="anonymous"
    />
    <title>Bloggr</title>
  </head>
  <body>
    <header>
      <a href="index.php"><h1 class="logo">Bloggr</h1></a>
      <form action="search.php" method="POST">
        <input type="text" class="search" name="search" placeholder="Search..." />
        <button type="submit" name="submit-search">Search</button>
      </form>
      <nav>
        <i class="fas fa-bars" id="menuOpen"></i>
        <ul id="menu">
          <li id="menuClose">X</li>
          <?php
            if (isset($_SESSION['uid'])) {
              echo "<li><a href='profile.php?user=".$_SESSION['uid']."'>PROFILE</a></li>";
              echo "<li><a href='create.php'>NEW POST</a></li>";
              echo "<li><a href='includes/logout.inc.php'>LOG OUT</a></li>";
            }
            else {
              echo "<li><a href='signup.php' class='btn'>SIGN UP</a></li>";
              echo "<li><a href='login.php'>LOG IN</a></li>";
            }
          ?>
        </ul>
      </nav>
    </header>
    <main>