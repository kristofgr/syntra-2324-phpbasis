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



if (isset($_POST['submit'])) {
    $tokens = [];
    $columns = $CrudManager->getDBDescription();

    foreach ($columns as $column) {
        if (!$column->Key == "PRI") {
            if (isset($_POST[$column->Field])) {
                $tokens[$column->Field] = $_POST[$column->Field];
            }
        }
    }

    $id = $CrudManager->insertRecord($tokens);

    if ($id > 0) {
        // /header("Location: ../");
    }


    print '<pre>';
    print_r($_POST);
    print_r($tokens);
    print $id;
    print '</pre>';


    // foreach ($_POST as $key => $value) {
    // }
}



$alerts = [];
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>

    <div class="container">
        <header>
            <h1>Add new <?= ucfirst($entity); ?></h1>
        </header>

        <?php if (count($alerts) > 0) : ?>
            <div class="alert alert-primary" role="alert">
                <?php foreach ($alerts as $alert) : ?>
                    <?= $alert; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php print $CrudManager->getAddForm(); ?>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>