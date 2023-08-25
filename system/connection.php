<?php

$serverName = "localhost";
$username = "root";
$password = "";
$databaseName = "ki_basic_blog";
$connection = null;

try {
     $connection = new PDO(
          "mysql:host=$serverName;dbname=$databaseName",
          $username,
          $password
     );
} catch (PDOException $error) {
     echo "Connection failed : " . $error->getMessage();
}