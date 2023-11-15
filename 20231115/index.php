<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('db.inc.php');

$temp = 1;

// Handle the answer submit if present in POST.
if (isset($_POST['answer'])) {
  if (upVoteAnswerById((int) $_POST['answer'])) {
    header("Location: results.php?questionid=" . $temp);
    exit;
  }
}

// Get the currently active question (with answers).
$question = getQuestionById($temp);
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
      <h4 class="fw-bold text-center mt-3"></h4>

      <form class="bg-white px-4" action="index.php" method="post">
        <p class="fw-bold">
          <?= $question['question']; ?>
        </p>

        <?php foreach ($question["answers"] as $answer): ?>
          <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="answer" value="<?= $answer["id"]; ?>" id="answer<?= $answer["id"]; ?>" />
            <label class="form-check-label" for="answer<?= $answer["id"]; ?>">
              <?= $answer["answer"]; ?>
            </label>
          </div>
        <?php endforeach; ?>

        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>

      </form>
    </div>
  </section>

</body>

</html>