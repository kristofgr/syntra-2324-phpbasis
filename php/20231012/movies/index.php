<?php
require('movies.php');
require('functions.inc.php');

// Filter by Year
$filter_year = NULL;
if (array_key_exists('year', $_GET)) {
  $filter_year = (int) $_GET['year'];
}

// Filter by Genre
$filter_genre = NULL;
if (array_key_exists('genre', $_GET)) {
  $filter_genre = $_GET['genre'];
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>
    Movies from GPT...
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
            <th>Title</th>
            <th>Genre</th>
            <th>Description</th>
            <th>Year</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($movies as $key => $movie) { ?>
            <?php if (($filter_year === NULL) || ($movie['year'] == $filter_year)) { ?>
              <?php if (($filter_genre === NULL) || ($movie['genre'] == $filter_genre)) { ?>
                <tr>
                  <th>
                    <?= $key; ?>
                  </th>
                  <th><a href="movie/<?= createSlugFromName($movie['title']); ?>">
                      <?= $movie['title']; ?>
                    </a></th>
                  <th><a href="index.php?genre=<?= $movie['genre'] . ($filter_year ? "&year=$filter_year" : ""); ?>">
                      <?= $movie['genre']; ?>
                    </a></th>
                  <th>
                    <?= substr($movie['description'], 0, 50) . (strlen($movie['description']) > 50 ? '...' : ''); ?>
                  </th>
                  <th><a href="index.php?year=<?= $movie['year'] . ($filter_genre ? "&genre=$filter_genre" : ""); ?>">
                      <?= $movie['year']; ?>
                    </a></th>
                </tr>
              <?php } ?>
            <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </section>

  </main>
</body>

</html>