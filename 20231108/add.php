<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('db.inc.php');

// print '<pre>';
// print_r($_POST);
// print '</pre>';

$errors = [];

if (isset($_POST['name'])) {

  if (strlen(trim($_POST['name'])) == 0) {
    $errors['name'] = TRUE;
  }

  if (!count($errors)) {
    $tokens = [
      'name' => $_POST['name'],
      'maturity' => (isset($_POST['maturity']) ? 1 : 0),
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

  <style>
    html,
    body {
      height: 100%;
    }

    .form-signin {
      max-width: 330px;
      padding: 1rem;
    }

    .form-signin .form-floating:focus-within {
      z-index: 2;
    }

    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }
  </style>
</head>

<body data-bs-theme="dark" class="d-flex align-items-center py-4 bg-body-tertiary">
  <main class="form-signin w-100 m-auto">

    <form method="post" action="add.php">
      <h1 class="h3 mb-3 fw-normal">Add account</h1>

      <div class="form-floating">
        <input type="text" class="form-control<?= (isset($errors['name']) ? ' is-invalid' : '') ?>" id="name" name="name" placeholder="Name">
        <label for="name">Name</label>
        <div class="invalid-feedback">
          Please select a valid state.
        </div>
      </div>

      <div class="form-check text-start my-3">
        <input class="form-check-input" type="checkbox" value="1" id="maturity" name="maturity">
        <label class="form-check-label" for="maturity">
          Allow mature content
        </label>
      </div>

      <button class="btn btn-primary w-100 py-2" type="submit">Submit</button>
    </form>

  </main>
</body>