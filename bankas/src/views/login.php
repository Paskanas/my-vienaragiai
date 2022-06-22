<?php
$title = 'Login';
require __DIR__ . '/top.php';
?>

<h1>Login</h1>
<form method="post">
  <input type="text" name='name' placeholder="name">
  <input type="password" name='password' placeholder="password">
  <button type="submit">Login</button>
</form>


<?php
require __DIR__ . '/bottom.php';
