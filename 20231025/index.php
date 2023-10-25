<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$category = NULL;
if (array_key_exists("category", $_GET)) {
    $category = $_GET["category"];
}


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

if ($category === NULL) {
    $sql = "SELECT COUNT(id) as totaal FROM soorten ";
} else {
    $sql = "SELECT COUNT(id) as totaal FROM soorten WHERE category = '$category'  ";
}


$stmt = $pdo->prepare($sql);
$stmt->execute();
$totaal = $stmt->fetchAll(PDO::FETCH_COLUMN);
// echo '<pre>';
// print_r($totaal);
// exit();

$aantalSoorten = $totaal[0];
$itemsPerPage = 20;
$offset = 0;
if (array_key_exists('offset', $_GET)) {
    $offset = (int) $_GET['offset'];
    if ($offset > $aantalSoorten || $offset < 0) {
        $offset = 0;
    }
}

if ($category === NULL) {
    $sql = "SELECT id, name, category FROM soorten ORDER BY name asc LIMIT $offset,$itemsPerPage";
} else {
    $sql = "SELECT id, name, category FROM soorten WHERE category = '$category' ORDER BY name asc LIMIT $offset,$itemsPerPage";
}




$stmt = $pdo->prepare($sql);
$stmt->execute();
$soorten = $stmt->fetchAll(PDO::FETCH_ASSOC);



// echo '<pre>';
// print_r($soorten);
// exit();





?>

<!DOCTYPE html>
<html>

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
            </p>
        </header>
        <section>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Diersoort</th>
                        <th>Categorie</th>
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
                <!-- </p> -->
        </div>
    </main>
</body>

</html>