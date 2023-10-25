<?php
function executeQuery(String $sql, Array $params = array(), $fetch_mode = PDO::FETCH_ASSOC)
{
  $db_host = '127.0.0.1';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = 'php_mysql';
  $db_port = 8889;

  // Connectie maken met DB
  try {
    $pdo = new PDO('mysql:host=' . $db_host . '; port=' . $db_port . '; dbname=' . $db_db, $db_user, $db_password);
  } catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
  }

  $pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false);

  // De query zelf uitvoeren op de dDB
  $stmt = $pdo->prepare($sql);
  $stmt->execute($params);
  
  // Het resultaat van de query "binnen halen" in een associatieve array en returnen
  $results = $stmt->fetchAll($fetch_mode);
  
  // DB connectie sluiten
  $pdo=null;

  // Resultaat returnen
  return $results;
}