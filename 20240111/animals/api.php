<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('includes/db.inc.php');

$src = '';

if (isset($_GET['src'])) {
    $src = $_GET['src'];
}

if (!in_array($src, ['continents', 'animals'])) {
    http_response_code(404);
    exit;
}

switch ($src) {
    case 'continents':
        $data = getContinents();
        break;
    case 'animals':
        $data = getAnimals();
        break;
}

// print '<pre>';
// print_r($data);

header('Content-Type: application/json; charset=utf-8');
print json_encode($data);
