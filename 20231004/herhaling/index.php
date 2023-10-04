<?php
 $name = "Kristof";
 $a = 100;
 $b = 6;
 $address_with_country = "";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>
      PHP Variables and function...
    </title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css"> 
  </head> 
  <body>
    <main>
      <p>hallo <?php echo $name; ?>...</p>
      <p>De som van <?php echo $a; ?> + <?php echo $b; ?> is <?php echo $a + $b; ?></p>
      <p>De som van <?php echo "$a + $b is " . ($a + $b); ?></p>
      <p>De som van <?php echo '$a + $b is ' . ($a + $b); ?></p>
      <p>De som van <?php echo $a . ' + ' . $b . ' is ' . ($a + $b); ?></p>

      <?php
      $x = 1;

      // do {
      //   echo "$x <br>";
      //   $x++;
      // } while ($x <= 100);

      // $x = 1;
      // while($x <= 100) {
      //   if ($x % 2 == 0) {
      //     echo "The number is: $x <br>";
      //   }
      //   $x++;
      // }

      for ($x = 1; $x <= 100; $x++) {
        // if ($x%2 == 0) {
        //   echo "$x <br>";
        // } else {
        //   echo "- <br>";
        // }

        echo ($x%2 == 0 ? $x : "-");
        echo "<br>";

      }

      ?>


    </main>
    <footer>
        <hr>
        <p>
            <small>Contact info</small>
        </p>
    </footer>
  </body>
</html>
