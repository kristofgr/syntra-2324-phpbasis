<?php
require('movies.php');
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
            <tr>
              <th>
                <?= $key; ?>
              </th>
              <th><a href="#">
                  <?= $movie['title']; ?>
                </a></th>
              <th><a href="#">
                  <?= $movie['genre']; ?>
                </a></th>
              <th>
                <?= substr($movie['description'], 0, 50) . (strlen($movie['description']) > 50 ? '...' : ''); ?>
              </th>
              <th><a href="#">
                  <?= $movie['year']; ?>
                </a></th>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </section>

  </main>
</body>

</html>