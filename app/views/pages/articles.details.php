<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $pageTitle ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="container-lg bg-light">
    <?php include_once "views/partials/navbar.php"; ?>

    <main class="mt-5 pt-3 row">
      <div class="col-12">
        <div class="text-center mb-3">
          <h1><?= $article->title ?></h1>
          <img src="<?= $article->img_src ?>" alt="<?= $article->title ?>">
        </div>
        <p style="text-align: justify;">
          <?= $article->summary ?>
        </p>
        <p>
          Publié le <?= date("d/m/Y", strtotime($article->published_at)); ?>
          <?php
          if (isset($article->updated_at)) {
          ?>
            (Mis à jour le <?= date("d/m/Y", strtotime($article->updated_at)); ?>)
          <?php
          }
          ?>
        </p>

      </div>
    </main>
  </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>