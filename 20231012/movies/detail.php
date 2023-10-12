<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require('movies.php');

$movie_id = 0;
if (array_key_exists('id', $_GET)) {
  $movie_id = $_GET['id'];
}

$movie = NULL;
foreach ($movies as $item) {
  if ($movie_id == $item['uuid']) {
    $movie = $item;
  }
}

if ($movie === NULL) {
  header("Location: 404.php");
  exit;
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>
    <?= $movie['title']; ?>
  </title>
  <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>
  <header>
    <h1>
      <?= $movie['title']; ?>
    </h1>
    <p>
      <a href="index.php?genre=<?= $movie['genre']; ?>"><?= $movie['genre']; ?></a> (<a href="index.php?year=<?= $movie['year']; ?>"><?= $movie['year']; ?></a>)
    </p>
  </header>
  <main>
    <hr>
    <article>
      <h2>Description</h2>
      <p>
        <?= $movie['full_description']; ?>
      </p>
      <h2>Director</h2>
      <p>
        <?= $movie['director']; ?>
      </p>
      <h2>Actors</h2>
      <p>
        <?= implode(", ", $movie['actors']); ?>
      </p>
    </article>
    <hr>
    <div>
      <details>
        <summary>Actors</summary>
        <ul>
          <?php
          foreach ($movie['actors'] as $actor) {
            echo "<li>$actor</li>";
          }
          ?>
        </ul>
      </details>
    </div>
    <hr>
  </main>

</body>

</html>