<?php

namespace Bankas\Models;

use Bankas\App;
use Bankas\Controllers\AuthorizationController as Auth;

class AccountModel
{
  public static function accountListModel()
  {
    App::$db->sort();
    $accountsData = App::$db->showAll();
    $accountList = '<form class="listForm" method="post"><table class="accountsTable">';
    $parent = 'pages/accountList/';
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
      foreach ($accountsData as $data) {
        $accountList .=
          '<tr>' .
          '<td>' . $data['id'] . '</td>' .
          '<td>' . $data['name'] . '</td>' .
          '<td>' . $data['surname'] . '</td>' .
          '<td>' . $data['bankAccount'] . '</td>' .
          '<td>' . $data['identityCode'] . '</td>' .
          '<td>' . $data['balance'] . '</td>' .
          '<td>' . '<button type="submit" name="delete" value=' . $data['id'] . '>Ištrinti</button>' . '</td>' .
          '<td>' . '<a href="' . URL . $parent . 'addFunds/' . $data['id'] . '">Pridėti lėšų</a>' . '</td>' .
          '<td>' . '<a href="' . URL . $parent . 'deductFunds/' . $data['id'] . '">Nuskaičiuoti lėšas</a>' . '</td>' .
          "</tr>";
      }
    } else {
      $accountList .= '<h2>Sąskaitų sąrašas tuščias</h2>';
    }
    $accountList .= '</table>
    <input type="hidden" name="csrf" value="' . Auth::csrf() . '">' .
      '</form>';
    return $accountList;
  }
}
