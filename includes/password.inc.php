<?php

if (isset($_POST['login-submit'])) {

  require 'config.inc.php';

  $mail = $_POST['mail'];
  $secret = $_POST['sec'];

  if (empty($mail) || empty($secret)) {
    header("Location: ../index.php?error=emptyfields");
    exit();
  }
  else {
    $sql = "SELECT *FROM user WHERE Email = '$mail'";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($result)){
      if($secret != $row['Secret']){
        
        
        echo "<script>
        alert('Please enter correct code');
        window.location.href='../forget_password.php';
        </script>";
        
      }
      else if($secret==$row['Secret']) {

        
        $_SESSION['email'] = $row['Email'];
        
        if(isset($_SESSION['email'])){
          //echo "<script type='text/javascript'>alert('Set')</script>";
        }
        else {
          echo "<script type='text/javascript'>alert('Not SET')</script>";
        }
        
        $password=$row['Pwd'];
        echo "<script type='text/javascript'>alert('Password:$password')</script>";
        echo "<script>
        alert('Now log in');
        window.location.href='../index.php';
        </script>";
      }
      else {
        header("Location: ../index.php?error=strangeerr");
        exit();
      }
    }
    else{
      
      echo "<script>
        alert('No user exist. Please sign up first!');
        window.location.href='../index.php';
        </script>";
    }
  }

}
else {
  header("Location: ../index.php");
  exit();
}
