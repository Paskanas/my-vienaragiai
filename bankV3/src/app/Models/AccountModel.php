<?php

namespace Bankas\Models;

use Bankas\App;
use Bankas\Controllers\AuthorizationController as Auth;

class AccountModel
{
  public static function accountListModel($to = 'VES')
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
    <th>Suma Eur</th>
    <th>Suma ' . $to . '</th>
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
          '<td>' . ($data['balance'] > 0 ? round(self::convertTo($data['balance'], $to), 2) : 0) . '</td>' .
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
    $accountList .= self::currencyDatalist();
    return $accountList;
  }
  public static function convertTo($balance, $to)
  {
    // $curl = curl_init();

    // curl_setopt_array($curl, array(
    //   CURLOPT_URL => "https://api.apilayer.com/currency_data/convert?to=" . $to . "&from=eur&amount=" . $balance,
    //   CURLOPT_HTTPHEADER => array(
    //     "Content-Type: text/plain",
    //     "apikey: ulsCEJRiYUz4M76MlCFnhu73VSkzA8qz"
    //   ),
    //   CURLOPT_RETURNTRANSFER => true,
    //   CURLOPT_ENCODING => "",
    //   CURLOPT_MAXREDIRS => 10,
    //   CURLOPT_TIMEOUT => 0,
    //   CURLOPT_FOLLOWLOCATION => true,
    //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //   CURLOPT_CUSTOMREQUEST => "GET"
    // ));

    // $response = curl_exec($curl);
    // curl_close($curl);

    // $response = json_decode($response);
    // print_r($response);
    // return $response->info->quote;

    $req_url = 'https://api.exchangerate.host/convert?from=EUR&to=' . $to . '&amount=' . $balance;
    $response_json = file_get_contents($req_url);
    if (false !== $response_json) {
      try {
        $response = json_decode($response_json);
        if ($response->success === true) {
          // print_r($response);
        }
      } catch (Exception $e) {
        // Handle JSON parse error...
      }
    }
    return $response->result;
  }
  public static function getCurrenciesList()
  {
    // $curl = curl_init();

    // curl_setopt_array($curl, array(
    //   CURLOPT_URL => "https://api.apilayer.com/currency_data/list",
    //   CURLOPT_HTTPHEADER => array(
    //     "Content-Type: text/plain",
    //     "apikey: ulsCEJRiYUz4M76MlCFnhu73VSkzA8qz"
    //   ),
    //   CURLOPT_RETURNTRANSFER => true,
    //   CURLOPT_ENCODING => "",
    //   CURLOPT_MAXREDIRS => 10,
    //   CURLOPT_TIMEOUT => 0,
    //   CURLOPT_FOLLOWLOCATION => true,
    //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //   CURLOPT_CUSTOMREQUEST => "GET"
    // ));

    // $response = json_decode(curl_exec($curl));
    // curl_close($curl);
    // return $response->currencies;
    $req_url = 'https://api.exchangerate.host/symbols';
    $response_json = file_get_contents($req_url);
    if (false !== $response_json) {
      try {
        $response = json_decode($response_json);
        if ($response->success === true) {
          // print_r($response);
        }
      } catch (Exception $e) {
        // Handle JSON parse error...
      }
    }
    return $response->symbols;
  }

  private static function currencyDatalist()
  {
    $result =
      '<form class="currencyForm" action="" method="post">
        <label for="currency">Choose your currency from the list:</label>
        <input class="currencyInput" list="currencies" name="currency" id="currency" placeholder="Choose currency to convert">
        <datalist id="currencies">';
    foreach (self::getCurrenciesList() as $value) {
      // $result .= '<option value="' . $key . '">' . $value . '</option>';
      $result .= '<option value="' . $value->code . '">' . $value->description . '</option>';
    }

    $result .= '</datalist>
      <button class="currencyButton" type="submit" name="convertTo">Convert</button>
      <input type="hidden" name="csrf" value="' . Auth::csrf() . '">' .
      '</form>';
    return $result;
  }
}
