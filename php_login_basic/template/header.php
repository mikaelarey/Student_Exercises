<?php require_once('functions.php'); ?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Simple Login System</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <div class="container">

    <a class="navbar-brand" href="#">Simple Login System</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <?php if (is_user_logged_in()): ?>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
          </li>
        </ul>
      <?php endif; ?>

    </div>
  </div>
    
</nav>