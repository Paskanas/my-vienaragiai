<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Color as ModelsColor;

class Animal extends Model
{
    use HasFactory;

    public function getThisAnimalsColor()
    {

        return $this->belongsTo(ModelsColor::class, 'color_id', 'id');
    }
}
