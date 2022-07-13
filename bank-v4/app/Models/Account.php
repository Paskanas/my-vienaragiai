<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public static function generateIban()
    {
        $loopCounter = 0;
        $newIdString = Account::max('id') + 1;
        $iban = 'LT' . hexdec(substr(sha1($newIdString), 0, 15));
        while (strlen($iban) !== 20 && $loopCounter < 50) {
            $newIdString .= 'a';
            $loopCounter++;
            $iban = 'LT' . hexdec(substr(sha1($newIdString), 0, 15));
        }
        return $iban;
    }
}
