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

$alerts = [];

// Do we need to delete a record?
if (isset($_GET['delete']) && (int)($_GET['delete']) > 0) {
    $record = $CrudManager->getById($_GET['delete']);
    if ($record) {
        $CrudManager->deleteById($_GET['delete']);
        $alerts[] = 'Record with id ' . $_GET['delete'] . ' is deleted.';
    }
}

// Do we need to un/de-publish a record?
if (isset($_GET['status']) && (int)($_GET['status']) > 0 && isset($_GET['value']) && (int)($_GET['status']) > 0) {
    $record = $CrudManager->getById($_GET['status']);
    if ($record) {
        $CrudManager->setField($record->id, 'status', $_GET['value']);
        die();
    }
}





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
            <h1><?= ucfirst($entity); ?></h1>
        </header>

        <?php if (count($alerts) > 0) : ?>
            <div class="alert alert-primary" role="alert">
                <?php foreach ($alerts as $alert) : ?>
                    <?= $alert; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <a href="../admin/<?= $entity; ?>/new"><button title="Add" type="button" class="btn btn-primary">Add new</button></a>

        <?php print $CrudManager->getAdminTable(); ?>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        const myModal = document.querySelector('#deleteModal');
        myModal.addEventListener('show.bs.modal', function(event) {
            // Get the reference of the triggering button 
            // and retrieve the value from the attribute
            const button = event.relatedTarget;
            const id = button.getAttribute('data-bs-id');
            const table = button.getAttribute('data-bs-table');

            // Set the value for the heading
            myModal.querySelector('.modal-title').textContent = "Delete ID " + id;
            myModal.querySelector('.modal-body').textContent = "Are you sure you want to delete item with ID " + id + "?";
            myModal.querySelector('.modal-confirm').setAttribute("href", "../admin/" + table + "?delete=" + id);

        });
    </script>


    <script>
        const statusswitches = document.querySelectorAll('.switchStatus');

        statusswitches.forEach((el) =>
            el.addEventListener('click', function(event) {
                const id = el.getAttribute('data-bs-id');
                const value = el.checked;

                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", "?status=" + id + '&value=' + Number(value), true);
                xhttp.send();
            })
        );
    </script>


</body>

</html>