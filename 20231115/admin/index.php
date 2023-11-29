<?php
session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
  header("Location: login.php");
  exit;
}


print '<pre>';
print_r($_SESSION);

?>
hier komt de questions data table....