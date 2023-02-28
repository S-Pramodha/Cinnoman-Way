<?php
  require 'connect.php';
  if ($_SERVER['REQUEST_METHOD']=='POST'){
    $name     =$_POST['name'];
    $email    =$_POST['email'];
    $password =$_POST['password'];
    

    $sql= "INSERT INTO reg (name,email,password) VALUES ('$name','$email','$password')";
    $result=mysqli_query($conn,$sql);
  
    if($result){
      echo ("data inserted");
      //header('location:display.php');
    } else {
    echo ("not inserted");
      //die(mysqli_error($conn));
    }

  }


?>