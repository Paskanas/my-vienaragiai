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
// echo '<div style="color:white" >' . $color . '</div>';
?>

<body style="background-color: #<?php echo $color ?>">
  <a style="color: white" href="http://localhost/my-vienaragiai/012/homeworksNr2/?color=000">Black</a>
  <a style="color: black" href="http://localhost/my-vienaragiai/012/homeworksNr2/?color=fff">White</a>
</body>

</html>