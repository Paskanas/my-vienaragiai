<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $color = 'gold';
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $color = 'green';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body style="background-color: <?php echo $color ?>;">
  <form action="" method="post">
    <button type="submit">Submit</button>
  </form>
  <form action="" method="get">
    <button>Get</button>
  </form>
</body>

</html>