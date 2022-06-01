<pre>
<?php
$string = '';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $string .= '<ol style="color:white;list-style-type: upper-alpha;">';
  for ($i = 0; $i < rand(3, 10); $i++) {
    $string .= '<li>';
    $string .= "<input name='check$i' type='checkbox' value='yes' style='color:white'/>";
    // echo "<label type='checkbox' style='color:white'>$i</label>";
    $string .= '</li>';
  }
  $string .= '</ol>';
  $color = 'black';
  $display = 'block';
} else {
  $string = '';
  $color = 'white';
  $display = 'none';
  // print_r($_SERVER);
  $checkboxCount = count($_POST);
  echo "<h1>Buvo pažymėta $checkboxCount chebox'as/ai</h1>";
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

<body style="background-color: <?php echo $color ?>">
  <form action="" method="post" style="display: <?php echo $display; ?>">
    <?php
    echo $string;
    ?>
    <button type="submit">Submit</button>
  </form>
</body>

</html>