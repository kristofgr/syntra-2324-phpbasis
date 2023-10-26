<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("db.inc.php");

$category = NULL;
if (array_key_exists("category", $_GET)) {
    $category = $_GET["category"];
}

$message = NULL;
if (array_key_exists("message", $_GET)) {
    $message = $_GET['message'] . " werd toegevoegd";
}

$aantalSoorten = getTotal($category); 

$itemsPerPage = 20;
$offset = 0;
if (array_key_exists('offset', $_GET)) {
    $offset = (int) $_GET['offset'];
    if ($offset > $aantalSoorten || $offset < 0) {
        $offset = 0;
    }
}

$soorten = getSoorten($category, $itemsPerPage, $offset);
?>
<!DOCTYPE html>
<html color-mode="user">

<head>
    <title>
        Allemaal Beestjes
    </title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>
    <main>
        <header>
            <h1><a href="http://localhost:8888/PHP/20231019/index.php?0&offset=0">Allemaal Beestjes</a></h1>
            <p>Aantal soorten:
                <?php echo $aantalSoorten; ?>
                <a href="form.php"><i>+ Soort toevoegen</i></a>
            </p>
            <?php if ($message != NULL) { ?>
                <p><?= $message; ?></p>
            <?php } ?>
        </header>
        <section>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Diersoort</th>
                        <th>Categorie</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($soorten); $i++) {
                        ?>
                        <tr>
                            <td>
                                <?= ($soorten[$i])['id']; ?>
                            </td>
                            <td>
                                <?= ($soorten[$i])['name']; ?>
                            </td>
                            <td><a href="index.php?category=<?= ($soorten[$i])['category'] ?>">
                                    <?= ($soorten[$i])['category']; ?>
                                </a></td>
                            <td><a href="form.php?id=<?= ($soorten[$i])['id']; ?>">edit</a></td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </section>
        <div>
            <p align="center">
                <?php if ($offset < $aantalSoorten and $offset !== 0) { ?>

                    <a href="index.php?<?php if ($category !== NULL) {
                        ?>category=<?php echo $category;
                    } else {
                        echo 0;
                    } ?>&offset=<?php echo $offset - $itemsPerPage; ?>"><i>Previous</i></a>
                <?php } ?>


                <?php for ($i = 0; $i < $aantalSoorten / $itemsPerPage; $i++) { ?>
                    <a href="index.php?<?php if ($category !== NULL) { ?>category=<?php echo $category;
                    } else {
                        echo 0;
                    } ?>&offset=<?php echo $i * $itemsPerPage; ?>">
                        <?php echo $i + 1 ?>
                    </a>
                <?php } ?>


                <?php if (($offset + $itemsPerPage) < $aantalSoorten) { ?>

                    <a href="index.php?<?php if ($category !== NULL) {
                        ?>category=<?php echo $category;
                    } else {
                        echo 0;
                    } ?>&offset=<?php echo $offset + $itemsPerPage; ?>"><i>Next</i></a>

                <?php } ?>
            </p>
        </div>
    </main>
</body>

</html>