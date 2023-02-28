<?php

$conn= new mysqli('localhost','root','','test');

if(!($conn)){
    echo "connection successfull";
    die(mysqli_error($conn));
} 



?>