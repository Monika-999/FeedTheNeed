<?php
session_start();
include 'connection.php';

if (isset($_POST['feedback'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $msg = $_POST['message'];

    $sanitized_email = mysqli_real_escape_string($connection, $email);
    $sanitized_name = mysqli_real_escape_string($connection, $name);
    $sanitized_msg = mysqli_real_escape_string($connection, $msg);

    $query = "INSERT INTO user_feedback (name, email, message) VALUES ('$sanitized_name', '$sanitized_email', '$sanitized_msg')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        header("location:feedback.php"); // Redirect if successful
        exit();
    } else {
        echo '<script type="text/javascript">alert("Data not saved: ' . mysqli_error($connection) . '")</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <style>

    .h2{
      display:flex;
      justify-content: center;
      color :black;
      font-family: Roboto;
    }
  </style>



  <h2 class = "h2"> Your feedback is Subimitted!!</h2>
</body>
</html>