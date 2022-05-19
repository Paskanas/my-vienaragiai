<html>

<head>
  <?php
  if (isset($_POST['color'])) {
    $color =  $_POST['color'];
  } else {
    $color = "";
  }
  if ($color == 1) {
    $fontColor = "00FF00";
    $fontStyle = "verdana";
  } elseif ($color == 2) {
    $fontColor = "FF0000";
    $fontStyle = "courier";
  } elseif ($color == 3) {
    $fontColor = "0000FF";
    $fontStyle = "Times New Roman";
  } else {
    $fontcolor = "FFFFFF";
  }
  ?>
  <script>
    function customRandomFunction(min, max) {
      document.getElementById("hiddenValue").value = Math.floor(Math.random() * (max - min + 1)) + min;
    }
  </script>
</head>

<body style="background-color: #<?php echo $fontColor; ?>;  font-family: <?php echo $fontStyle; ?>;"><?php
                                                                                                      ?>
  <div>
    <?php echo $fontColor; ?>
    <!-- font color just for your reference -->
    <?php echo $fontStyle; ?>
    <!-- font style just for your reference -->
    <h1>sample Excersise 1</h1>
    <p>sample tex</p>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input type="hidden" id="hiddenValue" name="color" value="1">
      <input type="submit" onclick="customRandomFunction(1,3)">
    </form>
  </div>
</body>

</html>