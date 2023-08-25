<?php

include "./connection.php";

if ($connection) {

     $id = $_POST['id'];
     if (!$id) {
          header("Location:../admin");
     }

     try {

          $querySql = "DELETE FROM articles WHERE id = :id";
          $statement = $connection->prepare($querySql);
          $statement->execute([
               'id' => $id
          ]);

          header("Location:../admin");

     } catch (\Exception $e) {
          header("Location:../admin/index.php?error=Proses delete gagal");
     }
}