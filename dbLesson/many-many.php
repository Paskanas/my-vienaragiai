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


$sql = "select p.title, t.tag, pt.tag_id, pt.post_id 
          FROM posts p 
     left join posts_tags pt 
            on pt.post_id = p.id 
     left join tags as t 
            on t.id = pt.tag_id;";

$stmt = $pdo->query($sql);
$data = $stmt->fetchAll();
echo '<pre>';
print_r($data);

$out = [];

foreach ($data as  $post) {
  if (!isset($out[$post['post_id']])) {
    $out[$post['post_id']] = ['title' => $post['post'], 'tags' => []];
  }
  $out[$post['post_id']]['tags'][$post['tag_id']] = $post['tag'];
}

print_r($out);


// foreach ($data as $key => $value) {
//   foreach ($value as $key => $val) {
//     # code...
//     echo "<div>$val</div>";
//   }
// }
