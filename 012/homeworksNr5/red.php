<pre>
<?php
if (isset($_GET['b'])) {
  header('Location: http://localhost/my-vienaragiai/012/homeworksNr5/blue.php');
  exit;
}
?>
</pre>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Red</title>
</head>

<body style="background-color: red;">
  <a href="http://localhost/my-vienaragiai/012/homeworksNr5/red.php?b=1">Blue</a>
</body>

</html>