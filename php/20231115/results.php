<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = 0;

if (isset($_GET["questionid"])) {
  $id = (int) $_GET["questionid"];
}

if ($id == 0) {
  header("Location: 404.php");
  exit();
}

require('includes/db.inc.php');

$question = getQuestionById($id);

if (!$question) {
  header("Location: 404.php");
  exit();
}

$total_votes = array_sum(array_column($question['answers'], 'votes'));

function calculatePercentage($votes, $totaal)
{
  $percentage = ($votes / $totaal) * 100;
  return round($percentage, 2);
}
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <section class="vh-100 gradient-custom-2">
    <div class="container py-5 h-100">
      <h4 class="fw-bold text-center mt-3">Resultaat</h4>
      <p>
        <?= $question['question']; ?>
      </p>

      <ul>
        <?php foreach ($question['answers'] as $answer): ?>
          <li>
            <?= $answer['answer']; ?>:
            <?= calculatePercentage($answer['votes'], $total_votes); ?>%
          </li>
        <?php endforeach; ?>
      </ul>

      <p class="text-center nt-5"><a href="index.php">Klik hier voor de vraag van de dag</a>.</p>
    </div>
  </section>

</body>

</html>