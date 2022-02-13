<?php

if (isset($_POST['login-submit'])) {

  require 'config.inc.php';

  $mail = $_POST['mail'];
  $password = $_POST['pwd'];

  if (empty($mail) || empty($password)) {
    header("Location: ../index.php?error=emptyfields");
    exit();
  }
  else {
    $sql = "SELECT *FROM user WHERE Email = '$mail'";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($result)){
      
      if($password !=$row['Pwd']){
        
        echo "<script>
        alert('Please enter correct password');
        window.location.href='../index.php';
        </script>";
        
      }
      else if($password == $row['Pwd']) {

        //session_start();
        $_SESSION['email'] = $row['Email'];
        
        if(isset($_SESSION['email'])){
          
        }
        else {
          echo "<script type='text/javascript'>alert('Not SET')</script>";
        }
        
        
        
        
        echo "<script>
        alert('Logged in successfully!');
        window.location.href='../contact.php';
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
