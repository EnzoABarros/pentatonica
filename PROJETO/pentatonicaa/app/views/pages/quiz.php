<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/pentatonicaa/public/css/style.css?<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="/pentatonicaa/public/css/quiz.css?<?php echo time(); ?>">
    <link rel="icon" href="/pentatonicaa/public/images/logo.png" type="image/png">
    <title>Quiz</title>
</head>
<body>

    <?php require_once __DIR__ . "/../layouts/header.php" ?>


    <h1 style="text-align: center; font-size: 150px;">Quiz</h1>
<div class="quiz">
    <div class="quiz-container" id="quiz">
  <h1>Qual Guitarra Combina com Você?</h1>
  
  <div id="question"></div>

  <div id="answers"></div>

  <button id="next-btn" style="display:none;">Próxima</button>
    </div>
</div>
    <script src="js/quiz.js"></script>
</body>
</html>