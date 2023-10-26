<?php

function connectToDB()
{
  $db_host = '127.0.0.1';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = 'php_mysql';
  $db_port = 8889;

  try {
    $db = new PDO('mysql:host=' . $db_host . '; port=' . $db_port . '; dbname=' . $db_db, $db_user, $db_password);
  } catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
  }
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);

  return $db;
}

function getTotal($cat = NULL): int
{
  if ($cat === NULL) {
    $sql = "SELECT COUNT(id) as totaal FROM soorten ";
    $stmt = connectToDB()->prepare($sql);
    $stmt->execute();
  } else {
    $sql = "SELECT COUNT(id) as totaal FROM soorten WHERE category = :cat  ";
    $stmt = connectToDB()->prepare($sql);
    $stmt->execute([
      'cat' => $cat,
    ]);
  }
  $totaal = $stmt->fetchAll(PDO::FETCH_COLUMN);

  return $totaal[0];

}

function getSoorten($cat = NULL, $amount = 10, $offset = 0): array
{
  $pdo_tokens = [
    'offset'=> $offset,
    'amount' => $amount,
  ];

  if ($cat === NULL) {
    $sql = "SELECT id, name, category FROM soorten ORDER BY name asc LIMIT :offset,:amount";
  } else {
    $sql = "SELECT id, name, category FROM soorten WHERE category = :cat ORDER BY name asc LIMIT :offset,:amount";
    $pdo_tokens['cat'] = $cat;
  }

  $stmt = connectToDB()->prepare($sql);
  $stmt->execute($pdo_tokens);
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insertSoort(String $name, String $category): void {
  $sql = "INSERT INTO soorten(name, category) VALUES(:name, :category)";
  $stmt = connectToDB()->prepare($sql);
  $stmt->execute([
    'name' => $name,
    'category'=> $category,
  ]);
}

function getSoort(int $id) : array
{
  $sql = "SELECT id, name, category FROM soorten WHERE id = :id";
  
  $stmt = connectToDB()->prepare($sql);
  $stmt->execute([
    "id"=> $id
  ]);
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}