<?php

require('includes/CrudManager.class.php');
require('includes/ProductManager.class.php');
require('includes/CategoryManager.class.php');

$entity = null;

if (isset($_GET['entity'])) {
    $entity = $_GET['entity'];
} else {
    http_response_code(404);
    die();
}

$CrudManager = new CrudManager($entity);

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <header>
            <h1><?= ucfirst($entity); ?></h1>
        </header>

        <?php print $CrudManager->getAdminTable(); ?>

    </div>

</body>

</html>