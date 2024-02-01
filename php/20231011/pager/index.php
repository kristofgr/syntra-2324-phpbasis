<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("data.php");
$itemsPerPage = 6;
$aantalFotos = count($photos);

$offset = 0;
if (array_key_exists('offset', $_GET)) {
    $offset = (int)$_GET['offset'];
    if ($offset > $aantalFotos) {
      $offset = 0;
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>
      Lego from Unsplash...
    </title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css"> 
  </head> 
  <body>
    <main>
      
      <section>
          <header>
            <h1>Lego</h1>
            <p>Totaal: <?php echo $aantalFotos; ?> foto's</p>
          </header>

          <?php 
            for ($i=$offset; $i < ($offset + $itemsPerPage); $i++) { 
              if ($i < $aantalFotos) {
          ?>

            <aside style="background-color: <?php echo $photos[$i]['color']; ?>">
                <h3>Card heading</h3>
                <img src="<?php echo $photos[$i]['url']; ?>" />
                <?php if($photos[$i]['description'] !== NULL ) { ?>
                  <p>
                    <small style="color: <?php echo $photos[$i]['color']; ?>; filter: invert(1);">
                      <?php echo (strlen($photos[$i]['description']) > 50 ? substr($photos[$i]['description'], 0, 50) . '...' : $photos[$i]['description']); ?>
                    </small>
                  </p>
                <?php } ?>
            </aside>

          <?php 
              }
            } 
          ?>
          <?php if (($offset + $itemsPerPage) < $aantalFotos){ ?>
            <p align="center">
              <a href="index.php?offset=<?php echo $offset + $itemsPerPage; ?>"><i>Next</i></a>
            </p>
          <?php } ?>
          

      </section>

    </main>
    <footer>
        <hr>
        <p>
            <small>Contact info</small>
        </p>
    </footer>
  </body>
</html>
 