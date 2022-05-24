<pre>
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $_SESSION['color'] = $_POST['color'];

  header('Location: http://localhost/my-vienaragiai/012/homeworksNr3/');
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
  <title>Document</title>
</head>
<?php
$color = 'black';
if ($_GET) {
  if ($_GET['color']) {
    $color = $_GET['color'];
  }
}

if ($_SESSION) {
  $color = $_SESSION['color'];
}

// echo '<div style="color:white" >' . $color . '</div>';
?>

<body style="background-color: #<?php echo $color ?>">
  <form action="http://localhost/my-vienaragiai/012/homeworksNr3/" method="post">
    <input type="text" name="color">
    <button type="submit">Submit</button>
  </form>
</body>

</html>