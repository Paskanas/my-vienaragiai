<pre>
<?php
session_start();
$htmlString = '';

if (!array_key_exists('firstPlayerName', $_SESSION)) {
  $_SESSION['firstDefault'] = 'Player 1';
}
if (!array_key_exists('secondPlayerName', $_SESSION)) {
  $_SESSION['secondDefault'] = 'Player 2';
}
if (array_key_exists('firstPlayerName', $_SESSION)) {
  $player1Stats = $_SESSION['firstPlayerName'] . ': ' . $_SESSION['firstPlayerScore'];
} else {
  $player1Stats = 'Player1: 0';
}
if (array_key_exists('secondPlayerName', $_SESSION)) {
  $player2Stats = $_SESSION['secondPlayerName'] . ': ' . $_SESSION['secondPlayerScore'];
} else {
  $player2Stats = 'Player2: 0';
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  echo 'post';
  if (array_key_exists('first', $_POST) && array_key_exists('second', $_POST)) {
    $_SESSION['firstPlayerName']  = $_POST['first'];
    $_SESSION['firstPlayerScore']  = 0;
    $_SESSION['secondPlayerName']  = $_POST['second'];
    $_SESSION['secondPlayerScore']  = 0;
    $_SESSION['started'] = 'yes';
    $_POST = [];
    header('Location: http://localhost/my-vienaragiai/012/homeworksNr11/');
    die;
  }

  print_r($_POST);
  if (array_key_exists('reset', $_POST)) {
    print_r($_SESSION);
    $_POST = [];
    // session_unset();
    // session_reset();
    session_destroy();
    // session_abort();
    // header('Location: http://localhost/my-vienaragiai/012/homeworksNr11/');
    // die;
  }

  print_r($_POST);
  if (array_key_exists('turn', $_SESSION)) {
    echo 'labas1 ';
    // if (array_key_exists('putNumber1', $_POST)) {
    //   echo gettype($_SESSION['turn']) . ' 1';
    // }
    // if (array_key_exists('putNumber2', $_POST)) {
    //   echo gettype($_SESSION['turn']) . ' 2';
    // }
    // if ($_SESSION['turn'] === 1) {
    //   echo '  .' . $_SESSION['turn'] . '.';
    // }
    // if ($_SESSION['turn'] === 2) {
    //   echo '  ,' . $_SESSION['turn'] . ',';
    // }


    if (array_key_exists('putNumber1', $_POST) && ($_SESSION['turn'] === 1)) {
      echo 'labas2';
      array_key_exists('firstPlayerScore', $_SESSION) ? $_SESSION['firstPlayerScore'] += rand(1, 6) : $_SESSION['firstPlayerScore']  = 0;
    }
    if (array_key_exists('putNumber2', $_POST) && ($_SESSION['turn'] === 2)) {
      echo 'labas3';
      array_key_exists('secondPlayerScore', $_SESSION) ? $_SESSION['secondPlayerScore'] += rand(1, 6) : $_SESSION['secondPlayerScore']  = 0;
    }
  }
  // unset($_POST);
} else {
  echo 'get';
  print_r($_POST);
  print_r($_SESSION);
  if (array_key_exists('turn', $_SESSION)) {
    if ($_SESSION['turn'] === 1) {
      $htmlString .= '<form method="post">';
      $htmlString .= '<h2>' . array_key_exists('firstPlayerName', $_SESSION) ?? 'Player 1' . '</h2>';
      $htmlString .= '<input type="submit" name="putNumber1" value="Roll a dice"></input>';
      $htmlString .= '<input type="submit" name="reset" value="Reset"></input>';
      $htmlString .= '</form>';

      $_SESSION['turn'] = 2;
    } else if ($_SESSION['turn'] === 2) {
      $htmlString .= '<form method="post">';
      $htmlString .= '<h2>' . array_key_exists('secondPlayerName', $_SESSION) ?? 'Player 2' . '</h2>';
      $htmlString .= '<input type="submit" name="putNumber2" value="Roll a dice"></input>';
      $htmlString .= '<input type="submit" name="reset" value="Reset"></input>';
      $htmlString .= '</form>';

      $_SESSION['turn'] = 1;
    }
  } else {
    // $_SESSION['turn'] = 1;
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
  <title>Document</title>
  <!-- <link rel="stylesheet" href="./index.css"> -->
</head>

<body>
  <?php
  if ($_SESSION['started'] ?? 'no' === 'no') {
  ?>
    <form action="" method="post">
      <input type="text" name="first" placeholder="First player name">
      <input type="text" name="second" placeholder="Second player name">
      <button type="submit">Start</button>
      <input type="submit" name="reset" value="Reset"></input>
    </form>
  <?php
  } else {
    echo $htmlString;
  }
  ?>
  <div>
    <h1>Rezultatas: </h1>
    <h2><?php echo $player1Stats ?></h2>
    <h2><?php echo $player2Stats ?></h2>
  </div>
  <div>
    <pre><?php print_r($_SESSION); ?></pre>
  </div>
  <script src="./index.js" type="text/javascript"></script>
</body>

</html>