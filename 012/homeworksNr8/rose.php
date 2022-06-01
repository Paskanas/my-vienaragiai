<pre>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  header('Location: http://localhost/my-vienaragiai/012/homeworksNr8/pink.php');
  die;
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
</head>

<body style="background-color: #FF5733;">
  <form action="http://localhost/my-vienaragiai/012/homeworksNr8/pink.php" method="get">
    <button>BACK TO PINK</button>
  </form>
</body>

</html>