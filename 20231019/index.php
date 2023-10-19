<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$search = NULL;
if (array_key_exists("search", $_GET)) {
  $search = $_GET["search"];
}

$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = 'root';
$db_db = 'php_mysql';
$db_port = 8889;

// Connectie maken met DB
try {
  $pdo = new PDO('mysql:host='.$db_host.'; port='.$db_port.'; dbname='.$db_db, $db_user, $db_password);
} catch (PDOException $e){
  echo "Error!: " . $e->getMessage() . "<br/>";
  die();
}

// Query uitvoeren op DB 
if ($search === NULL) {
  $sql = "SELECT id, name, category FROM soorten";
} else {
  $sql = "SELECT id, name, category FROM soorten WHERE name LIKE '%$search%'";
}

$stmt = $pdo->prepare($sql); 
$stmt->execute();

$soorten = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo count($soorten);
echo "<pre>";
print_r($soorten);
echo "</pre>";