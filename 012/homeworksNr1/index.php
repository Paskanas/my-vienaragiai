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
$textColor = 'white';
if ($_GET) {
  if ($_GET['color']) {
    if ($_GET['color'] == 1) {
      $color = 'red';
      $textColor = 'black';
    }
  }
}
?>

<body style="background-color:<?php echo $color ?>">
  <a style="color: <?php echo $textColor ?>" href="http://localhost/my-vienaragiai/012/homeworksNr1/">Nuoroda1</a>
  <a style="color: <?php echo $textColor ?>" href="http://localhost/my-vienaragiai/012/homeworksNr1/?color=1">Nuoroda2</a>
</body>

</html>