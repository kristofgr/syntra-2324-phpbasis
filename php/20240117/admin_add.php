<?php

require('includes/CrudManager.class.php');

$entity = null;

if (isset($_GET['entity'])) {
    $entity = $_GET['entity'];
} else {
    http_response_code(404);
    die();
}

$CrudManager = new CrudManager($entity);

$structure = $CrudManager->getDBDescription();


print '<pre>';
print_r($_GET);
print_r($structure);
