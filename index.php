<?php
$_SESSION['message'] = '';

if (isset($_POST['register_butn'])) {
  session_start();
  $email = $_POST['email'];
  $pass1 = $_POST['pass1'];
  $pass2 = $_POST['pass2'];

  if ($pass1 === $pass2) {
    $pass1 = md5($pass1);
    header("location: welcome.php");
  } else {
    $_SESSION['message'] = "Passwords did not match! Try again.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registration</title>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <main>
    <section class="registration wrapper">

      <div class="registration__header">
        <svg class="registration__logo" width="160" height="56">
          <use xlink:href="#logo-loveknitting"></use>
        </svg>
        <svg class="registration__logo-sm" width="40" height="56">
          <use xlink:href="#logo-loveknitting-sm"></use>
        </svg>
        <h1 class="registration__title">Registration Exercise</h1>
      </div>

      <div class="registration__form">
        <div class="registration__form-inner">
          <form action="index.php" method="post">
            <div class="registration__input-wrap">
              <label class="registration__input-label" for="email">Email</label>
              <input
                type="email"
                class="registration__input"
                id="email"
                name="email"
                placeholder="example@example.com"
                required
              >
            </div>

            <div class="registration__input-wrap">
              <label class="registration__input-label" for="birthday">Birthday</label>
              <input
                class="registration__input"
                type="text"
                id="birthday"
                name="birthday"
                required
              >
            </div>

            <div class="registration__input-wrap">
              <label class="registration__input-label" for="pass1">Password</label>
              <input
                class="registration__input"
                type="password"
                id="pass1"
                name="pass1"
                required
              >
            </div>

            <div class="registration__input-wrap">
              <label class="registration__input-label" for="pass2">Confirm Password</label>
              <input
                class="registration__input"
                type="password"
                id="pass2"
                name="pass2"
                required
              >
            </div>
            <div class="error-message"><?= $_SESSION['message'] ?></div>
            <button class="butn butn--green registration__form-butn" type="submit" name="register_butn">Register</button>
          </form>
        </div>
      </div>
    </section>
  </main>

  <!-- JS -->
  <script src="js/scripts.js" async></script>

  <!-- SVG Sprite -->
  <?php include 'svg_sprite.html' ?>
</body>
</html>
