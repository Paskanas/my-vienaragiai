<pre>
<?php
session_start();
// print_r($_SERVER);
// Scenarijus POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $_SESSION['bla'] = $_POST['tekstas'];
  header('Location: http://localhost/my-vienaragiai/reactjs1/src/components/012/form.php');
  exit;
  echo $kintamasis;
}

// scenarijus GET
?>
</pre>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FORM</title>
</head>

<body>
  <?php
  echo "<h2>" . $_SESSION['bla'] . "</h2>"
  ?>
  <form action="" method="post">
    Tavo tekstas: <input type="text" name='tekstas'>
    <button type="submit">Submit</button>

  </form>
</body>

</html>