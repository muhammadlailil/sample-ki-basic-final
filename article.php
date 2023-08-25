<!doctype html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Bootstrap demo</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php

include 'system/connection.php';
$id = @$_GET['id'];
if ($connection && $id) {

     $querySql = "SELECT * from articles where id=:id";
     $statement = $connection->prepare($querySql);
     $statement->execute([
          'id' => $id
     ]);
     $article = $statement->fetch(PDO::FETCH_ASSOC);
} else {
     header("Location:index.php");
}

?>

<body class="bg-light">

     <div class="container py-4">
          <a href="index.php" class="btn btn-secondary mb-3">Kembali</a>
          <h3>
               <?= $article['title'] ?>
          </h3>
          <img src="<?= $article['image'] ?>" style="width: 100%;" />
          <pre class="mt-3 lh-bas" style="white-space: break-spaces;font-family: Arial;font-size: 17px;"><?= $article['article'] ?></pre>
     </div>


     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>