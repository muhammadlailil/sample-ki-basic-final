<?php

include "./connection.php";

if ($connection) {
     /**
      * Update ke database dari data yang dikirimkan
      */
     $id = $_POST['id'];
     $title = $_POST['title'];
     $image = $_POST['image'];
     $article = $_POST['article'];
     if (!$title || !$image || !$article || !$id) {
          header("Location:../admin");
     }

     $querySql = "UPDATE articles SET title=:title, image=:image, article=:article WHERE id = :id";
     $statement = $connection->prepare($querySql);
     $update = $statement->execute([
          'title' => $title,
          'image' => $image,
          'article' => $article,
          'id' => $id,
     ]);

     if (!$update) {
          header("Location:../admin/edit.php?id={$id}&error=Proses edit gagal");
     }
     header("Location:../admin");
}