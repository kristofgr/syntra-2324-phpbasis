<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once('env.php');
require('includes/api.inc.php');

$screenshot = getScreenshotFromUrl("https://syntra.be");

print '<pre>';
var_dump($screenshot);

?>