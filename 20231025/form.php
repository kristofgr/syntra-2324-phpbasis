<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<pre>";
print_r($_POST);
echo "</pre>";

if (isset($_POST["name"]) && isset($_POST["category"])) {
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

  $sql = "INSERT INTO soorten(name, category) VALUES(:name, :category)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    'name' => $_POST['name'],
    'category'=> $_POST['category'],
  ]);
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>
    Soort toevoegen
  </title>
  <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>
  <main>
    <section>
      <form action="form.php" method="POST">
        <header>
          <h2>Soort toevoegen</h2>
        </header>

        <label for="name">Naam</label>
        <input type="text" id="name" name="name" size="20" placeholder="Naam">

        <label for="category">Categorie</label>
        <input type="text" id="category" name="category" size="20" placeholder="Categorie">

        <button type="submit">Opslaan</button>
      </form>
    </section>
  </main>
</body>