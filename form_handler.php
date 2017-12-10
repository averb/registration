<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  session_start();

  $email = $_POST['email'];
  $birthday = $_POST['birthday'];
  $pass1 = $_POST['pass1'];
  $pass2 = $_POST['pass2'];
  $isAjax = $_POST['isAjax'];
  $today = date("d/m/Y");

  $_SESSION['message'] = '';
  $_SESSION['email'] = $email;

  if ($isAjax) {
    echo json_encode($email);
    exit;
  }

  if (!empty($email) || !empty($birthday) || !empty($pass1) || !empty($pass2)) {

    if ($pass1 === $pass2) {
      $pass1 = md5($pass1);
      $pass2 = md5($pass2);

      if (strtotime($birthday) < strtotime($today)) {
        header("location: welcome.php");
      } else {
        $_SESSION['message'] = "Birth date in the future.";
      }

    } else {
      $_SESSION['message'] = "Passwords did not match! Try again.";
    }

  } else {
    $_SESSION['message'] = "All fields are required";
  }

}
?>
