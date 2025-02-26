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
      <h2 class="mt-3 mb-5">Les séries</h2>
      <?php foreach ($series as $serie) { ?>
        <div class="col-12 col-md-6 col-lg-3 d-flex align-items-stretch justify-content-center">
          <div class="card mb-3" style="width: 18rem;">
            <img src="<?= $serie["img_src"] ?>" class="card-img-top" alt="<?= $serie["title"] ?>">
            <div class="card-body text-center">
              <h5 class="card-title"><?= $serie["title"] ?></h5>
              <p class="card-text" style="text-align: justify;"><?= $serie["summary"] ?></p>
              <a href="series/articles/<?= $serie["id_serie"] ?>" class="btn btn-primary">Voir</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>