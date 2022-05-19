<h1> Uzduotis 1</h1>
<?php
$actorName = 'Johnny';
$actorSurname = 'Depp';
if (strlen($actorName) > strlen($actorSurname)) {
  echo $actorName;
} else {
  echo $actorSurname;
}
?>
<h1> Uzduotis 2</h1>
<?php
// $actorName = 'Johnny';
// $actorSurname = 'Depp';
echo strtoupper($actorName), ' ', strtolower($actorSurname);

?>
<h1> Uzduotis 3</h1>
<?php
$actorFullName = $actorName[0] .  $actorSurname[0];
echo $actorFullName;

?>
<h1> Uzduotis 4</h1>
<?php
$last3Letters = substr($actorName, -3) . ' ' . substr($actorSurname, -3);
echo $last3Letters;
?>
<h1> Uzduotis 5</h1>
<?php
$name = 'An American in Paris';
echo str_replace('A', '*', str_replace('a', '*', $name));
echo '<br>';
echo str_ireplace('A', '*', $name);
?>
<h1> Uzduotis 6</h1>
<?php
$counta = substr_count($name, 'a') + substr_count($name, 'A');
echo $counta;
?>
<h1> Uzduotis 7</h1>
<?php
$name1 = 'An American in Paris';
$name2 = 'Breakfast at Tiffany\'s';
$name3 = '2001: A Space Odyssey';
$name4 = 'It\'s a Wonderful Life';

function removeVowels($name)
{
  return str_replace(
    'U',
    '',
    str_replace(
      'u',
      '',
      str_replace(
        'O',
        '',
        str_replace(
          'o',
          '',
          str_replace(
            'Y',
            '',
            str_replace(
              'y',
              '',
              str_replace(
                'I',
                '',
                str_replace(
                  'i',
                  '',
                  str_replace(
                    'E',
                    '',
                    str_replace(
                      'e',
                      '',
                      str_replace(
                        'A',
                        '',
                        str_replace('a', '', $name)
                      )
                    )
                  )
                )
              )
            )
          )
        )
      )
    )
  );
};
echo removeVowels($name1) . '<br>';
echo removeVowels($name2) . '<br>';
echo removeVowels($name3) . '<br>';
echo removeVowels($name4) . '<br>';
?>
<h1> Uzduotis 8</h1>
<?php
$string = 'Star Wars: Episode ' . str_repeat(' ', rand(0, 5)) . rand(1, 9) . ' - A New Hope';
echo $string . '<br>';
// echo filter_var($string, FILTER_SANITIZE_NUMBER_INT) . '<br>';
preg_match_all('!\d+!', $string, $matches);
print_r($matches[0][0]);
echo '<br>';
// $outputString = preg_replace('/[^0-9]/', '', $string);
// echo $outputString . '<br>';
// echo substr($string, 19, 1) . '<br>';
// echo substr($string, 18, 1) . '<br>';
// echo substr($string, 17, 1) . '<br>';
?>
<h1> Uzduotis 9</h1>
<?php
$string = "Don't Be a Menace to South Central While Drinking Your Juice in the Hood";
echo $string . '<br>';
$words = explode(' ', $string);
$count = 0;
foreach ($words as $word) {
  if (mb_strlen($word) <= 5) {
    $count++;
    echo $word . ' ';
  }
}
echo '<br>';
echo $count . '<br>';

$string2 = 'Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale';
echo $string2 . '<br>';
$words2 = explode(' ', $string2);
$count2 = 0;
foreach ($words2 as $word) {
  if (mb_strlen($word) <= 5) {
    $count2++;
    echo $word . ' ';
  }
}
echo '<br>';
echo $count2 . '<br>';

?>
<h1> Uzduotis 10</h1>
<?php
$alphas = range('a', 'z');
// echo count($alphas);
$num1 = rand(0, 25);
$num2 = rand(0, 25);
$num3 = rand(0, 25);
echo $alphas[$num1] . ' ' . $alphas[$num2] . ' ' . $alphas[$num3];
?>
<h1> Uzduotis 11</h1>
<?php
$sakinys = "Don't Be a Menace to South Central While Drinking Your Juice in the Hood";
$sakinys2 = "Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale";
$string = '';

$arr = explode(' ', $sakinys);
echo $sakinys . '<br>';
// $arr = explode(' ', $sakinys2);
// echo $sakinys2 . '<br>';
$rand = rand(0, count($arr) - 1);

for ($i = 0; $i < 10; $i++) {
  while (str_contains($string, $arr[$rand])) {
    $rand = rand(0, count($arr) - 1);
  }
  $string = $string . ' ' . $arr[$rand];
}
echo '<br>';
shuffle($arr);
$arr = array_splice($arr, 0, 10);
$result =  implode(' ', $arr);
echo $result;
echo '<br>';
foreach ($arr as $key => $value) {
  // echo $key;
  if ($key < 10) {

    echo $value . ' ';
  }
}

?>