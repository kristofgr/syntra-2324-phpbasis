<?php 
  error_reporting(E_ALL);
  $x = "hallo wereld";
  $a = 5;
  $b = 2;
?>
<!DOCTYPE html>
<html>
  <head>
    <title>
      Een eerste php oefening
    </title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css" />
  </head>
  <body>
    <main>
      <p><?php echo $x . $x . $a; ?></p>
      <p><?php echo "$x $x"; ?></p>
      <p><?php echo '$x $x'; ?></p>
      <p>optelsom: <?php echo $a; ?> + <?php echo $b; ?> = <?php echo $a + $b; ?></p>
      <!-- <p>optelsom: <?php echo $a; ?></p> -->
    </main>
    <footer>
        <hr>
        <p>
            <small>&copy; copyright by Kristof, <?php echo date("Y"); ?>. </small>
        </p>
    </footer>
  </body>
</html>
