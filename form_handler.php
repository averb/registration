<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $email = $_POST['email'];
  $birthday = $_POST['birthday'];
  $pass1 = $_POST['pass1'];
  $pass2 = $_POST['pass2'];
  $isAjax = $_POST['isAjax'];
  $birthDate = new DateTime($_POST['birthday']);
  $today = new DateTime("now");

  $_SESSION['email'] = $email;

  function validateDate($date, $format = 'd-m-Y') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
  }

  if (!empty($email) || !empty($birthday) || !empty($pass1) || !empty($pass2)) {

    if ($pass1 === $pass2) {
      $pass1 = md5($pass1);
      $pass2 = md5($pass2);

      if (validateDate($birthday)) {

        if ($birthDate <= $today) {

          if ($isAjax) {
            echo json_encode($email);
          } else {
            header("location: welcome.php");
          }

        } else {
          echo "Birth date in the future.";
        }

      } else {
        echo "Date is not correct.";
      }

    } else {
      echo "Passwords did not match! Try again.";
    }

  } else {
    echo "All fields are required.";
  }

}
?>
