<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('includes/db.inc.php');

$continents = getContinents();

$errors = [];

if (isset($_POST['submit'])) {
    // er is een submit klik geweest, we moeten valideren....

    // eerste validation: is name ingevuld en geen lege string?
    if (isset($_POST['name'])) {
        $_POST['name'] = trim($_POST['name']);
        if (strlen($_POST['name']) == 0) {
            $errors[] = 'Name is een lege string?';
        }
    } else {
        $errors[] = 'Name is niet aanwezig in de POST...';
    }

    // tweede validatie: werd minstens 1 continent geselecteerd?
    if (!isset($_POST['continents'])) {
        $errors[] = 'Gelieve minstens 1 continent te selecteren...';
    }

    // indien geen errors, steek in de database!
    if (count($errors) == 0) {
        $newId = insertAnimal($_POST['name'], $_POST['continents']);
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

    <section class="vh-100 gradient-custom-2">
        <div class="container py-5 h-100">
            <h4 class="fw-bold text-center mt-3">Add new animal</h4>

            <form method="post" action="add.php">

                <p>
                    <label for="name">Name</label><br>
                    <input type="text" id="name" name="name" />
                </p>

                <p>
                    <label for="continents">Continents</label><br>

                    <?php foreach ($continents as $key => $continent) : ?>
                        <input type="checkbox" name="continents[]" id="continents-<?= $continent->id; ?>" value="<?= $continent->id; ?>" /> <?= $continent->name; ?><br>
                    <?php endforeach; ?>

                </p>

                <input type="submit" name="submit" value="Add" />

            </form>

        </div>
    </section>

</body>

</html>