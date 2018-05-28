<?php
  $server ='localhost';
  $username= 'root';
  $password = '796534';
  $database = 'login_tuto';

  try {
     $conn = new PDO('mysql:host =localhost;dbname=login_tuto;','root', '796534');

  } catch (PDOException $e) {

    die('Connected failed: '.$e->getMessage());

  }




 ?>
