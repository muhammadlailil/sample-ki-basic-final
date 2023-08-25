<!doctype html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Admin</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php

include '../system/connection.php';
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
     <form class="container p-5" action="../system/edit-article.php" method="POST">
          <input type="hidden" name="id" id="id" value="<?= $article['id'] ?>">
          <?php if (@$_GET['error']) { ?>
               <div class="alert alert-danger" role="alert">
                    <?= $_GET['error'] ?>
               </div>
          <?php } ?>

          <div class="d-flex justify-content-between">
               <h3>Edit Article</h3>
               <div>
                    <a href="index.php" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Save</button>
               </div>
          </div>
          <div class="mt-2">
               <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required
                         value="<?= $article['title'] ?>">
               </div>
               <div class="form-group">
                    <label for="">Image</label>
                    <input type="url" name="image" id="image" class="form-control" required
                         value="<?= $article['image'] ?>">
               </div>
               <div class="form-group">
                    <label for="">Article</label>
                    <textarea name="article" id="article" cols="30" rows="20" class="form-control"
                         required><?= $article['article'] ?></textarea>
               </div>
          </div>
     </form>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>