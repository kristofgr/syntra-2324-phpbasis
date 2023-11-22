<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('env.php');
require('includes/db.inc.php');

$bookmarks = getBookmarks();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?= SITE_NAME ?>
  </title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <style>
    body {
      background: #00b09b;
      background: -webkit-linear-gradient(to right, #00b09b, #96c93d);
      background: linear-gradient(to right, #00b09b, #96c93d);
      min-height: 100vh;
    }

    .text-gray {
      color: #aaa;
    }
  </style>
</head>

<body>
  <header class="py-5">
    <div class="container px-4 px-lg-5 my-5">
      <div class="text-center text-white">
        <h1 class="display-4 fw-bolder">My Bookmarks</h1>
        <p class="lead fw-normal text-white-50 mb-0">
          <a href="add.php">
            <button type="button" class="btn btn-primary">Add new bookmark</button>
          </a>
        </p>
      </div>
    </div>
  </header>
  <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">

      <div class="row gx-4 gx-lg-4 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

        <?php foreach ($bookmarks as $bookmark): ?>

          <div class="col mb-5">
            <div class="card h-100">
              <!-- Website image-->
              <a href="<?= $bookmark['url']; ?>" target="_blank">
                <img class="card-img-top" src="<?= $bookmark['image']; ?>" alt="<?= $bookmark['title']; ?>">
              </a>
              <!-- Product details-->
              <div class="card-body p-4">
                <div class="text-center">
                  <!-- Product name-->
                  <h4>
                    <?= $bookmark['title']; ?>
                  </h4>
                  <h6 class="mb-3">
                    <?= $bookmark['sitename']; ?>
                  </h6>
                  <p>
                    <?= $bookmark['description']; ?>
                  </p>
                </div>
              </div>
              <!-- Product actions-->
              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?= $bookmark['url']; ?>"
                    target="_blank">Visit website</a></div>
              </div>
            </div>
          </div>

        <?php endforeach; ?>

      </div>


    </div>
  </section>
</body>

</html>