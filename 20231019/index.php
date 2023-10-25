<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('db.inc.php');

$items_per_page = 20;

// We halen alle beschikbare categoriën uit de DB, dit is voor latere quality control
$all_categories = executeQuery("SELECT DISTINCT(category) FROM soorten ORDER BY category DESC", [], PDO::FETCH_COLUMN);

// Alle mogelijke filters/parameters inlezen + quality control
$params = array(
  'offset' => 0,
);

if (array_key_exists("category", $_GET) && in_array($_GET["category"], $all_categories)) {
  $params["category"] = $_GET["category"];
}
if (array_key_exists("offset", $_GET) && ((int) $_GET["offset"] > 0)) {
  $params["offset"] = $_GET["offset"];
}

// We halen het totaal aantal records (getal) uit de DB
if (array_key_exists("category", $params)) {
  $total = executeQuery("SELECT COUNT(id) AS total FROM soorten WHERE category = :category", ['category' => $params['category']], PDO::FETCH_COLUMN);
} else {
  $total = executeQuery("SELECT COUNT(id) AS total FROM soorten", [], PDO::FETCH_COLUMN);
}
$total = $total[0];

$total_pages = floor($total / $items_per_page);

// We halen alle soorten uit de database, rekening houdend met de filters en de offset
$sql = "SELECT id, name, category FROM soorten";
if (array_key_exists("category", $params)) {
  $sql .= " WHERE category = :category";
}
$sql .= " ORDER BY name order LIMIT :offset, " . $items_per_page;
$soorten = executeQuery($sql, $params);
?>
<!DOCTYPE html>
<html>

<head>
  <title>
    Soorten
  </title>
  <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>
  <main>

    <section>
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>ID</th>
            <th>Naam</th>
            <th>Categorie</th>
          </tr>
        </thead>
        <tbody>
          <p>Totaal aantal soorten:
            <?= $total; ?>.<br />
            Resultaten
            <?= $params["offset"] + 1; ?> tot
            <?= $params["offset"] + $items_per_page; ?> worden getoond.
          </p>
          <?php foreach ($soorten as $key => $soort) { ?>
            <tr>
              <th>
                <?= $params["offset"] + $key + 1; ?>
              </th>
              <th>
                <?= $soort['id']; ?>
              </th>
              <th>
                <?= $soort['name']; ?>
              </th>
              <th><a href="index.php?<?=  http_build_query(array_merge($params, ['category' => $soort['category'], 'offset' => 0])); ?>">
                  <?= $soort['category']; ?>
                </a></th>
            </tr>

          <?php } ?>
        </tbody>
      </table>
      <p align="center">

        <?php if (($params["offset"] - $items_per_page) >= 0) { ?>
          <a href="index.php?<?=  http_build_query(array_merge($params, ['offset' => $params["offset"] - $items_per_page])); ?>">
            <i>Prev</i>
          </a>
        <?php } ?>

        <?php for($i=0; $i<=$total_pages; $i++) { ?>
          <a href="index.php?<?=  http_build_query(array_merge($params, ['offset' => $i * $items_per_page])); ?>">
            <i><?= $i + 1 ?></i>
          </a>
        <?php } ?>
        

        <?php if (($params["offset"] + $items_per_page) < $total) { ?>
          <a href="index.php?<?=  http_build_query(array_merge($params, ['offset' => $params["offset"] + $items_per_page])); ?>">
            <i>Next</i>
          </a>
        <?php } ?>

      </p>

    </section>

  </main>
</body>

</html>