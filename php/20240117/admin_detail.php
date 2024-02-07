<?php
require('includes/CrudManager.class.php');

$entity = null;

if (isset($_GET['entity'])) {
    $entity = $_GET['entity'];
} else {
    http_response_code(404);
    die();
}


$id = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    http_response_code(404);
    die();
}


$CrudManager = new CrudManager($entity);
$record = $CrudManager->getById($id);
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>

    <div class="container">
        <header>
            <h1><?= ucfirst($entity); ?> - id <?= $id; ?></h1>
        </header>

        <pre>
            <?php print_r($record); ?>
        </pre>

    </div>

</body>

</html>