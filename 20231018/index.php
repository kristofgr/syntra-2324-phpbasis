<?php

$number1 = 10;
$number2 = 15;

$str1 = "hello World";
$str2 = "HELLO world";

$getallen = array(1,2,3,4,5);

// echo is_array(array("hello world"));

// echo implode(", ", $getallen);
// echo "<br>";

// if (is_array("hello world")) {
//   echo "ja";
// } else {
//   echo "nee";
// }

function som($a, $b, $c = 0, $d = 0, $e = 0) {
  return $a + $b + $c;
}

function somVanArray(Array $arr) {
  $som = 0;
  foreach ($arr as $value) {
    $som += $value;
  }
  return $som;
}


$number2 = 986;

echo som($number1, $number2);
echo "<br>";
echo som(123, 12345);
echo "<br>";
echo som(1, 2, 3);
echo "<br>";
echo somVanArray($getallen);
echo "<br>";
echo somVanArray([6,7,8,9,10,345]);
echo "<br>";


echo "<h2>Palindrome...</h2>";
function isPalindrome(String $word) {
  $word = strtolower($word);
  
  if ($word == strrev($word)) {
    return TRUE;
  }

  return FALSE;
}

$woorden = array("lepel", "vork", "rotator", "raceCar", "syntra");

foreach ($woorden as $woord) {
  echo $woord . " is een palindroom? " . (isPalindrome($woord) ? "ja" : "nee") . "<br />";
}


?>