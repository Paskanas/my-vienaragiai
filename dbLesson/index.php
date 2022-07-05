<?php

$host = '127.0.0.1';
$db   = '1_lesson';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => false,
];
// try {
$pdo = new PDO($dsn, $user, $pass, $options);
// } catch (\PDOException $e) {
//      throw new \PDOException($e->getMessage(), (int)$e->getCode());
// }

//READ

$sql1 = "select m.id as id, m.title as title, nvl(ty.type,'Nežinoma rūšis') as type, m.height as height 
           from medziai m, tree_types ty 
          where m.type = ty.id";
$sql11 = "select m.id as id, m.title as title, nvl(ty.type,'Nežinoma rūšis') as type, m.height as height 
            from medziai m 
           inner join tree_types ty
              on m.type = ty.id";
$sql111 = "select m.id as id, m.title as title, nvl(ty.type,'Nežinoma rūšis') as type, m.height as height 
            from medziai m 
           left outer join tree_types ty
              on m.type = ty.id";
$treeTypesSql = 'select * from tree_types';
$stmt = $pdo->query($sql11);
$stmt2 = $pdo->query($treeTypesSql);
echo '<pre>';
$trees1 = $stmt->fetchAll();
$treeTypes = $stmt2->fetchAll();
// print_r($trees1);
// print_r($treeTypes);

echo '<li>';
echo 'ID TITLE TYPE         HEIGHT </li>';

foreach ($trees1 as $row) {
  echo '<li>' . $row['id'] . '  ' . $row['title'] . ' ' . /*['Lapuotis', 'Spygliuotis', 'Palmė'] [*/ $row['type']/*]*/ . '     ' . $row['height'] . ' ' . '</li>';
}

$sql2 = "select title, max(height) from medziai group by title";
$stmt = $pdo->query($sql2);
echo '<pre>';
$trees2 = $stmt->fetchAll();
// print_r($trees2);

echo '<li>';
echo 'TITLE max(height) </li>';

foreach ($trees2 as $row) {
  echo '<li>' . $row['title'] . '  ' . $row['max(height)'] .  '</li>';
}
$sql2 = "select title, max(height), group_concat(type) as group_concat from medziai group by title";
$stmt = $pdo->query($sql2);
echo '<pre>';
$trees2 = $stmt->fetchAll();
// print_r($trees2);

echo '<li>';
echo 'TITLE max(height)   group_concat </li>';

foreach ($trees2 as $row) {
  echo '<li>' . $row['title'] . '  ' . $row['max(height)'] . '  ' . $row['group_concat'] .  '</li>';
}
?>
<fieldset>
  <legend>Create</legend>
  <form method="post">
    <label for="name">Title</label>
    <input type="text" name="title" placeholder="name">
    <label for="name">Height</label>
    <input type="text" name="height" placeholder="height">
    <label for="name">Type</label>
    <select name="type">
      <?php
      foreach ($treeTypes as $value) {
        echo "<option value='" . $value['id'] . "'>" . $value['type'] . "</option>";
      }
      ?>
    </select>
    <label for="name">Method</label>
    <input type="text" name="_method" value="post">
    <button type="submit">Send</button>
  </form>
</fieldset>

<fieldset>
  <legend>Delete</legend>
  <form method="post">
    <label for="id">Title</label>
    <input type="text" name="id" placeholder="id">
    <label for="name">Method</label>
    <input type="text" name="_method" value="delete">
    <button type="submit">Send</button>
  </form>
</fieldset>

<fieldset>
  <legend>Create</legend>
  <form method="post">
    <label for="id">Title</label>
    <input type="text" name='id' placeholder="id">
    <label for="name">Title</label>
    <input type="text" name="title" placeholder="name">
    <label for="name">Height</label>
    <input type="text" name="height" placeholder="height">
    <label for="name">Type</label>
    <select name="type">
      <?php
      foreach ($treeTypes as $value) {
        echo "<option value='" . $value['id'] . "'>" . $value['type'] . "</option>";
      }
      ?>
    </select>
    <label for="name">Method</label>
    <input type="text" name="_method" value="put">
    <button type="submit">Send</button>
  </form>
</fieldset>

<?php
//create

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if ($_POST['_method'] === 'post') {
    // $createSql = "insert into medziai (title,height,type) values ('" . $_POST['title'] . "','" . $_POST['height'] . "','" . $_POST['type'] . "')";
    $sth = $pdo->prepare("insert into medziai (title, height,type) values (:title,:height,:type)");
    $sth->execute([
      'title' => $_POST['title'],
      'height' => $_POST['height'],
      'type' => $_POST['type']
    ]);
    header('Location: http://localhost/my-vienaragiai/dbLesson/');
    die;
  }
  if ($_POST['_method'] === 'delete') {
    $deleteSql = "delete from medziai where id = ?";
    $sth = $pdo->prepare($deleteSql);
    $sth->execute($_POST['id']);

    // $pdo->query($deleteSql);
    header('Location: http://localhost/my-vienaragiai/dbLesson/');
    die;
  }
  if ($_POST['_method'] === 'put') {
    $putSql = "
    update medziai 
    set title = :title, 
    height = :height, 
    type= :type 
    where id = :id ";
    $sth = $pdo->prepare($putSql);
    $sth->execute([
      'title' => $_POST['title'],
      'height' => $_POST['height'],
      'type' => $_POST['type'],
      'id' => $_POST['id']
    ]);

    // $pdo->query($deleteSql);
    header('Location: http://localhost/my-vienaragiai/dbLesson/');
    die;
  }
}
