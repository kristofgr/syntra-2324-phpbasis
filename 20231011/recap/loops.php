<?php
  $alphabet = array(
    'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J',
    'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',
    'U', 'V', 'W', 'X', 'Y', 'Z'
  );

  $output = "";

  for ($i=1; $i < count($alphabet); $i++) {
    if ($i%2==0) {
      if (strlen($output) > 0) {
        $output = $output . '-' . $alphabet[$i];
      }
      else {
        $output = $alphabet[$i];
      }
    }
  }
  echo $output;
?>
