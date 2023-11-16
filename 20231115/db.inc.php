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

function getQuestionById(int $id): array | bool
{
  $sql = "SELECT id, question
      FROM questions 
      WHERE questions.id = :id";

  $stmt = connectToDB()->prepare($sql);
  $stmt->execute([
    "id" => $id
  ]);

  $question = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$question) {
    return false;
  }

  $sql = "SELECT * FROM answers WHERE question_id = :id";
  $stmt = connectToDB()->prepare($sql);
  $stmt->execute([
    "id" => $id
  ]);

  $question["answers"] = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $question;
}



function upVoteAnswerById(int $id): bool
{
  $id = (int) $id;

  if ($id < 1) {
    return false;
  }

  $sql = "UPDATE answers 
    SET votes = votes + 1 
    WHERE id = :id";

  $stmt = connectToDB()->prepare($sql);
  $stmt->execute([
    "id" => $id
  ]);

  $count = $stmt->rowCount();

  if($count == 0){
    return false;
  }
  else{
    return true;
  }
}
