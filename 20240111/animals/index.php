<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('includes/db.inc.php');

$animals = getAnimals();
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

  <section class="vh-100 gradient-custom-2">
    <div class="container py-5 h-100">
      <h4 class="fw-bold text-center mt-3"></h4>

      <ul>
        <?php foreach ($animals as $animal) : ?>
          <li>
            <a href="edit/<?= $animal->id; ?>">
              <?= $animal->animal_name . ($animal->continent_name ? ': ' . $animal->continent_name : ''); ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>

      <a href="add.php"><button class="btn btn-primary">Add new animal</button></a>
    </div>
  </section>

</body>

</html>