<?php 
  include "config/connection.php";

  $id = $_GET['id'];

  $sql = mysqli_query($conn,"DELETE FROM `party` WHERE id = '$id'");

  if($sql){
    header('location:admin-handle.php');
  }else{
    ?>
    <script>alert("not deleted")</script>
 <?php
  }


  $sqll = mysqli_query($conn,"DELETE FROM `voter` WHERE idd = '$id'");

  if($sqll){
    header('location:voter-list.php');
  }else{
    ?>
    <script>alert("not deleted")</script>
 <?php
  }
?>