<html>
<a href="https://docs.google.com/document/d/1nzfcVxpgmmS6ZguZoHyCqehTFlNy7GqXGqdANzWxKUo/edit">Uzduociu nuoroda</a>
<?php
$bgColor = 'black';
if (isset($_POST['color'])) {
  $color =  $_POST['color'];
} else {
  $color = "";
}
if ($color == 1) {
  $bgColor = 'black';
} elseif ($color == 2) {
  $bgColor = 'red';
}

?>

<head>
  <script>
    function customRandomFunction(min, max) {
      document.getElementById("hiddenValue").value = 2;
    }
  </script>
</head>

<body style='background-color:<?php echo $bgColor ?>'>

  <!-- <body> -->
  <h1 style='color:white'> Uzduotis 1</h1>
  <!-- <a style='color:white' href="./webMechanics.php">aaa <?php $_SERVER['PHP_SELF'] ?></a> -->
  <a href="./<?php echo basename($_SERVER['PHP_SELF']) ?>"><?php echo basename($_SERVER['PHP_SELF']) ?></a>
  <br>
  <!-- <a name='a1' style='color:white' href="#"><?php echo basename($_SERVER['PHP_SELF']);; ?> GET</a> -->
  <a type="submit" onclick="customRandomFunction()" href="./<?php echo basename($_SERVER['PHP_SELF']) ?>"><?php echo basename($_SERVER['PHP_SELF']);  ?> GET</a>
  <?php
  ?>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" id="hiddenValue" name="color" value=1>
    <input type="submit" onclick="customRandomFunction()">
  </form>
</body>

</html>