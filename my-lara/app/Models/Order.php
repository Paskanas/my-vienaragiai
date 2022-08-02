<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    const STATUSES = [
        1 => 'New',
        2 => 'Accepted',
        3 => 'Denied',
        4 => 'Done'
    ];

    public function orderAnimal()
    {
        return $this->belongsTo(Animal::class, 'animal_id', 'id');
    }
    public function orderClient()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
