<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('db.inc.php');

$avatars = getAvatars();
// print '<pre>';
// // print_r($_POST);
// print_r(getProfiles());
// print '</pre>';
// exit;

$errors = [];

if (isset($_POST['name'])) {

  if (strlen(trim($_POST['name'])) == 0) {
    $errors['name'] = TRUE;
  }

  if (!isset($_POST['avatar'])) {
    $errors['avatar'] = TRUE;
  } else {
    if ((int) $_POST['avatar'] == 0) {
      $errors['avatar'] = TRUE;
    } else {
      // TODO: check of avatar id bestaat...
    }
  }

  if (!count($errors)) {
    $tokens = [
      'name' => $_POST['name'],
      'maturity' => (isset($_POST['maturity']) ? 1 : 0),
      'avatar' => $_POST['avatar'],
    ];
    insertProfile($tokens);
    header("Location: index.php");
    exit;
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>
    Account toevoegen
  </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body data-bs-theme="dark">
  <main>
    <div class="container">
      <form method="post" action="add.php">

        <section class="py-5 text-center container">
          <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
              <h1 class="fw-light mb-5">Add account</h1>

              <div class="form-floating">
                <input type="text" class="form-control<?= (isset($errors['name']) ? ' is-invalid' : '') ?>" id="name"
                  name="name" placeholder="Name">
                <label for="name">Name</label>
                <div class="invalid-feedback">
                  Please provide a name.
                </div>

                <div class="form-check text-start my-3">
                  <input class="form-check-input" type="checkbox" value="1" id="maturity" name="maturity">
                  <label class="form-check-label" for="maturity">
                    Allow mature content
                  </label>
                </div>

              </div>
            </div>
          </div>
        </section>





        <h3 class="h5 <?= (isset($errors['avatar']) ? ' is-invalid' : '') ?>">Choose avatar</h3>

        <div class="invalid-feedback">Select an avatar</div>

        <?php foreach ($avatars as $category => $sub_avatars): ?>

          <h3 class="h6 mb-6">
            <?= $category; ?>
          </h3>

          <?php $first = true; ?>

          <?php foreach ($sub_avatars as $avatar): ?>

            <input class="btn-check" type="radio" name="avatar" id="avatar<?= $avatar["id"]; ?>"
              value="<?= $avatar["id"]; ?>"<?= ($first ? ' checked="checked"' : ''); ?>>
            <label class="btn" for="avatar<?= $avatar["id"]; ?>">
              <img src="<?= $avatar["image"]; ?>" alt="<?= $avatar["name"]; ?>" title="<?= $avatar["name"]; ?>" class="rounded mx-auto d-block" width="230" />
            </label>

            <?php $first = false; ?>

          <?php endforeach; ?>
        <?php endforeach; ?>

        <button class="btn btn-primary w-100 py-2" type="submit">Submit</button>
      </form>
    </div>
  </main>
</body>