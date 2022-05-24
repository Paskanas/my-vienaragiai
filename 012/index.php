<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>alioooooo</h1>

  <a href="http://localhost/my-vienaragiai/012/">Home</a>
  <a href="http://localhost/my-vienaragiai/012/?page=1">Page 1</a>
  <a href="http://localhost/my-vienaragiai/012/?page=2">Page 2</a>
  <a href="http://localhost/my-vienaragiai/012/?page=3">Page 3</a>
  <?php
  echo '<br>';
  // print_r($_GET);
  if ($_GET) {
    if ($_GET['page'] == 1) {
      echo "<h1>Page 1</h1>";
    } else if ($_GET['page'] == 2) {
      echo "<h1>Page 2</h1>";
    } else {
      echo "<h1>Page 3</h1>";
    }
  }
  ?>

</body>

</html>