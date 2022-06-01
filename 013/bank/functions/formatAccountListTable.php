<?php
function formatAccountListTable($accountsData)
{
  $accountList = '<form class="listForm" action="" method="post"><table class="accountsTable">';
  if ($accountsData) {
    $accountList .=
      '<tr>
    <th>ID</th>
    <th>Vardas</th>
    <th>Pavarde</th>
    <th>Sąskaitos nr.</th>
    <th>Asmens kodas</th>
    <th>Suma</th>
    <th></th>
    <th></th>
    <th></th>
    </tr>';
    foreach ($accountsData as $key => $data) {
      $accountList .=
        '<tr>' .
        '<td>' . $data['id'] . '</td>' .
        '<td>' . $data['name'] . '</td>' .
        '<td>' . $data['surname'] . '</td>' .
        '<td>' . $data['bankAccount'] . '</td>' .
        '<td>' . $data['identityCode'] . '</td>' .
        '<td>' . $data['balance'] . '</td>' .
        '<td>' . '<button type="submit" name="delete" value=' . $data['id'] . '>Ištrinti</button>' . '</td>' .
        '<td>' . '<a href="./addFunds.php?id=' . $data['id'] . '">Pridėti lėšų</a>' . '</td>' .
        '<td>' . '<a href="./deductFunds.php?id=' . $data['id'] . '">Nuskaičiuoti lėšas</a>' . '</td>' .
        "</tr>";
    }
  } else {
    $accountList .= '<h2>Sąskaitų sąrašas tuščias</h2>';
  }
  $accountList .= '</table></form>';
  return $accountList;
}
