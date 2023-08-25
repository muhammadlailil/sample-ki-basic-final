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
if ($connection) {

     $querySql = "SELECT * from articles";

     $statement = $connection->prepare($querySql);

     $statement->execute();

     $listArticle = $statement->fetchAll(PDO::FETCH_ASSOC);
}

?>

<body class="bg-light">
     <div class="container p-5">
          <?php if (@$_GET['error']) { ?>
               <div class="alert alert-danger" role="alert">
                    <?= $_GET['error'] ?>
               </div>
          <?php } ?>

          <div class="d-flex justify-content-between">
               <h3>List Article</h3>
               <a href="create.php" class="btn btn-primary">Add Article</a>
          </div>
          <div class="border rounded-4 overflow-hidden mt-2">
               <table class="table table-striped mb-0">
                    <thead>
                         <tr>
                              <th>Id</th>
                              <th>Image</th>
                              <th>Title</th>
                              <th>Article</th>
                              <th>Action</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php foreach ($listArticle as $article) { ?>
                              <tr class="align-middle">
                                   <th>
                                        <?= $article['id'] ?>
                                   </th>
                                   <td>
                                        <img src="<?= $article['image'] ?>" class="img-thumbnail" style="height: 70px;">
                                   </td>
                                   <td>
                                        <?= $article['title'] ?>
                                   </td>
                                   <td>
                                        <?= substr($article['article'], 0, 50) ?>
                                   </td>
                                   <td>
                                        <div class="d-flex gap-2">
                                             <form action="../system/delete-article.php" method="POST">
                                                  <input type="hidden" name="id" value="<?= $article['id'] ?>">
                                                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                             </form>
                                             <a href="edit.php?id=<?= $article['id'] ?>"
                                                  class="btn btn-primary btn-sm">Edit</a>
                                        </div>
                                   </td>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
          </div>
     </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>