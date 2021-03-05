<?php

    include "dbconnect.php";
    $method= $_SERVER['REQUEST_METHOD'];
   if($method=="POST"){
       $problemid=$_GET["prob"];
      $sol_desc=$_POST['answer'];
      session_start();
      $email=$_SESSION['user'];
      $sql1="select *from `users` where user_email='$email'";
      $result1=mysqli_query($conn,$sql1);
      $row=mysqli_fetch_assoc($result1);

      $userid=$row["user_id"];
      
      $sql="INSERT INTO `solution` (`sol_desc`, `prob_id`, `user_id`, `timestamp`) VALUES ('$sol_desc', '$problemid', '$userid', current_timestamp())";
      $result=mysqli_query($conn,$sql);
      if($result){
         header("Location:http://localhost/iCoder/");
      }
    }
?>