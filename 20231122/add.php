<?php
require_once('env.php');

// print '<pre>';
// print_r($_POST);
// print '</pre>';

$errors = [];


if (isset($_POST['url'])) {

  // Check if URL has a valid format
  // if (!preg_match("/^((https|http)\:\/\/)?( ]+\.[a-z0-9A-Z]+\.[a-z0-9A-Z]+\.[a-zA-Z]{2,4}|[a-z0-9A-Z]+\.[a-z0-9A-Z]+\.[a-zA-Z]{2,4}|[a-z0-9A-Z]+\.[a-zA-Z]{2,4})$/i", $_POST['url'])) {
  //   $errors['url'] = "url moet wel een echte url zijn.";
  // }

  // Check if URL is not empty
  if (empty(trim($_POST['url']))) {
    $errors['url'] = "url mag niet leeg zijn.";
  }

  // Geen errors met POST -> spreek de API aan:
  if (empty($errors)) {
    require('includes/api.inc.php');

    $screenshot = getScreenshotFromUrl($_POST['url']);
    $results = getOGFromUrl($_POST['url']);

    if (!$results) {
      $errors['url'] = "De API gaf geen resultaat terug voor deze URL.";
    } else {
      require('includes/db.inc.php');

      insertBookmark(
        (isset($results->hybridGraph->title) ? substr($results->hybridGraph->title, 0, 255) : ""),
        (isset($results->hybridGraph->site_name) ? substr($results->hybridGraph->site_name, 0, 255) : ""),
        (isset($results->hybridGraph->description) ? substr($results->hybridGraph->description, 0, 255) : ""),
        (isset($results->hybridGraph->image) ? substr($results->hybridGraph->image, 0, 255) : ""),
        (isset($results->hybridGraph->url) ? substr($results->hybridGraph->url, 0, 255) : ""),
        $screenshot
      );

      header("Location: index.php");
      exit;
    }
  }

}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?= SITE_NAME; ?>
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
        <h1 class="display-4 fw-bolder">Add new bookmark</h1>
      </div>
    </div>
  </header>


  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">

        <!-- <?php foreach ($errors as $error): ?>
          <p>
            <?= $error; ?>
          </p>
        <?php endforeach ?> -->

        <form method="post" action="add.php">
          <div class="form-check text-start my-3">
            <label for="url">URL</label>
            <input value="<?= @$_POST['url']; ?>" type="text"
              class="form-control<?= (isset($errors['url']) ? " is-invalid" : ""); ?>" id="url" name="url"
              placeholder="https://...">

            <div class="invalid-feedback">
              <?= $errors['url']; ?>
            </div>
          </div>

          <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="1" id="screenshot" name="screenshot">
            <label class="form-check-label" for="maturity">
              Make screenshot with apiflash.com (999 credits left)
            </label>
          </div>


          <button class="btn btn-primary w-100 py-2" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </section>






</body>

</html>