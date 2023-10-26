<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

require("db.inc.php");

$errors = [];
$valid_categories = array("Vogels", "Zoogdieren", "Insecten", "Bomen en Planten");

if (isset($_POST["name"])) {

  if (strlen(trim($_POST["name"])) == 0) {
    $errors[] = "Naam is een verplicht veld.";
  }

  if (!isset($_POST["category"])) {
    $errors[] = "Gelieve een categorie te selecteren.";
  } else {
    if (!in_array(trim($_POST["category"]), $valid_categories)) {
      $errors[] = "Categorie moet één van volgende waardes zijn: Vogels, Zoogdieren.";
    }
  }

  if (count($errors) == 0) {
    insertSoort($_POST['name'], $_POST['category']);
    header("Location: index.php?message=" . $_POST['name']);
    exit();
  }
}

if (isset($_GET['id']) && (int) $_GET['id'] > 0) {
  $id = $_GET['id']; 
  $soort = getSoort($id);

  if (count($soort) > 0) {
    $soort = $soort[0];
  }

  // echo '<pre>';
  // print_r($soort);
  // exit;
}

?>

<!DOCTYPE html>
<html color-mode="user">

<head>
  <title>
    Soort toevoegen
  </title>
  <link rel="stylesheet" href="https://unpkg.com/mvp.css">

  <style>
    ul.errors li {
      color: red;
    }
  </style>
</head>

<body>
  <main>
    <section>
      <form action="form.php" method="POST">
        <header>
          <h2>Soort toevoegen</h2>

          <ul class="errors">
            <?php foreach ($errors as $error): ?>
              <li>
                <?= $error; ?>
              </li>
            <?php endforeach; ?>
          </ul>

        </header>

        <label for="name">Naam</label>
        <input type="text" id="name" name="name" size="20" placeholder="Naam" value="  (isset($soort["name"]) ? $soort["name"] : "")); ?>">

        <label for="category">Categorie</label>
        
          <?php foreach ($valid_categories as $valid_category): ?>
            
            <input type="radio" id="<?= $valid_category; ?>" name="category" value="<?= $valid_category; ?>"<?= (($valid_category == @$_POST['category']) ? ' checked="checked"' : "") ?>>
            <label for="<?= $valid_category; ?>"><?= $valid_category; ?></label><br>


          <?php endforeach; ?>

       

        <button type="submit">Opslaan</button>
        <a href="index.php"><i>Annuleer</i></a>

      </form>
    </section>
  </main>
</body>