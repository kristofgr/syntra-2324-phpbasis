<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = 'root';
$db_db = 'php_mysql';
$db_port = 8889;

try {
    $pdo = new PDO('mysql:host=' . $db_host . '; port=' . $db_port . '; dbname=' . $db_db, $db_user, $db_password);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
}



$sql = "SELECT count(id) FROM soorten";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$totaal = $stmt->fetchAll(PDO::FETCH_COLUMN);

$aantalSoorten = $totaal[0];


$itemsPerPage = 20;

$category = null;
if (array_key_exists("category", $_GET)) {
    $category = $_GET["category"];
}

$offset = 0;
if (array_key_exists("offset", $_GET)) {
    $offset = (int) $_GET["offset"];
    if ($offset > $aantalSoorten || $offset < 0) {
        $offset = 0;
    }
}

if ($category === NULL) {
    $sql = "SELECT id, name, category FROM soorten ORDER BY name limit $offset,$itemsPerPage";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} else {
    $sql = "SELECT id, name, category FROM soorten WHERE category = :param1 ORDER BY name limit $offset,$itemsPerPage";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      'param1' => $category
    ]);
}

$soorten = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natuur</title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>
    <main>
        <header>
            <a href="samuel.php">
                <h1>Home page<h1>
            </a>
            <p style="font-size: 20px">aantal soorten:
                <?= $aantalSoorten ?>
            <p>
        </header>
        <section>

            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
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
                            <td><a href="samuel.php?category=<?= ($soorten[$i])['category'] ?>">
                                    <?= ($soorten[$i])['category']; ?>
                                </a>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </section>
        <div>
            <p align="center">
                <?php if ($itemsPerPage - $offset <= 0) { ?>
                    <a href="samuel.php?offset=<?= $offset - $itemsPerPage . ($category ? "&category=$category" : ""); ?>">
                        <i>Previous</i></a>
                <?php }
                for ($i = 0; $i < $aantalSoorten / $itemsPerPage; $i++) { ?>
                    <a href="samuel.php?offset=<?= $i * $itemsPerPage . ($category ? "&category=$category" : ""); ?>">
                        <?= $i + 1 ?>
                    </a>
                <?php } ?>
                <?php if ($itemsPerPage + $offset < $aantalSoorten) { ?>
                    <a href="samuel.php?offset=<?= $offset + $itemsPerPage . ($category ? "&category=$category" : ""); ?>">
                        <i>Next</i></a>
                <?php } ?>
            </p>
        </div>
    </main>
</body>

</html>