<pre>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  print_r($_POST);
  if (array_key_exists('first', $_POST) && array_key_exists('second', $_POST)) {
    if (!file_exists(__DIR__ . '/playersNames.json')) {
      file_put_contents(__DIR__ . '/playersNames.json', json_encode([]));
    }
    file_put_contents(__DIR__ . '/playersNames.json', json_encode($_POST));
    if (!file_exists(__DIR__ . '/scores.json')) {
      file_put_contents(__DIR__ . '/scores.json', json_encode([]));
    }
    $playersScores = ['first' => 0, 'second' => 0, 'turn' => 1];
    file_put_contents(__DIR__ . '/scores.json', json_encode($playersScores));
    header('Location: http://localhost/my-vienaragiai/012/homeworksNr11v2/');
    die;
  }
  if (array_key_exists('reset', $_POST)) {
    if (file_exists(__DIR__ . '/scores.json')) {
      unlink(__DIR__ . '/scores.json');
    }
    if (file_exists(__DIR__ . '/playersNames.json')) {
      unlink(__DIR__ . '/playersNames.json');
    }
    header('Location: http://localhost/my-vienaragiai/012/homeworksNr11v2/');
    die;
  }
  if (array_key_exists('resetScores', $_POST)) {
    if (file_exists(__DIR__ . '/scores.json')) {
      $playersScores = ['first' => 0, 'second' => 0, 'turn' => 1];
      file_put_contents(__DIR__ . '/scores.json', json_encode($playersScores));
      header('Location: http://localhost/my-vienaragiai/012/homeworksNr11v2/');
      die;
    }
  }
  if (array_key_exists('roll', $_POST)) {
    if (file_exists(__DIR__ . '/playersNames.json')) {
      $playersNames = json_decode(file_get_contents(__DIR__ . '/playersNames.json'), true);
      $firstPlayerName = $playersNames['first'];
      $secondPlayerName = $playersNames['second'];
    }
    if (file_exists(__DIR__ . '/scores.json')) {
      $playersScores = json_decode(file_get_contents(__DIR__ . '/scores.json'), true);
      $player1Score = $playersScores['first'];
      $player2Score = $playersScores['second'];
      $turn = $playersScores['turn'];
    }
    if ($turn === 1) {
      $playersScores['first'] += rand(1, 6);
      $playersScores['turn'] = 2;
    } else if ($turn === 2) {
      $playersScores['second'] += rand(1, 6);
      $playersScores['turn'] = 1;
    }
    file_put_contents(__DIR__ . '/scores.json', json_encode($playersScores));
    header('Location: http://localhost/my-vienaragiai/012/homeworksNr11v2/');
    die;
  }
} else {
  if (file_exists(__DIR__ . '/playersNames.json')) {
    $playersNames = json_decode(file_get_contents(__DIR__ . '/playersNames.json'), true);
    $firstPlayerName = $playersNames['first'];
    $secondPlayerName = $playersNames['second'];
  }

  if (file_exists(__DIR__ . '/scores.json')) {
    $playersScores = json_decode(file_get_contents(__DIR__ . '/scores.json'), true);
    $player1Score = $playersScores['first'];
    $player2Score = $playersScores['second'];
    $turn = $playersScores['turn'];
    if ($player1Score >= 30 && !isset($winner)) {
      $winner = "<h1>Winner is $firstPlayerName</h1>";
      // header('Location: http://localhost/my-vienaragiai/012/homeworksNr11v2/');
      // die;
    } else if ($player2Score >= 30) {
      $winner = "<h1>Winner is $secondPlayerName</h1>";
      // header('Location: http://localhost/my-vienaragiai/012/homeworksNr11v2/');
      // die;
    }
  }
}
?>
</pre>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Game</title>
</head>

<body>
  <?php
  if (!file_exists(__DIR__ . '/playersNames.json')) {
  ?>
    <form action="" method="post">
      <input type="text" name="first" id="" placeholder="First player name">
      <input type="text" name="second" id="" placeholder="Second player name">
      <button type="submit">Start the game</button>
    </form>
  <?php
  } else {
  ?>
    <form action="" method="post">
      <?php if (isset($winner)) {
        echo $winner;
      } else { ?>
        <h1>Result:</h1>
        <h2><?php echo $firstPlayerName . ': ' . $player1Score ?></h2>
        <h2><?php echo $secondPlayerName . ': ' . $player2Score ?></h2>
        <input type="submit" name='roll' value="Roll a dice">
        <input type="submit" name='resetScores' value="Reset scores">
      <?php } ?>
      <input type="submit" name='reset' value="Reset">
    </form>
    <?php
    if (!isset($winner)) { ?>
      <h2><?php echo $turn === 1 ? $firstPlayerName : ($turn === 2 ? $secondPlayerName : null) ?> turn</h2>
    <?php } ?>
  <?php
  }
  ?>
</body>

</html>