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
if ($connection) {
     $querySql = "SELECT * from articles";
     $statement = $connection->prepare($querySql);
     $statement->execute();
     $listArticle = $statement->fetchAll(PDO::FETCH_ASSOC);
}
?>

<body class="bg-light">

     <!-- NAVBAR COMPONENT -->
     <nav class="navbar navbar-expand-lg bg-white border">
          <div class="container ">
               <a class="navbar-brand" href="#">
                    Lailil Mahfud
               </a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                         <li class="nav-item">
                              <a class="nav-link" href="admin">Admin</a>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>
     <!-- NAVBAR COMPONENT -->

     <!-- PROFILE INFORMATION -->
     <section class="container py-4">
          <div class="row">
               <div class="col-sm-3 card p-3" style="height: fit-content;">
                    <center>
                         <img src="https://i.pravatar.cc/300?img=52" alt="" width="200" height="200"
                              class="img-thumbnail rounded-circle d-block">
                    </center>
                    <p style="text-align: justify;" class="mt-3">
                         Hi, I'm Lailil Mahfud. <br>
                         I am an IT Professional who has experience in technology and web
                         application development.
                         Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur odit quae quasi, explicabo
                         consequuntur dolor. Nostrum architecto similique ex perspiciatis! Quam qui iure vitae illo et
                         maiores laboriosam, pariatur nam? Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    </p>
                    <div class="d-flex gap-1">
                         <button type="button" class="w-100 btn btn-primary">Facebook</button>
                         <button type="button" class="w-100 btn btn-info text-white">LinkedIn</button>
                         <button type="button" class="w-100 btn btn-danger">Email</button>
                    </div>

               </div>
               <div class="col-sm-9">
                    <h3>Article</h3>
                    <div class="row">
                         <?php foreach ($listArticle as $article) { ?>
                              <div class="col-sm-4 mb-4">
                                   <div class="card p-2">
                                        <img src="<?= $article['image'] ?>" style="height: 150px;">
                                        <b>
                                             <?= $article['title'] ?>
                                        </b>
                                        <p>
                                             <?= substr($article['article'], 0, 200) ?>...
                                        </p>
                                        <a href="article.php?id=<?= $article['id'] ?>" class="btn btn-primary">
                                             Baca >>
                                        </a>
                                   </div>
                              </div>
                         <?php } ?>
                    </div>
               </div>
          </div>
     </section>
     <!-- PROFILE INFORMATION -->

     <!-- FOOTER -->
     <footer class="text-center bg-white border py-2">
          Copyright &copy; 2023 Lailil Mahfud
     </footer>
     <!-- FOOTER -->

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>