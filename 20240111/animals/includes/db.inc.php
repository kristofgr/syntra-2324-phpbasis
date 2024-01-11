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

function getAnimals(): array
{
  $sql = "SELECT animals.id, animals.name as animal_name, GROUP_CONCAT(continents.name) as continent_name
      FROM animals
      LEFT JOIN animals_continents ON animals.id = animals_continents.animal_id
      LEFT JOIN continents on continents.id = animals_continents.continent_id
      GROUP BY animals.id
      ORDER BY animals.name";

  $stmt = connectToDB()->prepare($sql);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function getAnimalById(int $id): object|bool
{
  if ($id == 0)
    return false;

  $sql = "SELECT animals.id, animals.name as animal_name, GROUP_CONCAT(continents.name) as continent_name, GROUP_CONCAT(continents.id) as continent_ids
      FROM animals
      LEFT JOIN animals_continents ON animals.id = animals_continents.animal_id
      LEFT JOIN continents on continents.id = animals_continents.continent_id
      WHERE animals.id = :id
      GROUP BY animals.id
      ORDER BY animals.name";

  $stmt = connectToDB()->prepare($sql);
  $stmt->execute([
    'id' => $id
  ]);

  $obj = $stmt->fetch(PDO::FETCH_OBJ);
  if (!$obj->continent_ids) {
    $obj->continent_ids = [];
  } else {
    $obj->continent_ids = explode(',', $obj->continent_ids);
  }

  return $obj;
}

function getContinents(): array
{
  $sql = "SELECT id, name
      FROM continents
      ORDER BY name";

  $stmt = connectToDB()->prepare($sql);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function insertAnimal(string $name, array $continents): int
{
  $sql = "INSERT INTO animals(name) VALUES (:name)";

  $db = connectToDB();
  $stmt = $db->prepare($sql);
  $stmt->execute([
    'name' => $name
  ]);

  $animal_id = $db->lastInsertId();

  foreach ($continents as $continent_id) {
    $sql = "INSERT INTO animals_continents(animal_id, continent_id) VALUES (:animal_id, :continent_id)";
    $stmt = $db->prepare($sql);
    $stmt->execute([
      'animal_id' => $animal_id,
      'continent_id' => $continent_id
    ]);
  }

  return $animal_id;
}

function updateAnimal(int $animal_id, string $name, array $continents): void
{
  $sql = "UPDATE animals SET name=:name WHERE id=:animal_id";

  $db = connectToDB();
  $stmt = $db->prepare($sql);
  $stmt->execute([
    'animal_id' => $animal_id,
    'name' => $name
  ]);

  $sql = "DELETE FROM animals_continents WHERE animal_id=:animal_id";
  $stmt = $db->prepare($sql);
  $stmt->execute([
    'animal_id' => $animal_id,
  ]);

  foreach ($continents as $continent_id) {
    $sql = "INSERT INTO animals_continents(animal_id, continent_id) VALUES (:animal_id, :continent_id)";
    $stmt = $db->prepare($sql);
    $stmt->execute([
      'animal_id' => $animal_id,
      'continent_id' => $continent_id
    ]);
  }
}
