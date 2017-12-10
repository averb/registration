<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/main.css">
  <title>Welcome</title>
</head>
<body>
  <section class="registration wrapper">
    <a href="index.php">← Registration form</a>
    <div class="registration__form">
      <div class="registration__form-inner">
        Welcome <strong><?= $_SESSION['email'] ?></strong>
      </div>
    </div>
  </section>
</body>
</html>
