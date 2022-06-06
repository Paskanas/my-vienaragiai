<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./index.css">
  <title>Main page</title>
</head>

<body>
  <?php require __DIR__ . '/components/menu/menu.php' ?>
  <div class="mainPageBG">
    <h1 class="welcome">Sveiki!</h1>

    <ul class="mainPageLinks">
      <a class="mpLink" href="./pages/accountList.php">
        <li>
          Sąskaitų sąrašas
        </li>
      </a>
      <a class="mpLink" href="./pages/newAccount.php">
        <li>
          Naujos sąskaitos sukūrimas
        </li>
      </a>
    </ul>
    <!-- <form class="loginForm" action="" method="post">
      <label for="">Vartotojo vardas</label>
      <input class="loginInput" type="text" placeholder="Įveskite vartotojo vardą">
      <label for="">Slaptažodis</label>
      <input class="loginInput" type="password" placeholder="Įveskite slaptažodį">
      <button type="submit">Prisijungti</button>
    </form> -->

  </div>
</body>

</html>