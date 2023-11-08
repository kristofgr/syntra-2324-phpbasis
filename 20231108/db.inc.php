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

function getProfiles(): array
{
  $sql = "SELECT profiles.id, profiles.name, profiles.maturity, profiles.avatar_id, avatars.image, avatars.name as avatar_name 
      FROM profiles 
      LEFT JOIN avatars 
      ON profiles.avatar_id = avatars.id
      WHERE profiles.status = 1
      ORDER BY profiles.name ASC";

  $stmt = connectToDB()->prepare($sql);
  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insertProfile($tokens): void {
  $sql = "INSERT INTO profiles (name, maturity, avatar_id, status) VALUES (:name, :maturity, '45', 1)";
  $stmt = connectToDB()->prepare($sql);
  $stmt->execute($tokens);
}