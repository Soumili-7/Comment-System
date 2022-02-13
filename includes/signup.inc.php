<?php

if (isset($_POST['signup-submit'])) {

  require 'config.inc.php';

  
  $mail = $_POST['mail'];
  $password = $_POST['pwd'];
  $code = $_POST['sec'];
  $sql = "SELECT Email FROM user WHERE Email=?";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../signup.php?error=sqlerror");
    exit();
  }
  else
  {
    mysqli_stmt_bind_param($stmt, "s", $mail);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultCheck = mysqli_stmt_num_rows($stmt);
    if ($resultCheck > 0) {
    //header("Location: ../signup.php?error=userexists");
    //exit();
    echo "<script>
    alert('User Exits Already');
    window.location.href='../signup.php';
    </script>";
    }
    else {
        $sql = "INSERT INTO user (Email, Pwd, Secret ) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../signup.php?error=sqlerror");
          exit();
        }
        else {

          //$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

          mysqli_stmt_bind_param($stmt, "sss",$mail, $password, $code);
          mysqli_stmt_execute($stmt);
          //header("Location: ../index.php?signup=success");
          //exit();
          echo "<script>
          alert('Signed up Successfully! Please Log in through your credentials');
          window.location.href='../index.php';
          </script>";
        }
      }
    }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

}
else {
  header("Location: ../signup.php");
  exit();
}
