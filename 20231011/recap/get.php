<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$name = "default value";

if (array_key_exists('name', $_GET)) {
  $name = $_GET['name'];
}

?>

<h1>Hallo <?php echo $name; ?><?php echo (array_key_exists('lastname', $_GET) ? ' ' . $_GET['lastname'] : ''); ?>.</h1>
