<pre>
<?php
session_start();
$string = '';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if ($_GET) {
    $checkboxCount = $_GET['num'];
    $rand = $_GET['num2'];
    echo "<h1>Was checked $checkboxCount chebox from " . $rand . ' checkbox</h1>';
  } else {
    $string .= '<ol style="color:white;list-style-type: upper-alpha;">';
    $rand = rand(3, 10);
    for ($i = 0; $i < $rand; $i++) {
      $string .= '<li>';
      $string .= "<input name='check$i' type='checkbox' value='yes' style='color:white'/>";
      // echo "<label type='checkbox' style='color:white'>$i</label>";
      $string .= '</li>';
    }
    $string .= '</ol>';
    $color = 'black';
    $display = 'block';
  }
} else {
  print_r($_POST);
  $string = '';
  $color = 'white';
  $display = 'none';
  // print_r($_SERVER);
  $checkboxCount = count($_POST);
  $num2 = $_GET['num2'];
  header("Location: http://localhost/my-vienaragiai/012/homeworksNr10/?num=$checkboxCount&num2=$num2");
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
  <form action="http://localhost/my-vienaragiai/012/homeworksNr10/?num2=<?php echo $rand ?>" method="post" style="display: <?php echo $display; ?>">
    <?php
    echo $string;
    ?>
    <?php if (!$_GET) { ?>
      <button type="submit">Submit</button>
    <?php } ?>
  </form>
</body>

</html>