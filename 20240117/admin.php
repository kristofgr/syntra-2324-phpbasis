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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>

    <div class="container">
        <header>
            <h1><?= ucfirst($entity); ?></h1>
        </header>

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

            // Set the value for the heading
            const title = myModal.querySelector('.modal-title').textContent = "delete content with id " + id;
        });
    </script>
</body>

</html>