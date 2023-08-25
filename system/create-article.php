<?php

include "./connection.php";

if ($connection) {
     /**
      * Insert ke database dari data yang dikirimkan
      */
     $title = $_POST['title'];
     $image = $_POST['image'];
     $article = $_POST['article'];
     if (!$title || !$image || !$article) {
          header("Location:../admin/create.php?error=Anda harus melengkapi form terlebih dahulu");
     }

     $querySql = "INSERT INTO articles (title,image,article)
          VALUES ('$title','$image','$article')";
     $save = $connection->exec($querySql);
     if (!$save) {
          header("Location:../admin/create.php?error=Proses simpan gagal");
     }
     header("Location:../admin");
}